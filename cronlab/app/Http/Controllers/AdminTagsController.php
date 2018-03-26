<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminTagsController extends Controller
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
    public function index()
    {
        //
        $tags = Tag::all();


        return view('admin.tags.index', compact('tags'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            'tag'=> 'required'

        ]);

       Tag::create([

           'tag' => $request->tag

       ]);


        session()->flash('message', 'L\'étiquette du commentaire a été créée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');

        return redirect()->back();


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
        //
        $tag = Tag::findOrFail($id);


        return view('admin.tags.edit', compact('tag'));

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

            'tag'=> 'required'

        ]);

        $tag = Tag::find($id);

        $tag->tag = $request->tag;

        $tag->save();

        session()->flash('message', 'L\'étiquette du commentaire a été mise à jour avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Mis à jour réussi');

        return redirect()->route('admin.tags.index');


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
        Tag::destroy($id);

        session()->flash('message', 'Le tag du commentaire a été supprimé avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Supprimé avec succès');

        return redirect()->route('admin.tags.index');

    }
}
