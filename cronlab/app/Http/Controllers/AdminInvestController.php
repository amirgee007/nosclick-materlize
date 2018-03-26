<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminInvestController extends Controller
{
    //
    public function index()
    {

        $plans = Plan::all();

        return view('admin.plan.index', compact('plans'));

    }

    public function edit($id)
    {

        $plan = Plan::find($id);

        $styles = Style::all();

        return view('admin.plan.edit', compact('plan','styles'));

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'name'=> 'required|max:100',
            'style_id' => 'required|numeric|min:1|max:200',
            'minimum' => 'required|numeric|min:1',
            'maximum' => 'required|numeric|min:1',
            'percentage'=> 'required|numeric',
            'repeat' => 'required|numeric|min:1',
            'start_duration' => 'required|numeric',
            'status' => 'required|boolean',

        ]);

        $plan = new Plan;

        $plan->name = $request->name;
        $plan->style_id = $request->style_id;
        $plan->minimum = $request->minimum;
        $plan->maximum = $request->maximum;
        $plan->percentage = $request->percentage;
        $plan->repeat = $request->repeat;
        $plan->start_duration = $request->start_duration;
        $plan->status = $request->status;
        $plan->save();


        session()->flash('message', 'Le plan d\'investissement a été créé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');


        return redirect()->route('adminInvest');




    }
    public function create()
    {

        $styles = Style::all();
        return view('admin.plan.create', compact('styles'));


    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'name'=> 'required|max:100',
            'style_id' => 'required|numeric|min:1|max:200',
            'minimum' => 'required|numeric|min:1',
            'maximum' => 'required|numeric|min:1',
            'percentage'=> 'required|numeric',
            'repeat' => 'required|numeric|min:1',
            'start_duration' => 'required|numeric',
            'status' => 'required|boolean',

        ]);

        $plan = Plan::find($id);

        $plan->name = $request->name;
        $plan->style_id = $request->style_id;
        $plan->minimum = $request->minimum;
        $plan->maximum = $request->maximum;
        $plan->percentage = $request->percentage;
        $plan->repeat = $request->repeat;
        $plan->start_duration = $request->start_duration;
        $plan->status = $request->status;
        $plan->save();


        session()->flash('message', 'Le plan d\'investissement a été mis à jour avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Mis à jour réussi');


        return redirect()->route('adminInvest');


    }

    public function destroy($id)
    {

        $style = Plan::find($id);

        $style->delete();


        session()->flash('message', 'Le plan d\'investissement a été supprimé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Supprimé avec succès');

        return redirect()->route('adminInvest');


    }

}
