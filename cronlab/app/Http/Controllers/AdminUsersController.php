<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{

    public function __construct()
    {

        $this->middleware('admin');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $s= $request->input('s');

        $users = User::latest()->search($s)->paginate(10);

        return view('admin.users.index',compact('users','s'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('admin.users.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);

        $user = User::create([

            'name' => $request->first_name.' '.$request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $profile = Profile::create([

            'user_id' => $user->id,
            'avatar'=>'uploads/avatars/default.jpg'

        ]);

        session()->flash('message', 'Le compte a été créé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');

        return redirect()->route('admin.users.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $user=User::find($id);

        return view('admin.users.edit',compact('user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

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

            $user = User::find($id);


        if ($request->hasFile('avatar')){

            $this->validate($request, [

                'avatar' => 'required|image'
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
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->profile->main_balance = $request->main_balance;
        $user->profile->referral_balance = $request->referral_balance;
        $user->profile->deposit_balance = $request->deposit_balance;
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



        session()->flash('message', 'Le compte a été mis à jour avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Mis à jour réussi');

        return redirect(route('admin.users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        if (fileExists($user->profile->avatar)){

            unlink($user->profile->avatar);

        }

        $user->profile->delete();
        $user->delete();

        session()->flash('message', 'Le compte a été supprimé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Compte supprimé');

        return redirect()->back();


    }
    public function admin($id)
    {
        $user = User::find($id);

        $user->admin=1;

        $user->save();

        session()->flash('message', 'Le compte a obtenu avec succès l\'autorisation d\'administration.');
        Session::flash('type', 'success');
        Session::flash('title', 'Permission accordée');

        return redirect()->back();


    }
    public function adminRemove($id)
    {
        $user = User::find($id);

        $user->admin=0;

        $user->save();

        session()->flash('message', 'L\'autorisation d\'administration du compte a été supprimé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Permission supprimée');

        return redirect()->back();


    }

}
