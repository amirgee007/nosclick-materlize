<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Invest;
use App\Kyc;
use App\Kyc2;
use App\Profile;
use App\Settings;
use App\Testimonial;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('admin');

    }

    public function index()
    {

        $deposit_notify = Deposit::whereStatus(0)->get();
        $withdraw_notify = Withdraw::whereStatus(0)->get();
        $kyc_notify = Kyc::whereStatus(0)->get();
        $kyc2_notify = Kyc2::whereStatus(0)->get();

        $earn = Profile::select('main_balance')->sum('main_balance');
        $deposit = Profile::select('deposit_balance')->sum('deposit_balance');
        $invest = Invest::select('amount')->sum('amount');
        $pending = Withdraw::whereStatus(0)->select('amount')->sum('amount');

        return view('admin.index',compact('deposit_notify','withdraw_notify',
            'kyc_notify','kyc2_notify','earn','deposit','invest','pending'));
    }

    public function userDeposits()
    {
        $deposits= Deposit::whereStatus(1)->orderBy('created_at','desc')->paginate(20);

        $settings = Settings::first();

        return view('admin.deposit.index',compact('deposits','settings'));


    }
    public function userWithdraws()
    {
        $withdraws= Withdraw::whereStatus(1)->orderBy('created_at','desc')->paginate(20);

        $settings = Settings::first();

        return view('admin.withdraw.index',compact('withdraws','settings'));


    }
    public function userWithdrawsRequest()
    {
        $withdraws= Withdraw::whereStatus(0)->orderBy('created_at','desc')->paginate(20);

        $settings = Settings::first();

        return view('admin.withdraw.request',compact('withdraws','settings'));


    }

    public function localDeposits()
    {
        $deposits= Deposit::whereStatus(0)->orderBy('created_at','desc')->paginate(20);

        $settings = Settings::first();

        return view('admin.deposit.local',compact('deposits','settings'));


    }

    public function localDepositsUpdate($id)
    {


        $deposit= Deposit::find($id);

        $user = $deposit->user;

        $user->profile->deposit_balance = $user->profile->deposit_balance +  $deposit->net_amount;

        $user->profile->save();

        $deposit->status = 1;

        $deposit->save();



        session()->flash('message', 'Demande de dépôt du membre a été approuvée avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Dépôt approuvé');

        return redirect()->back();


    }

    public function localDepositsFraud($id)
    {


        $deposit= Deposit::find($id);
        $deposit->status = 1;
        $deposit->save();



        session()->flash('message', 'Dépôt du membre a été défini comme une fraude');
        Session::flash('type', 'success');
        Session::flash('title', 'Fraude avec succès');

        return redirect()->back();
    }

    public function payment($id)
    {
        $withdraw= Withdraw::find($id);

        $user =  $withdraw->user;

        $user->profile->main_balance = $user->profile->main_balance - $withdraw->amount;

        $user->profile->save();

        $withdraw->status = 1;

        $withdraw->save();

        session()->flash('message', 'La demande de retrait du membre a été approuvée avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Retrait approuvé');

        return redirect()->back();
    }

    public function withdrawFraud($id)
    {
        $withdraw= Withdraw::find($id);
        $withdraw->status = 1;
        $withdraw->save();

        session()->flash('message', 'Le retrait du membre a été défini comme une fraude');
        Session::flash('type', 'success');
        Session::flash('title', 'Fraude avec succès');

        return redirect()->back();
    }
    public function review()
    {
        $reviews= Testimonial::latest()->paginate(20);

        return view('admin.testimonials.index',compact('reviews'));
    }

    public function reviewPublish($id)
    {
        $review= Testimonial::find($id);

        $review->status = 1;

        $review->save();

        session()->flash('message', 'Avis du membre publiée avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Publié avec succès');

        return redirect()->back();
    }
    public function reviewUnPublish($id)
    {
        $review= Testimonial::find($id);

        $review->status = 0;

        $review->save();

        session()->flash('message', 'L\'avis du memnre a été dépublié avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Dépublié avec succès');

        return redirect()->back();
    }



}
