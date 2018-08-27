<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TipeBarang;


class TipeBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $tipeBarangs = TipeBarang::all();
          return view('tipeBarang.index',['tipeBarangs'=>$tipeBarangs]
      );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipeBarang.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipeBarangs = new TipeBarang();
      $tipeBarangs->id =$request->idTipe;
      $tipeBarangs->nama_tipe=$request->namaTipe;
      $tipeBarangs->save();

      return redirect()->action('TipeBarangController@index');

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
        $tipeBarangs=TipeBarang::find($id);
        return view('tipeBarang.update',['update'=>$tipeBarangs]);
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
          $tipeBarangs=TipeBarang::find($request->id);
          $tipeBarangs->id=$request->idTipe;
          $tipeBarangs->nama_tipe=$request->namaTipe;
          $tipeBarangs->save();
          redirect()->action('TipeBarangController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $tipeBarang=TipeBarang::find($id);
          $tipeBarang->delete();
          redirect()->action('TipeBarangController@index');

    }
}
