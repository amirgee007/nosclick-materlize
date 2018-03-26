<?php

namespace App\Http\Controllers;

use App\Notifications\RecivedMoneySuccess;
use App\Notifications\SendMoneySuccess;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Kyc;
use App\Kyc2;

class UserFundsTransferController extends Controller
{
    //
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

        $settings = Settings::first();

        return view('user.transfer.index',compact('settings'));
    }

    public function self(Request $request){


        if ($request->account == 1){

            $this->validate($request, [

                'account' => 'required|min:1',
                'transfer'=> 'required|min:1|max:2',
                'amount'=> 'required|numeric',
            ]);

            $user = Auth::user()->profile;
            $balance = $user->deposit_balance;
            $reamount = $request->amount;

            if ($reamount > $balance){

                session()->flash('message', "Votre solde est insuffisant");
                Session::flash('type', 'error');
                Session::flash('title', 'Solde insuffisant');

                return redirect()->back();
            }
            $user->deposit_balance = $user->deposit_balance - $request->amount;
            $user->save();

            $settings= Settings::first();

            $percentage =  $settings->self_transfer;
            $charge = (($percentage / 100) * $request->amount);
            $new_amount = $request->amount - $charge;

            if ($request->transfer == 1){

                $user->deposit_balance = $user->deposit_balance + $new_amount;
                $user->save();

            }
            else{

                $user->main_balance = $user->main_balance + $new_amount;
                $user->save();

            }

            session()->flash('message', 'Votre transfert a été effectué avec succès '.$percentage.'% Frais de transfert');
            Session::flash('type', 'success');
            Session::flash('title', 'Finalisé');

            return redirect()->route('userFundsTransfer');

        }
        elseif ($request->account == 2){

            $this->validate($request, [

                'account' => 'required|min:1',
                'transfer'=> 'required|min:1|max:2',
                'amount'=> 'required|numeric',
            ]);

            $user = Auth::user()->profile;
            $balance = $user->main_balance;
            $reamount = $request->amount;

            if ($reamount > $balance){

                session()->flash('message', "Votre solde est insuffisant");
                Session::flash('type', 'error');
                Session::flash('title', 'Solde insuffisant');

                return redirect()->back();
            }
            $user->main_balance = $user->main_balance - $request->amount;
            $user->save();

            $settings= Settings::first();

            $percentage =  $settings->self_transfer;
            $charge = (($percentage / 100) * $request->amount);
            $new_amount = $request->amount - $charge;

            if ($request->transfer == 1){

                $user->deposit_balance = $user->deposit_balance + $new_amount;
                $user->save();

            }
            else{

                $user->main_balance = $user->main_balance + $new_amount;
                $user->save();

            }

            session()->flash('message', 'Votre transfert a été effectué avec succès '.$percentage.'% Frais de transfert');
            Session::flash('type', 'success');
            Session::flash('title', 'Finalisé');

            return redirect()->route('userFundsTransfer');



        }
        else{

            $this->validate($request, [

                'account' => 'required|min:1',
                'transfer'=> 'required|min:1|max:2',
                'amount'=> 'required|numeric',
            ]);

            $user = Auth::user()->profile;
            $balance = $user->referral_balance;
            $reamount = $request->amount;

            if ($reamount > $balance){

                session()->flash('message', "Votre solde est insuffisant");
                Session::flash('type', 'error');
                Session::flash('title', 'Solde insuffisant');

                return redirect()->back();
            }
            $user->referral_balance = $user->referral_balance - $request->amount;
            $user->save();

            $settings= Settings::first();

            $percentage =  $settings->self_transfer;
            $charge = (($percentage / 100) * $request->amount);
            $new_amount = $request->amount - $charge;

            if ($request->transfer == 1){

                $user->deposit_balance = $user->deposit_balance + $new_amount;
                $user->save();

            }
            else{

                $user->main_balance = $user->main_balance + $new_amount;
                $user->save();

            }

            session()->flash('message', 'Votre transfert a été effectué avec succès '.$percentage.'% Frais de transfert');
            Session::flash('type', 'success');
            Session::flash('title', 'Finalisé');

            return redirect()->route('userFundsTransfer');



        }



    }

    public function others(Request $request){

        $this->validate($request, [

            'account' => 'required|min:1|max:2',
            'email'=> 'required|email',
            'amount'=> 'required|numeric|min:5',
        ]);


        $settings = Settings::first();

        $receiver_user = User::where('email',$request->email)->first();

        if ($receiver_user == null){

            session()->flash('message', "Aucun membre nosclick avec cette adresse email '".$request->email."'. Vérifiez si l'adresse email est correct.");
            Session::flash('type', 'error');
            Session::flash('title', 'Email invalide');

            return redirect()->route('userFundsTransfer');

        }

        $user = Auth::user();

        $type = $request->account;

        if ($type == 1){

            $balance = $user->profile->main_balance;

            $reamount = $request->amount;

            if ($reamount > $balance){

                session()->flash('message', "Votre solde est insuffisant");
                Session::flash('type', 'error');
                Session::flash('title', 'Solde insuffisant');

                return redirect()->route('userFundsTransfer');
            }

            $user->profile->main_balance = $user->profile->main_balance - $reamount;

            $user->profile->save();

            $percentage =  $settings->other_transfer;

            $charge = (($percentage / 100) * $reamount);

            $new_amount = $reamount - $charge;

            $receiver_user->profile->main_balance = $receiver_user->profile->main_balance + $new_amount;

            $receiver_user->profile->save();

            $data = (object) array(

                "user_name"=>$user->name,
                "amount"=>$reamount,
                "charge"=>$charge,
                "new_amount" =>$new_amount,
                "receiver_name"=>$receiver_user->name,
                "receiver_email"=>$receiver_user->email,
            );
			
          $user->notify(new SendMoneySuccess($data));

            $data = (object) array(

                "receiver_name"=>$receiver_user->name,
                "sender_name"=>$user->name,
                "amount"=>$new_amount,
                "sender_email"=>$user->email,
            );

            $receiver_user->notify(new RecivedMoneySuccess($data));

            session()->flash('message', 'Le montant total net de € '.$new_amount.' à été transféré avec succès.');
            Session::flash('type', 'success');
            Session::flash('title', 'Finalisé ');

            return redirect()->route('userFundsTransfer');

        }
        elseif ($type == 2){

            $balance = $user->profile->deposit_balance;

            $reamount = $request->amount;

            if ($reamount > $balance){

                session()->flash('message', "Votre solde est insuffisant");
                Session::flash('type', 'error');
                Session::flash('title', 'Solde insuffisant');

                return redirect()->route('userFundsTransfer');
            }

            $user->profile->deposit_balance = $user->profile->deposit_balance - $reamount;

            $user->profile->save();

            $percentage =  $settings->other_transfer;

            $charge = (($percentage / 100) * $reamount);

            $new_amount = $reamount - $charge;

            $receiver_user->profile->main_balance = $receiver_user->profile->main_balance + $new_amount;

            $receiver_user->profile->save();

            $data = (object) array(

                "user_name"=>$user->name,
                "amount"=>$reamount,
                "charge"=>$charge,
                "new_amount" =>$new_amount,
                "receiver_name"=>$receiver_user->name,
                "receiver_email"=>$receiver_user->email,
            );

            $user->notify(new SendMoneySuccess($data));

            $data = (object) array(

                "receiver_name"=>$receiver_user->name,
                "sender_name"=>$user->name,
                "amount"=>$new_amount,
                "sender_email"=>$user->email,
            );

            $receiver_user->notify(new RecivedMoneySuccess($data));

            session()->flash('message', 'Après facturation des frais de transaction, le montant total net de €  '.$new_amount.' à été transféré avec succès.');
            Session::flash('type', 'success');
            Session::flash('title', 'Finalisé');

            return redirect()->route('userFundsTransfer');


        }

        return redirect()->route('userFundsTransfer');
    }

}
