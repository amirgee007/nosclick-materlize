<?php

namespace App\Http\Controllers;
use App\Faq;
use App\Inbox;
use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Membership;
use App\Notifications\AccountActiveSuccess;
use App\Page;
use App\Profile;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use SocialAuth;
use App\Deposit;
use App\Post;
use App\Withdraw;
use Illuminate\Http\Request;

class GuestController extends Controller
{


    public function test(){

        $users = User::all();
        foreach ( $users as $user){


            $name = $user->name;
            $splitName = explode(' ', $name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

            $data['first_name']= $splitName[0];
            $data['last_name']= !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty

            $user->update($data);

            echo $name;
            echo '-';
        }

        dd('done');
    }

    public function index()
    {

        $deposits = Deposit::orderBy('created_at','desc')->take(10)->get();
        $withdraws = Withdraw::orderBy('created_at','desc')->take(10)->get();
        $testimonials=Testimonial::inRandomOrder()->take(3)->get();

        return view('welcome',compact('deposits','withdraws','testimonials'));
    }


    public function interest()
    {

        Artisan::call('schedule:run');


    }
    public function aboutMe()
    {


        return view('about');
    }

    public function EmailContact(Request $request)
    {

        $this->validate($request, [

            'name'=> 'required|min:5|max:200',
            'subject' => 'required|min:10|max:200',
            'email' => 'required|email',
            'body' => 'required|min:200|max:3000',

        ]);

        $inbox = new Inbox();

        $inbox->name = $request->name;
        $inbox->email = $request->email;
        $inbox->subject = $request->subject;
        $inbox->details = $request->body;
        $inbox->status = 0;
        $inbox->save();


        session()->flash('message', 'Votre message a bien été envoyé à l\'agent du support.');
        Session::flash('type', 'success');
        Session::flash('title', 'Envoyer avec succès');


        return redirect()->back();

    }




    public function auth($provider)
    {


        return  SocialAuth::authorize($provider);
    }

    public function auth_callback($provider)
    {
        SocialAuth::login($provider, function ($user, $details) {

            $membership=Membership::first();
            $user->name = $details->full_name;
            $user->email = $details->email;
            $user->active = 1;
            $user->membership_id = $membership->id;
            $user->membership_started = Carbon::today();
            $today = Carbon::today();
            $user->membership_expired = $today->addDays($membership->duration);
            $user->save();

            Profile::create([

                'user_id'=>$user->id,
                'avatar'=>'uploads/avatars/default.jpg',
                'main_balance'=>0.00,
                'deposit_balance'=>0.00,
                'referral_balance'=>0.00,
                'mobile'=>'',
                'occupation'=>'',
                'address'=>'',
                'address2'=>'',
                'country'=>'',
                'city'=>'',
                'state'=>'',
                'postcode'=>'',
                'about' => '',
                'facebook' =>'',

            ]);


        });
        session()->flash('message', 'Vous êtes connecté');
        Session::flash('type', 'success');
        Session::flash('title', 'Connexion avec succès');
        return redirect()->route('userDashboard');


    }



    public function contact()
    {

        $faqs = Faq::all();


        return view('contact',compact('faqs'));
    }

    public function services()
    {


        return view('services');
    }


    public function tutorials()
    {

        $posts = Post::latest()->paginate(10);

        $user = User::whereAdmin(1)->first();


        return view('blog',compact('posts','user'));
    }

    public function proof()
    {


        $withdraws = Withdraw::orderBy('created_at','desc')->paginate(30);


        return view('proof',compact('withdraws'));
    }

    public function verify($token)
    {

        $user = User::where('token',$token)->firstOrfail();

        $user->token = null;
        $user->active = 1;
        $user->save();

        $user->notify(new AccountActiveSuccess($user));

        session()->flash('message', 'Votre adresse email a été vérifiée avec succès');
        Session::flash('type', 'success');
        Session::flash('title', 'Vérifié avec succès');


        return redirect()->route('userDashboard');
    }


    public function tutorialView($slug)
    {

        $post = Post::where('slug',$slug)->first();
        $user = User::whereAdmin(1)->first();

        return view('blogview', compact('post','user'));
    }

    public function pageView($slug)
    {

        $page = Page::where('slug',$slug)->first();

        return view('singlepage',compact('page'));
    }

}
