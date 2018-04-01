<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserReferred;
use App\Profile;
use App\Reflink;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $current_date = date('Y-m-d');
		$one_month_date_late = date('Y-m-d',strtotime('+30 days',strtotime($current_date)));

       $user = User::create([

            'name' => $data['first_name'].' '.$data['last_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'admin'=>0,
            'active'=>0,
            'membership_id'=>0,
			'member_name'=>'FREE',
            'membership_started'=>date('Y-m-d'),
            'membership_expired'=>$one_month_date_late,
            'token'=>str_random(25),

        ]);


        Profile::create([

            'user_id'=>$user->id,
            'address'=>$user->address,
            'city'=>$user->city,
            'country'=>$user->country,
            'post_code'=>$user->post_code,
            'state'=>$user->state,
            'avatar'=>'uploads/avatars/default.jpg',
        ]);



        Reflink::create([

            'user_id'=> $user->id,
            'link'=> str_random(4).$user->id.str_random(4),

        ]);

        $user->sendVerificationEmail();

        event(new UserReferred(request()->cookie('ref'), $user));

        session()->flash('message', 'Votre compte a été créer avec succès. Vous avez reçu un email contenant le lien d\'activation.');
        Session::flash('type', 'warning');
        Session::flash('title', 'Vérification email obligatoire');


        return $user;
    }
    
    
    public function register(Request $request)
    {

        $invalid_mail_servers = 'yopmail.com vmani.com mozej.com nwytg.com jetable.org mail-temporaire.fr emailure.net ';
        $invalid_countries= 'pakistan';

        $mail = $request->email;
        
        list($user, $domain) = explode('@', $mail);
        $mail_not_ok = strpos($invalid_mail_servers, $domain) !== false;
        $country_not_ok = strpos($invalid_countries, strtolower($request->country)) !== false;

        if($mail_not_ok)
            return back()->with( [ 'message' => 'Interdit d\'ouvrir un compte avec '.$domain ] )->withInput(Input::all());

        if($country_not_ok)
            return back()->with( [ 'message' => 'Unauthorized country '.$request->country ] )->withInput(Input::all());


        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        
        return redirect()->route( 'login' )->with( [ 'message' => 'Vous avez reçu un email contenant le lien d\'activation.' ] );

    }
}
