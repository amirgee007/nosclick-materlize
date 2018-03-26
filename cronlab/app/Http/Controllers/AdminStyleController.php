<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminStyleController extends Controller
{
    //
    public function index()
    {

        $styles = Style::all();

        return view('admin.style.index', compact('styles'));

    }

    public function edit($id)
    {

        $style = Style::find($id);

        return view('admin.style.edit', compact('style'));

    }


    public function store(Request $request)
    {

        $this->validate($request, [

            'name'=> 'required|max:100',
            'compound' => 'required|min:1',

        ]);

        $style = Style::create([

            'name'=> $request->name,
            'compound' => $request->compound,

        ]);

        session()->flash('message', 'Le modèle de retour sur investissement a été créé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');


        return redirect()->route('adminStyle');


    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'name'=> 'required|max:100',
            'compound' => 'required|min:1',

        ]);

        $style = Style::find($id);

        $style->name = $request->name;
        $style->compound = $request->compound;
        $style->save();


        session()->flash('message', 'Le modèle de retour sur investissement a été créé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');


        return redirect()->route('adminStyle');


    }

    public function destroy($id)
    {

        $style = Style::find($id);

        $style->delete();


        session()->flash('message', 'Le modèle de retour sur investissement a été supprimé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Supprimé avec succès');


        return redirect()->route('adminStyle');


    }

}
