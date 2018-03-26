<?php

namespace App\Http\Controllers;

use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Kyc;
use App\Kyc2;

class UserInterestController extends Controller
{
    public $user;
    public $result1;
    public $result2;
    public function __construct()
    {

        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            
            $this->result1= Kyc::whereUser_id($this->user->id)->first();
            $this->result2= Kyc2::whereUser_id($this->user->id)->first();
            
            \View::share([ 'result1' => $this->result1 ,'result2'=> $this->result2]);
            
            return $next($request);
            });

    }

    public function index(){

        $invests = Plan::whereStatus(1)->get();

        return view('user.invest.index',compact('invests'));
    }
    public function investHistory(){

        $user = Auth::user();
        $investments = Invest::whereUser_id($user->id)->latest()->paginate(20);

        return view('user.invest.invest',compact('investments'));
    }
    public function interestHistory(){

        $user = Auth::user();
        $logs = InterestLog::whereUser_id($user->id)->latest()->paginate(20);

        return view('user.invest.log',compact('logs'));
    }



    public function submit(Request $request){

        $this->validate($request, [

            'amount'=> 'required||numeric',
            'plan_id' => 'required|numeric',

        ]);

        $plan = Plan::find($request->plan_id);

        $minimum = $plan->minimum;

        $maximum = $plan->maximum;

        $amount = $request->amount;

        $profile = Auth::user()->profile;

        if ($amount < $minimum){

            session()->flash('message', "Votre solde est insuffiant. Vous avez besoin au minimum de €".$minimum." pour investir dans ce plan.");
            Session::flash('type', 'error');
            Session::flash('title', 'Solde insuffisant');

            return redirect()->route('userInvestments');
        }
        elseif ($amount > $maximum){


            session()->flash('message', "Montant d'investissement trop élevé. Vous pouvez investir au maximum €".$maximum." dans ce plan. Diminuez le montant ou investissez sur un autre plan.");
            Session::flash('type', 'error');
            Session::flash('title', 'Montant trop élevé');

            return redirect()->route('userInvestments');

        }
        elseif ($amount > $profile->deposit_balance ){

            session()->flash('message', "Vous souhaitez investir €".$amount.". Toutefois votre solde de €".$profile->deposit_balance." est insufissant. Vous pouvez transférer de l'argent sur votre compte de dépôt en utilisant le transfert de fonds.");
            Session::flash('type', 'error');
            Session::flash('title', 'Fonds insuffisants');

            return redirect()->route('userInvestments');

        }
        else{

            $percentage =  $plan->percentage;

            $profit = (($percentage / 100) * $amount);

            $invest = (object) array(
                "profit"=>$profit,
                "amount"=>$amount,
                "total"=>$profit + $amount,
                "id" => $request->plan_id,
            );


            return view('user.invest.preview',compact('invest'));



        }



    }
    public function confirm(Request $request){

        $this->validate($request, [

            'plan_id'=> 'required|numeric',
            'amount' => 'required|numeric',
            'tos' => 'required|accepted',

        ]);

        $plan = Plan::find($request->plan_id);

        $user = Auth::user();

        $user->profile->deposit_balance = $user->profile->deposit_balance - $request->amount;

        $user->profile->save();

        $delay = $plan->start_duration;

        $today = Carbon::now();

        $investment = new Invest();
        $investment->user_id = $user->id;
        $investment->plan_id = $request->plan_id;
        $investment->reference_id = str_random(12);
        $investment->amount = $request->amount;
        $investment->start_time = $today->addHours($delay);
        $investment->status = 0;

        $investment->save();

        $interest = new Interest();
        $interest->invest_id = $investment->id;
        $interest->user_id = $user->id;
        $interest->reference_id = str_random(12);
        $interest->start_time = $today->addHours($delay);
        $interest->total_repeat = 0;
        $interest->status = 0;

        $interest->save();


        session()->flash('message', 'Vous avez investi €'.$request->amount.' Vous recevrez une notification aussitôt que les intérêts soit disponibles.');
        Session::flash('type', 'success');
        Session::flash('title', 'Investi avec succès');

        return redirect()->route('userInvest.history');
    }

}
