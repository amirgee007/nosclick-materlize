<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\UserSupportAccept;
use App\Support;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Kyc;
use App\Kyc2;

class UserSupportsController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = Auth::user();

        $supports = Support::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(15);

        return view('user.support.index',compact('supports'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('user.support.create');


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

            'subject'=> 'required|min:10|max:200',
            'body' => 'required|min:10|max:4000',

        ]);

        $user = Auth::user();

        $support = Support::create([

            'ticket' => str_random(12),
            'subject' => $request->subject,
            'message' => $request->body,
            'user_id' => $user->id,
            'status' => 1

        ]);

        $user->notify(new UserSupportAccept($user));

        session()->flash('message', 'Votre ticket a été créé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');


        return redirect()->route('userSupports');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        //

        $user = Auth::user();

        $support = Support::where('ticket',$ticket)->first();


        $discussions = Discussion::whereSupport_id($support->id)->get();

        return view('user.support.show',compact('support','discussions','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        //

        $support = Support::find($id);

        $support->status = 0;

        $support->save();

        session()->flash('message', 'Votre ticket a été fermé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Ticket fermé');


        return redirect()->route('userSupports');


    }

    public function message(Request $request, $ticket)
    {

        $this->validate($request, [

            'body' => 'required|min:10|max:4000',

        ]);

        $support = Support::where('ticket',$ticket)->first();

        $support -> status = 3;

        $support->save();


        $user = Auth::user();

        $discussion = Discussion::create([

            'support_id' => $support->id,
            'message' => $request->body,
            'user_id' => $user->id,
            'type'=>0

        ]);

        session()->flash('message', 'Votre réponse a été envoyé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Envoyer avec succès');


        return redirect()->route('userSupports');
    }



}
