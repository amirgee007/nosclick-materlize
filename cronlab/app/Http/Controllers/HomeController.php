<?php

namespace App\Http\Controllers;

use App\Kyc;
use App\Kyc2;
use App\Membership;
use App\Notifications\KYC2VerifyAccept;
use App\Notifications\KYCVerifyAccept;
use App\Post;
use App\Testimonial;
use App\UserLog;
use App\Withdraw;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

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
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user();
         if(isset($request->m_operation_id) && isset($request->m_sign))
         {

//            if (!in_array($_SERVER['REMOTE_ADDR'],   array('37.59.221.230')))
//                return 'ip address issue for peyeer';

            $m_key = config('payeer.m_key');

            $arHash   =   array(
                $request->m_operation_id,
                $request->m_operation_ps,
                $request->m_operation_date,
                $request->m_operation_pay_date,
                $request->m_shop,
                $request->m_orderid,
                $request->m_amount,
                $request->m_curr,
                $request->m_desc,
                $request->m_status
            );

            if   (isset($request->m_params)) {
                $arHash[]   =   $request->m_params;
            }

            $arHash[]   =   $m_key;

            $sign_hash   =   strtoupper(hash('sha256',   implode(':',   $arHash)));


            if   ($request->m_sign   ==   $sign_hash   &&   $request->m_status   ==   'success') {

                $new_amount = UserDepositsController::payeerConfirm($request->all() , $user);
                session()->flash('message', 'Après déduction des frais de transaction, le montant total de dépôt de € ' . $new_amount . ' a été transférer avec succès. Les fonds sont automatiquement créditer à votre solde. Arpès une vérification de sécurité');
                Session::flash('type', 'success');
                Session::flash('title', 'Votre dépôt');

//              exit($request->m_orderid.'|success');
            }
            else{
                session()->flash('message', 'payment not successfully done with ID '.$request->m_orderid);
                Session::flash('type', 'error');
                Session::flash('title', 'Payment Verification');
//              exit($request->m_orderid.'|error');
            }
             
        }



        
        $withdraw = Withdraw::whereUser_id($user->id)->whereStatus(1)->select('amount')->sum('amount');;

        $posts = Post::inRandomOrder()->take(6)->get();

        $identity= Kyc::whereUser_id($user->id)->get();
        $address= Kyc2::whereUser_id($user->id)->get();
        
        return view('user.index',compact('user','identity','address','posts','withdraw'));
    }





    public function kyc()
    {
        $user= Auth::user();
        $result1= Kyc::whereUser_id($user->id)->first();
        $result2= Kyc2::whereUser_id($user->id)->first();
        return view('user.kyc',compact('user','result1','result2'));
    }

    public function kycSubmit(Request $request)
    {
        $user= Auth::user();
        $back = 'img/image_placeholder.jpg';
        $is_exist = Kyc::where('user_id' ,$user->id)->first();

        if($is_exist){
            session()->flash('message', 'you have Already submitted the verification');
            Session::flash('type', 'message');
            Session::flash('title', 'Already sent');

            return redirect()->back();
        }


        $this->validate($request, [
            'name'=> 'required|max:25',
            'front' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',
            'number' => 'required|max:50',
            'dob' => 'required|date',

        ]);


        if ($request->hasFile('back')){
            $this->validate($request, [
                'back' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072'
            ]);

            $back = $request->back;
            $back_new_name = time().$back->getClientOriginalName();
            $back->move('uploads/verifications', $back_new_name);
            $back= 'uploads/verifications/' . $back_new_name;
        }

            $front = $request->front;

            $front_new_name = time().$front->getClientOriginalName();

            $front->move('uploads/verifications', $front_new_name);

            $kyc = Kyc::create([

                'name' => $request->name,
                'user_id' => $user->id,
                'number' => $request->number,
                'back' => $back,
                'front' => 'uploads/verifications/' . $front_new_name,
                'dob' => $request->dob,
                'status' => 0,

            ]);
        
        $user->notify(new KYCVerifyAccept($user));

        session()->flash('message', 'Votre demande de vérification a été envoyée avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Demande envoyée');

        return redirect()->route('userKyc');
    }

    public function kyc2Submit(Request $request)
    {
        $user= Auth::user();

        $this->validate($request, [

            'name'=> 'required|max:25',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:3072',

        ]);

        $photo = $request->photo;

        $photo_new_name = time().$photo->getClientOriginalName();

        $photo->move('uploads/verifications', $photo_new_name);

        $kyc2 = Kyc2::create([

            'name' => $request->name,
            'user_id' => $user->id,
            'photo' => 'uploads/verifications/' . $photo_new_name,
            'status' => 0,

        ]);

        $user->notify(new KYC2VerifyAccept($user));

        session()->flash('message', 'Votre demande de vérification a été envoyée avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Demande envoyée');

        return redirect()->route('userKyc');
    }



    public function earnHistory()
    {
        $user= Auth::user();

        $earns = UserLog::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(20);


        return view('user.history.earn',compact('earns'));
    }

        public function newsHistory()
    {
        $user= Auth::user();




        return view('user.news',compact('news'));
    }

    public function review()
    {
        $user = Auth::user();

        $review = Testimonial::whereUser_id($user->id)->get();

        return view('user.testimonial',compact('review'));
    }
    public function reviewPost(Request $request)
    {
        $this->validate($request, [

            'title'=> 'required|min:20|max:100',
            'comment' => 'required|min:50|max:500',

        ]);

        $user = Auth::user();

        $testionial= Testimonial::create([

            'title' => $request->title,
            'comment' => $request->comment,
            'user_id' => $user->id,
            'status' => 0,

        ]);

        session()->flash('message', 'Votre avis a été soumis avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Soumis avec succès');

        return redirect()->route('userDashboard');


    }


}
