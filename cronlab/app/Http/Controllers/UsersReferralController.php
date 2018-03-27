<?php

namespace App\Http\Controllers;

use App\Referral;
use App\ReferralLink;
use App\ReferralRelationship;
use App\Reflink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kyc;
use App\Kyc2;

class UsersReferralController extends Controller
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
        $user = Auth::user();

        $code= $user->reflink->link;
        $link = url('register') . '?ref=' . $code;
        $sponsor = null;

        $referral = Referral::where('user_id','=',$user->id)->first();

        if(isset($referral->reflink->user)){
            $sponsor = $referral->reflink->user;
        }
        $reflink = Reflink::where('user_id',$user->id)->first();

        $referrals = Referral::where('reflink_id','=',$reflink->id)->get();

        return view('user.myreferral',compact('referrals','link' ,'sponsor'));
    }

}
