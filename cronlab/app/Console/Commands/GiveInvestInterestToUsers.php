<?php

namespace App\Console\Commands;

use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Membership;
use App\Settings;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;

class GiveInvestInterestToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GiveInvestInterestToUsers:cronlabinterest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Give Money Investment Interests To All User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $settings = Settings::first();
        
        if ($settings->invest == 1) {

            $interests = Interest::whereStatus(0)->get();

            foreach ($interests as $interest) {

                if ($interest->start_time < Carbon::now()) {

                    if(is_null($interest->made_time)){
                        $invest = Invest::findOrFail($interest->invest_id);
                        $invest->status = 1;
                        $invest->save();

                        $start = Carbon::now();
                        $hours = $interest->invest->plan->style->compound;
                        $interest->made_time = $start;
                        $repeat = $interest->invest->plan->repeat;

                        ///calculate the total months to add interest
                        $first_pay_after = (int)$hours/$repeat;
                        $interest->start_time = $start->addHours($first_pay_after);

                        $interest->save();

                    }
                    else
                    {
                        $repeat = $interest->invest->plan->repeat;

                        $percentage = $interest->invest->plan->percentage;

                        $amount = $interest->invest->amount;

                        $new_amount = (($percentage / 100) * $amount)/$repeat;

                        $interestlog = new InterestLog();
                        $interestlog->user_id = $interest->user_id;
                        $interestlog->invest_id = $interest->invest_id;
                        $interestlog->reference_id = str_random(12);
                        $interestlog->amount = $new_amount;
                        $interestlog->save();

                        $last_interest_date = Carbon::parse($interest->start_time);
                        $hours = $interest->invest->plan->style->compound;

                        $next_pay_after = (int)$hours/$repeat;
                        $interest->start_time = $last_interest_date->addHours($next_pay_after);


                        $interest->total_repeat = $interest->total_repeat + 1;

                        if ($interest->total_repeat == $repeat) {
                            $interest->status = 1;
                            $invest = Invest::findOrFail($interest->invest_id);
                            $invest->status = 3;
                            $invest->save();

                             \Mail::raw('Your interest  product has finished with reference '.$interest->reference_id , function ($message ,$interest){
                               $message->to($interest->user->email);
                               $message->bcc('amirgee007@yahoo.com');
                               $message->subject('Alert');
                               $message->from('info@nosclick.com' ,'NosClick');

                             });

                        }

                        echo 'saved new amount';
                        echo $new_amount;

                        $interest->save();

                        $user = User::findOrFail($interest->user_id);

                        $user->profile->main_balance = $user->profile->main_balance + $new_amount;

                        $user->profile->save();
                    }
                }
            }
        }

        if ($settings->membership_upgrade == 1){

            $users= User::all();

            foreach ($users as $user){

                $today = Carbon::today();
                $expired = $user->membership_expired;
                $datetime1 = new DateTime($today);
                $datetime2 = new DateTime($expired);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');

                if ($days == 0){
                    $membership = Membership::first();
                    $user->membership_id = $membership->id;
                    $user->membership_started = Carbon::today();
                    $user->membership_expired = $today->addDays($membership->duration);
                    $user->save();
                }

            }

        }

    }
}
