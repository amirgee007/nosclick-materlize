<?php

namespace App\Http\Controllers;

use App\Gateway;
use App\Offline;
use App\Settings;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Kyc;
use App\Kyc2;

class UserWithdrawsController extends Controller
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

    public function index()
    {
        $user=Auth::user();

        $withdraws= Withdraw::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(15);

        $settings = Settings::first();

        return view('user.withdraw.index',compact('withdraws','settings'));
    }

    public function create()
    {

        $gateways = Offline::all();
        $gate = Gateway::first();
        $user = Auth::user();
        $settings = Settings::first();

        return view('user.withdraw.create',compact('gateways','user','settings','gate'));
    }

    public function postWithdraw(Request $request)
    {
        $this->validate($request, [
            'gateway'=> 'required|numeric',
            'amount' => 'required|numeric',
            'account' => 'required',
        ]);

        $user = Auth::user();

        $settings = Settings::first();

        if ($settings->minimum_withdraw > $request->amount){

            session()->flash('message', 'Le minimum de retrait est de € '.$settings->minimum_withdraw.'  ');
            Session::flash('type', 'error');
            Session::flash('title', 'Retrait minimum');

            return redirect(route('userWithdraw.create'));


        }
        if ($user->profile->main_balance < $request->amount){

            session()->flash('message', "Votre solde est insuffisant. Votre solde actuel est de € ".$user->profile->main_balance."  ");
            Session::flash('type', 'warning');
            Session::flash('title', 'Solde insuffisant');

            return redirect(route('userWithdraw.create'));


        }

        if ($request->gateway == 1000){

            $gateway= Gateway::first();

            $percentage =  $gateway->percent;
            $fixed =  $gateway->fixed;
            $charge = (($percentage / 100) * $request->amount) + $fixed;

            $new_amount = $request->amount - $charge;
            $withdraw= Withdraw::create([

                'transaction_id' => str_random(6).$user->id.str_random(6),
                'user_id'=> $user->id,
                'gateway_name'=> $gateway->name,
                'amount'=> $request->amount,
                'charge'=> $charge,
                'net_amount'=> $new_amount,
                'status'=> 0,
                'account'=> $request->account,

            ]);

            session()->flash('message', 'Après facturation des frais de transfert, le montant total de retrait net est de € '.$new_amount.' vous à été transférer avec succès. Les fonds sont automatiquement transférer sur votre compte, après une vérification de sécurité par notre système. ');
            Session::flash('type', 'success');
            Session::flash('title', 'Demande de retrait');

            return redirect(route('userWithdraws'));

        }

        $gateway= Offline::whereId($request->gateway)->first();
        $percentage =  $gateway->percent;
        $fixed =  $gateway->fixed;
        $charge = (($percentage / 100) * $request->amount) + $fixed;
        $new_amount = $request->amount - $charge;

            $withdraw= Withdraw::create([

                'transaction_id' => str_random(6).$user->id.str_random(6),
                'user_id'=> $user->id,
                'gateway_name'=> $gateway->name,
                'amount'=> $request->amount,
                'charge'=> $charge,
                'net_amount'=> $new_amount,
                'status'=> 0,
                'account'=> $request->account,

            ]);

            session()->flash('message', 'Après facturation des frais de transfert, le montant total de retrait net est de € '.$new_amount.' vous à été transférer avec succès. Les fonds sont automatiquement transférer sur votre compte, après une vérification de sécurité par notre système. ');
            Session::flash('type', 'success');
            Session::flash('title', 'Demande de retrait');

            return redirect(route('userWithdraws'));

    }





}
