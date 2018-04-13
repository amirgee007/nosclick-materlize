<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Ppv;
use App\Ptc;
use App\Referral;
use App\ReferralRelationship;
use App\Settings;
use App\UserLog;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Kyc;
use App\Kyc2;

class UserAdvertsController extends Controller
{
    
    public $user;
    public $result1;
    public $result2;
    public function __construct() {
        
            $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            
            $this->result1= Kyc::whereUser_id($this->user->id)->first();
            $this->result2= Kyc2::whereUser_id($this->user->id)->first();
            
            \View::share([ 'result1' => $this->result1 ,'result2'=> $this->result2]);
            
            return $next($request);
            });
            
            
    }


    public function cashLinks()
    {

        $user = Auth::user();
        $settings = Settings::first();

        $ad_limit = $user->membership->ad_limit;

        $membership = $user->membership->id;

        $ad = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->count();

        if ($ad == 0)
        {
            $ptcse = Ptc::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->count();

            if ($ptcse == 0){

                session()->flash('message', 'Il y a actuellement aucune publicité disponible pour vous. Veuillez patienter ou mettre à jour votre abonnement ');
                Session::flash('type', 'error');
                Session::flash('title', 'Erreur');

                return redirect()->route('userMemberships');

            }
            else {

                $ptcs = Ptc::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->get();

                foreach ($ptcs as $ptc)
                {
                    $info =([

                        'user_id'=> $user->id,
                        'date'=> date('Y-m-d'),
                        'ptc_id'=> $ptc->id,

                    ]);

                    Advert::create($info);
                }

                $adverts = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);

                return view('user.viewads.index',compact('adverts','settings'));

            }

        }else{

            $adverts = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);
            return view('user.viewads.index',compact('adverts','settings'));
        }

    }

    public function cashLinkConfirm($id)
    {
        try {

            $user = Auth::user();

            $advert= Advert::findOrFail($id);

            if ($advert-> status == 1){

                session()->flash('message', 'La publicité a déjà été vue.');
                Session::flash('type', 'warning');
                Session::flash('title', 'Infructueux');

                return redirect()->route('userCash.links');


            }
            $advert->status = 1;
            $advert->save();

            $rewards = $advert->ptc->rewards;

            $profile = $user->profile;

            $profile->main_balance = $profile->main_balance + $rewards;

            $profile->save();

            $log = UserLog::create([

                'user_id' => $user->id,
                'reference' => str_random(12),
                'for' => 'Lien payant',
                'from' => 'Auto',
                'details'=>'Vous avez reçu des gains directs (Lien PPC)',
                'amount'=>$rewards,

            ]);


            $upliner = Referral::whereUser_id($user->id)->count();

            if ($upliner == 1){

                $settings = Settings::first();

                $referral = Referral::whereUser_id($user->id)->first();

                $upliner = $referral->reflink->user->profile;

                $percentage = $settings->referral_advert;

                $commission = (($percentage / 100) * $rewards);

                $upliner->referral_balance = $upliner->referral_balance + $commission;

                $upliner->save();


                $log = UserLog::create([

                    'user_id' => $referral->reflink->user->id,
                    'reference' => str_random(12),
                    'for' => 'Parrainage',
                    'from' => $user->name,
                    'details'=>'Vous avez reçu un bonus de parrainage (Lien PPC)',
                    'amount'=>$commission,

                ]);

            }

            session()->flash('message', 'Annonce vu avec succès');
            Session::flash('type', 'success');
            Session::flash('title', 'Confirmer avec succès');


            return redirect()->route('userCash.links');



        } catch (\Exception $ex) {
            session()->flash('message', 'Some data is missing of your referal.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Infructueux');
            return redirect()->route('userCash.links');

        }


    }
    public function cashLinkShow($id)
    {

        $advert= Advert::findOrFail($id);
        return view('user.viewads.showads', compact('advert'));

    }

    public function cashVideoConfirm($id)
    {
        $user = Auth::user();

        $video= Video::findOrFail($id);

        if ($video-> status == 1){
            session()->flash('message', 'La publicité a déjà été vue.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Infructueux');
            return redirect()->route('userCash.videos');
        }

        $video->status = 1;
        $video->save();

        $rewards = $video->ppv->rewards;

        $profile = $user->profile;

        $profile->main_balance = $profile->main_balance + $rewards;

        $profile->save();

        $log = UserLog::create([

            'user_id' => $user->id,
            'reference' => str_random(12),
            'for' => 'Video payante',
            'from' => 'Auto',
            'details'=>'Vous avez reçu des gains directs (Video PPV)',
            'amount'=>$rewards,

        ]);

        $upliner = Referral::whereUser_id($user->id)->count();

        if ($upliner == 1){

            $settings = Settings::first();

            $referral = Referral::whereUser_id($user->id)->first();

            $upliner = $referral->reflink->user->profile;

            $percentage = $settings->referral_advert;

            $commission = (($percentage / 100) * $rewards);

            $upliner->referral_balance = $upliner->referral_balance + $commission;

            $upliner->save();


            $log = UserLog::create([

                'user_id' => $referral->reflink->user->id,
                'reference' => str_random(12),
                'for' => 'Parrainage',
                'from' => $user->name,
                'details'=>'Vous avez reçu un bonus de parrainage (Vidéo PPV)',
                'amount'=>$commission,

            ]);

        }


        session()->flash('message', 'Annonce vidéo vu avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Confirmer avec succès');

        return redirect()->route('userCash.videos');


    }





    public function cashVideoShow($id)
    {

        $video= Video::findOrFail($id);
        return view('user.viewads.vshow', compact('video'));

    }


    public function cashVideos()
    {

        $user = Auth::user();
        $settings = Settings::first();

        $ad_limit = $user->membership->ad_limit;

        $membership = $user->membership->id;

        $ad = Video::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->count();

        if ($ad == 0)
        {
            $ppvse = Ppv::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->count();

            if ($ppvse == 0){

                session()->flash('message', 'Il y a actuellement aucune vidéo disponible pour vous. Veuillez patienter ou mettre à jour votre abonnement ');
                Session::flash('type', 'error');
                Session::flash('title', 'Erreur');

                return redirect()->route('userMemberships');

            }
            else {

                $ppvs = Ppv::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->get();

                foreach ($ppvs as $ppv)
                {
                    $info =([

                        'user_id'=> $user->id,
                        'date'=> date('Y-m-d'),
                        'ppv_id'=> $ppv->id,

                    ]);

                    Video::create($info);
                }

                $videos = Video::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);

                return view('user.viewads.vindex',compact('videos','settings'));

            }

        }else{

            $videos = Video::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);
            return view('user.viewads.vindex',compact('videos','settings'));
        }



    }
}
