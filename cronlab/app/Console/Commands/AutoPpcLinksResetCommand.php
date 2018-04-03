<?php

namespace App\Console\Commands;

use App\Advert;
use Illuminate\Console\Command;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;

class AutoPpcLinksResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto-reset:ppc-links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' think that the current system takes into consideration the time at which it did their last visualizations to be able to re-visualize 24 hours later';

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
        $total = Advert::where('status' ,1)->count();

        Advert::where('status' ,1)->update(['status' => 0]);
        Mail::raw('AutoPpcLinksResetCommand has been completed for total: '.$total, function($message) {
            $message->to('info@nosclick.com', 'Nosclicks')->subject
            ('Auto Adverts reset job status');
            $message->from('info@nosclick.com','nosclicks.com');
        });
    }

}
