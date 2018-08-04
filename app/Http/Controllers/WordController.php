<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;


class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
     $word = Word::all();
    return view('word.index',compact('word'));
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
     
       /*$word = new Word;
       $word->simple_word  = $request->simple_word;
       $word->hard_word = $request->hard_word;
       $word->description = $request->description;
       $word->save();*/
       Word::create(['simple_word'=>request('simple_word'), 'hard_word'=>request('hard_word'), 'description'=>request('description')]);
        return back();
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
         $word = Word::findOrFail($request->word_id);
         $word->update($request->all());
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          
          $word  = Word::findOrFail($request->word_id);
          $word->delete();
          return back();
    }
}
