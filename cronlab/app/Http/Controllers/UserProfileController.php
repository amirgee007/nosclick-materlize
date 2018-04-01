<?php

namespace App\Http\Controllers;

use App\Kyc;
use App\Kyc2;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
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

        $user= Auth::user();

        $identity= Kyc::whereUser_id($user->id)->get();
        $address= Kyc2::whereUser_id($user->id)->get();

        $result1= Kyc::whereUser_id($user->id)->first();
        $result2= Kyc2::whereUser_id($user->id)->first();


        return view('user.profile',compact('user','identity','address','result1','result2'));

    }

    public function update(Request $request)
    {

        $user= Auth::user();

        $this->validate($request, [

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'occupation' => 'required|max:30',
            'mobile' => 'required|min:8|max:16',
            'address' => 'required|max:50',
            'city' => 'required|max:30',
            'state' => 'required|max:30',
            'postcode' => 'required|max:20'

        ]);

        if ($request->hasFile('avatar')){

            $this->validate($request, [

                'avatar' => 'required|image|mimes:jpeg,bmp,png,jpg'
            ]);


            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/'. $avatar_new_name;

            $user->profile->save();

        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->profile->occupation = $request->occupation;
        $user->profile->mobile = $request->mobile;
        $user->profile->address = $request->address;
        $user->profile->address2 = $request->address2;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->postcode = $request->postcode;
        $user->profile->country = $request->country;
        $user->profile->facebook = $request->facebook;
        $user->profile->about = $request->about;


        $user->save();

        $user->profile->save();

        if ($request->has('password')){

            $user->password = bcrypt($request->password);

            $user->save();


        }



        session()->flash('message', 'Votre profil a été mis à jour avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Mis à jour réussi');

        return redirect()->back();

    }


}
