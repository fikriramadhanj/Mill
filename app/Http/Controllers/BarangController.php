<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\TipeBarang;
use DB;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = DB::table('barangs')->paginate(5);

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
        $barang->harga_jual=$request->hargaJual;
        $barang->qty=$request->qty;
        $barang->min_stok=$request->minStok;
        $barang->maks_stok=$request->maksStok;
        $barang->save();
        \Log::debug($barang);
        // return response()->json($barang);
        Alert::success('Data barang berhasil ditambahkan');

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
        $barang->harga_jual = $request->hargaJual;
        $barang->qty = $request->qty;
        $barang->min_stok = $request->minStok;
        $barang->maks_stok = $request->maksStok;
        $barang->save();

        //$barang->keterangan=$request->keterangan;
        Alert::success('Data barang berhasil diubah');

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
        Alert::success('Data barang berhasil dihapus');

        return redirect()->action('BarangController@index');
    }

    public function laporanBarangKekurangan()
    {
          $barangOrder = DB::table('barangs')
                         ->select('kode_barang', 'nama', 'qty','harga_jual','harga_beli')
                         ->where('qty','<','min_stok')
                         ->get();

         return view(

       );

    }

    public function laporanBarangKelebihan()
    {
          $barangOrder = DB::table('barangs')
                         ->select('kode_barang', 'nama', 'qty','harga_jual','harga_beli')
                         ->where('qty','>','maks_stok')
                         ->get();

         return view(

       );
    }


}
