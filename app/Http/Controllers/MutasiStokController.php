<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakturJual;
use App\Models\FakturBeli;
use App\Models\DetilPenjualan;
use App\Models\Barang;

use DB;





class MutasiStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $stock = DB::table('barangs')
        //          ->leftJoin('detil_penjualans','detil_penjualans.barang_id','=','barangs.id')
        //          ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(SUM(detil_penjualans.qty),0) as qty'))
        //          ->groupBy('barangs.kode_barang')
        //          ->get();

        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;
        $barangs = Barang::all();
       $stockKeluar = DB::table('barangs')
                ->leftJoin('detil_penjualans','detil_penjualans.barang_id','=','barangs.id')
                ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(SUM(detil_penjualans.qty),0) as qty'))
                ->whereBetween('detil_penjualans.created_at', [$tglAwal, $tglAkhir])
                ->groupBy('barangs.id')
                ->get();

        $stockKMasuk = DB::table('barangs')
                 ->leftJoin('detil_pembelians','detil_pembelians.barang_id','=','barangs.id')
                 ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(SUM(detil_pembelians.qty),0) as qty'))
                 ->whereBetween('detil_pembelians.created_at', [$tglAwal, $tglAkhir])
                 ->groupBy('barangs.kode_barang')
                 ->get();

       $saldoAwal = DB::table('barangs')
                ->leftJoin('detil_pembelians','detil_pembelians.barang_id','=','barangs.id')
                ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(SUM(detil_pembelians.qty),0) as qty'))
                ->groupBy('barangs.kode_barang')
                ->get();


      // $mutasiStock = DB::table('barangs')
      //               ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(detil_pembelians.saldo),0) as saldoAwal',
      //                                                             DB::raw('COALESCE(detil_Pembelians.masuk),0) as masuk',
      //                                                             DB::raw('COALESCE(detil_Penjualans.keluar),0) as keluar')
      //               ->leftJoin()

        return view('MutasiStok.showMutasi',['stockKeluars' => $stockKeluar,'barangs' => $barangs]);
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
        //
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
    }
}
