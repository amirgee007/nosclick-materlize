<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('admin');

    }



    public function index()
    {
        //

             $categories = Category::all();


           return view('admin.categories.index', compact('categories'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Request
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name'=> 'required'

        ]);

         $category = new Category;

        $category->name = $request->name;

        $category->save();


        session()->flash('message', 'La catégorie du blog a été créée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Créé avec succès');


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
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

          $category = Category::findOrFail($id);


           return view('admin.categories.edit', compact('category'));

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

            'name'=> 'required|max:200'

        ]);
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        session()->flash('message', 'La catégorie du blog a été mise à jour avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Mis à jour réussi');

        return redirect('/admin/categories');


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
        $category = Category::findOrFail($id);

        foreach ($category->posts as $post){

            $post->delete();

        }

        $category->delete();

        session()->flash('message', 'La catégorie du blog a été supprimée avec succès.');
        Session::flash('type', 'success');
        Session::flash('title', 'Supprimé avec succès');

        return redirect('/admin/categories');


    }


}
