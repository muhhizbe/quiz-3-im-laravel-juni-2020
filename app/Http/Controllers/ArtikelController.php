<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = ArtikelModel::all();
    	return view('artikel', ['data' => $artikel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_artikel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
    		'judul' => 'required',
    		'isi' => 'required'
    	]);
        
        $slug = str_replace(' ', '-', $request->judul);
        // dd($slug);
        ArtikelModel::create([
    		'judul' => $request->judul,
    		'isi' => $request->isi,
    		'slug' => strtolower($slug),
    		'tag' => $request->tag,
    	]);
 
    	return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = ArtikelModel::find($id);
        return view('detail_artikel', ['artikel' => $artikel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = ArtikelModel::find($id);
        return view('artikel_edit', ['artikel' => $artikel]);
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
        $this->validate($request,[
    		'judul' => 'required',
    		'isi' => 'required'
        ]);
    
        $artikel = ArtikelModel::find($id);
        $artikel->judul = $request->judul;
        $artikel->slug = strtolower(str_replace(' ', '-', $request->judul));
        $artikel->isi = $request->isi;
        $artikel->tag = $request->tag;
        $artikel->save();
        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = ArtikelModel::find($id);
        $artikel->delete();
        return redirect('/artikel');
    }
}
