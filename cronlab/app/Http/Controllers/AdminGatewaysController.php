<?php

namespace App\Http\Controllers;

use App\Gateway;
use App\Offline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminGatewaysController extends Controller
{
    //

    public function index()
    {

        $gateways = Gateway::whereNotNull('name')->get();

        return view('admin.gateways.index',compact('gateways'));

    }

    public function localIndex()
    {

        $gateways = Offline::all();

        return view('admin.local.index',compact('gateways'));

    }

    public function edit($id)
    {

        $gateway= Gateway::find($id);
        return view('admin.gateways.edit', compact('gateway'));

    }
    public function localEdit($id)
    {
        //

        $gateway= Offline::find($id);

        return view('admin.local.edit', compact('gateway'));


    }

    public function localCreate()
    {


        return view('admin.local.create');


    }

    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [

            'name'=> 'required|max:100',
            'account' => 'required|max:100',
            'fixed' => 'required|numeric|max:100',
            'percent' => 'required|numeric|max:100',
            'ex_percent' => 'required|numeric|max:100',
            'status' => 'required|boolean',

        ]);

        $gateway= Gateway::find($id);

        if ($request->hasFile('image')){

            $this->validate($request, [

                'image' => 'required|image|mimes:jpeg,bmp,png,jpg'
            ]);

            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/gateways', $image_new_name);

            $gateway->image = 'uploads/gateways/'. $image_new_name;

        }

        $gateway->name = $request->name;

        $gateway->account = $request->account;

        $gateway->fixed = $request->fixed;

        $gateway->percent = $request->percent;

        $gateway->ex_percent = $request->ex_percent;

        $gateway->val1 = $request->val1;

        $gateway->val2 = $request->val2;

        $gateway->status = $request->status;
        $gateway->details = 'Système Instantané PayPal';

        $gateway->save();

        session()->flash('message', 'Le processuer a été éditée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Modifié avec succès');


        return redirect()->route('admin.gateways.index');



    }
    public function localUpdate(Request $request, $id)
    {
        //

        $this->validate($request, [

            'name'=> 'required|max:100',
            'account' => 'required|max:100',
            'fixed' => 'required|numeric|max:200',
            'percent' => 'required|numeric|max:200',
            'ex_percent' => 'required|numeric|max:200',
            'status' => 'required|boolean',
            'details' => 'required|max:200',

        ]);

        $gateway= Offline::find($id);

        if ($request->hasFile('image')){

            $this->validate($request, [

                'image' => 'required|image|mimes:jpeg,bmp,png,jpg'
            ]);

            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/gateways', $image_new_name);

            $gateway->image = 'uploads/gateways/'. $image_new_name;

        }

        $gateway->name = $request->name;

        $gateway->account = $request->account;

        $gateway->fixed = $request->fixed;

        $gateway->percent = $request->percent;
        $gateway->ex_percent = $request->ex_percent;

        $gateway->details = $request->details;

        $gateway->status = $request->status;

        $gateway->save();

        session()->flash('message', 'Le processeur local a été éditée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Modifié avec succès');


        return redirect()->route('admin.gateways.local');



    }

    public function localStore(Request $request)
    {
        //

        $this->validate($request, [

            'name'=> 'required|max:100',
            'account' => 'required|max:100',
            'fixed' => 'required|numeric',
            'ex_percent' => 'required|numeric',
            'percent' => 'required|numeric',
            'status' => 'required|boolean',
            'details' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg',
        ]);


        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/gateways', $image_new_name);

       Offline::create([

            'name' => $request->name,
            'account' => $request->account,
            'fixed' => $request->fixed,
            'image' => 'uploads/gateways/' . $image_new_name,
            'percent' => $request->percent,
            'ex_percent' => $request->ex_percent,
            'status' => $request->status,
            'details' => $request->details,

        ]);

        session()->flash('message', 'Le processeur local a été créée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');


        return redirect()->route('admin.gateways.local');



    }


    public function destroy($id)
    {
        //

        $gateway = Gateway::find($id);

        session()->flash('message', $gateway->name. ' Ne peut pas être supprimé. Ce processeur est requise pour le système. Vous pouvez seulement éditer ce processeur si vous n\'avez pas besoin de celui-ci, allez à l\'option paramètres -> procsseur pour désactiver ce processeur. ');
        Session::flash('type', 'warning');
        Session::flash('title', "Ne peut pas être supprimé");

        return redirect()->route('admin.gateways.index');


    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function localDestroy($id)
    {
        //

        $gateway = Offline::find($id);

        $gateway->delete();

        session()->flash('message', 'Le processuer local a été supprimée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Supprimé avec succès');

        return redirect()->route('admin.gateways.local');


    }

}
