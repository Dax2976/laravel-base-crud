<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::All();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'description'=>'required',
                'thumb'=>'required',
                'price'=>'required',
                'series'=>'required',
                'sales'=>'required',
                'type'=>'required',
            ]
            );


        $data = $request->all();
        $new_comic = new Comic();
        $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('home');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $comic = Comic::findOrFail($id);
        return view( 'comic.show', compact('comic') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comic.edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate(
            [
                'title'=>'required',
                'description'=>'required',
                'thumb'=>'required',
                'price'=>'required',
                'series'=>'required',
                'sale_date'=>'required',
                'type'=>'required'
            ]
            );

        $data = $request->all();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('home', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('home',$comic)->with('message',"You Have Deleted : $comic->title");
    }
}
