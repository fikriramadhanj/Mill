<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pelanggan;
use App\FakturJual;
use App\PelunasanPiutang;



class PelunasanPiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelunasanPiutangs = DB::table('pelunasan_piutangs')
                            ->join('pelanggans','pelunasan_piutangs.pelanggan_id','=','pelanggans.id')
                            ->join('faktur_juals','pelunasan_piutangs.fj_id','=','faktur_juals.id')
                            ->select('pelunasan_piutangs.no_pembayaran','pelunasan_piutangs.tgl_pembayaran','pelunasan_piutangs.keterangan',
                            'pelunasan_piutangs.total_pembayaran','pelanggans.nama_pelanggan','faktur_juals.total_faktur',
                            'pelanggans.kode_pelanggan','pelanggans.nama_pelanggan')
                            ->get();

        return view('pelunasanPiutang.index',['pelunasanPiutangs'=> $pelunasanPiutangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $pelanggans = Pelanggan::all();
          return view('pelunasanPiutang.form',['pelanggans'=>$pelanggans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelunasanPiutangs = new PelunasanPiutang();
        $pelunasanPiutangs->no_pembayaran=$request->noBayar;
        $pelunasanPiutangs->tgl_pembayaran=$request->tglBayar;
        $pelunasanPiutangs->total_pembayaran=$request->totalBayar;
        $pelunasanPiutangs->posted=$request->posted;
        $pelunasanPiutangs->keterangan=$request->keterangan;
        $pelunasanPiutangs->pelanggan_id=$request->pelangganId;
        $PelunasanPiutangs->save();
        return redirect()->action('PelunasanPiutangController@index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $getFakturJuals = DB::table('faktur_juals')
                     ->select('faktur_juals.no_fj', 'faktur_juals.sub_total')
                     ->where('faktur_juals.pelanggan_id','=',1)
                     ->get();

        $detilPelunasanPiutangs = DB::table('detil_pelunasan_piutangs')
                                  ->join('faktur_juals','detil_pelunasan_piutangs.fj_id','=','faktur_juals.id')
                                  ->select('faktur_juals.no_fj','faktur_juals.tgl_fj'
                                          ,'detil_pelunasan_piutangs.bayar','detil_pelunasan_piutangs.piutang')
                                  ->get();
                                  return view('pelunasanPiutang.show',
                                            ['detilPelunasanPiutangs'=>$detilPelunasanPiutangs]);
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
