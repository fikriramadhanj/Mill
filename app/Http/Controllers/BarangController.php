<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\TipeBarang;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index',
            [
                'barangs' => $barangs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipeBarang= TipeBarang::all();
        $idBarang= DB::table('barangs')
                   ->select('id')
                   ->orderBy('id','DESC')
                   ->limit(1)
                   ->value('id');

        $newid = $idBarang + 1;
        $newIdBarang="BRG-0$newid";
        return view('barang.create',
            [
                'tipeBarangs'=>$tipeBarang,
                'idBarang' => $newIdBarang

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang= new Barang();
        $barang->kode_barang=$request->kode;
        $barang->tipe_id=$request->tipeId;
        $barang->tgl_beli=$request->tgl_beli;
        $barang->nama=$request->nama;
        $barang->harga_beli=$request->hargaBeli;
        $barang->harga_jual1=$request->hargaJual1;
        $barang->harga_jual2=$request->hargaJual2;
        $barang->harga_jual3=$request->hargaJual3;
        $barang->harga_jual4=$request->hargaJual4;
        $barang->harga_jual5=$request->hargaJual5;
        $barang->qty=$request->qty;
        //$barang->keterangan=$request->keterangan;
        \Log::debug($request);
        $barang->save();
        // return response()->json($barang);
        return redirect()->action('BarangController@index');
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
        $barangs = Barang::find($id);
        $tipeBarang = TipeBarang::all();
        return view('barang.update',[
          'update'=>$barangs,
          'tipeBarangs' => $tipeBarang
          ]);
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
        $barang = Barang::find($request->id);
        $barang->kode_barang = $request->kode;
        $barang->nama = $request->nama;
        $barang->harga_beli = $request->hargaBeli;
        $barang->harga_jual1 = $request->hargaJual1;
        $barang->harga_jual2 = $request->hargaJual2;
        $barang->harga_jual3 = $request->hargaJual3;
        $barang->harga_jual4 = $request->hargaJual4;
        $barang->harga_jual5 = $request->hargaJual5;
        $barang->qty = $request->qty;
        $barang->save();

        //$barang->keterangan=$request->keterangan;

        return redirect()->action('BarangController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->action('BarangController@index');
    }

    public function idBarang()
    {
          $idBarang = DB::table('barangs')
                      ->select('id')
                      ->orderBy('id desc')
                      ->get();
          $kodeBarang=$idBarang+1;

          return view('barang.form',['kode'=>$kodeBarang]);



    }

}
