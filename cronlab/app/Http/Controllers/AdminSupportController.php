<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\UserSupportReply;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminSupportController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('admin');

    }

    public function index()
    {

        $supports = Support::whereStatus(0)->orderBy('created_at','asc')->paginate(20);

        return view('admin.support.index',compact('supports'));
    }

    public function open()
    {

        $open_supports = Support::wherein('status', [1,3])->orderBy('id','desc')->paginate(15);

        return view('admin.support.open',compact('open_supports'));
    }

    public function show($ticket)
    {

        $user = Auth::user();

        $support = Support::where('ticket',$ticket)->first();

        $discussions = Discussion::whereSupport_id($support->id)->get();

        return view('admin.support.show',compact('support','user','discussions'));
    }
    public function close($id)
    {
        //

        $support = Support::find($id);

        $support->status = 0;

        $support->save();

        session()->flash('message', 'Le ticket a été fermé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Fermé avec succès');


        return redirect()->route('adminSupports.open');


    }
    public function store(Request $request, $ticket)
    {

        $this->validate($request, [

            'body' => 'required|min:20|max:4000',

        ]);

        $support = Support::where('ticket',$ticket)->first();

        $support -> status = 2;

        $support->save();

        $user1 = Auth::user();

        $discussion = Discussion::create([

            'support_id' => $support->id,
            'message' => $request->body,
            'user_id' => $user1->id,
            'type'=>1

        ]);

        $user = $support ->user;

        $user->notify(new UserSupportReply($user));

        session()->flash('message', 'Votre message a été envoyé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Envoyer avec succès');


        return redirect()->route('adminSupports.open');
    }

}
