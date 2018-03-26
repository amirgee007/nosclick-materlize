<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Membership;
use App\Referral;
use App\Settings;
use App\UserLog;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Kyc;
use App\Kyc2;

class UserMembershipsController extends Controller
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



        $user = Auth::user();

        $memberships = Membership::whereStatus(1)->get();

        return view('user.upgrade.index',compact('memberships','user'));
    }

    public function upgrade($id){

        $user = Auth::user();

        $membership = Membership::find($id);

        $balance = $user->profile->deposit_balance;

        if ($membership->price > $balance){

            session()->flash('message', 'Votre solde est insuffisant.');
            Session::flash('type', 'error');
            Session::flash('title', 'Solde insuffisant');

            return redirect()->back();
        }

        $user->profile->deposit_balance = $user->profile->deposit_balance - $membership->price;

        $user->profile->save();

        $user->membership_id = $membership->id;

        $user->membership_started = Carbon::today();

        $today = Carbon::today();

        $user->membership_expired = $today->addDays($membership->duration);

        $user->save();

        $upliner = Referral::whereUser_id($user->id)->count();

        if ($upliner == 1){

            $settings = Settings::first();

            $referral = Referral::whereUser_id($user->id)->first();

            $upliner = $referral->reflink->user->profile;

            $percentage = $settings->referral_upgrade;

            $commission = (($percentage / 100) * $membership->price);

            $upliner->referral_balance = $upliner->referral_balance + $commission;

            $upliner->save();

            $log = UserLog::create([

                'user_id' => $referral->reflink->user->id,
                'reference' => str_random(12),
                'for' => 'Parrainage',
                'from' => $user->name,
                'details'=>'Vous avez reçu un bonus de parrainage pour la mise à niveau d\'un abonnement',
                'amount'=>$commission,

            ]);

        }

        $advert= Advert::whereUser_id($user->id);

        $advert->delete();

        $advert= Video::whereUser_id($user->id);

        $advert->delete();
        
        $user::where('id',$user->id)->update(['member_name'=>$membership->name]);

        session()->flash('message', 'Vous avez mise à jour votre compte en '.$membership->name.'.');
        Session::flash('type', 'success');
        Session::flash('title', 'Mise à jour réussi');

        return redirect()->back();

    }

}
