<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelanggan;
use App\Models\FakturJual;
use App\Models\PelunasanPiutang;
use App\Models\DetilPelunasanPiutang;




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
                            ->join('faktur_juals','pelunasan_piutangs.fj_id','=','faktur_juals.id')
                            ->select('pelunasan_piutangs.no_pembayaran',
                            'pelunasan_piutangs.id',
                            'pelunasan_piutangs.tgl_pembayaran',
                            'pelunasan_piutangs.tgl_jatuh_tempo',
                            'pelunasan_piutangs.tempo_bayar',
                            'pelunasan_piutangs.keterangan',
                            'pelunasan_piutangs.total_pembayaran',
                            'faktur_juals.no_fj')
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
          $fakturJuals = FakturJual::all();
          $idBayar= DB::table('pelunasan_piutangs')
                     ->select('id')
                     ->orderBy('id','DESC')
                     ->limit(1)
                     ->value('id');
          $tgl=Date('my');
          $newid = $idBayar + 1;
          $noBayar="FJ-0$newid-$tgl";
          return view('pelunasanPiutang.create',[

                    'fakturJuals'=>$fakturJuals,
                    'noBayar' => $noBayar

          ]);
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
        $pelunasanPiutangs->tempo_bayar=$request->tempoBayar;
        $pelunasanPiutangs->tgl_jatuh_tempo=$request->tglJatuhTempo;
        $pelunasanPiutangs->total_pembayaran=$request->totalBayar;
        $pelunasanPiutangs->keterangan=$request->keterangan;
        $pelunasanPiutangs->fj_id=$request->fjId;
        $pelunasanPiutangs->save();

        // return response()->json($pelunasanPiutangs);
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


        // $detilPelunasanPiutangs = DB::table('detil_pelunasan_piutangs')
        //                           ->join('faktur_juals','detil_pelunasan_piutangs.fj_id','=','faktur_juals.id')
        //                           ->select('faktur_juals.no_fj','faktur_juals.tgl_fj'
        //                                   ,'detil_pelunasan_piutangs.bayar','detil_pelunasan_piutangs.piutang')


        $totalPiutang = DB::table('detil_penjualans')
                      ->join('faktur_juals','detil_penjualans.fj_id','=','faktur_juals.id')
                      ->select(DB::raw('SUM(detil_penjualans.sub_total) as total'))
                      ->where('detil_penjualans.fj_id',$id)
                      ->value('detil_penjualans.sub_total');



       $totalBayar = DB::table('pelunasan_piutangs')
                    ->select('total_pembayaran')
                    ->where('id','=',$id)
                    ->value('total_pembayaran');

      $sisaBayar = $totalPiutang-$totalBayar;

                                  return view('pelunasanPiutang.show',
                                            [
                                              // 'detilPelunasanPiutangs'=>$detilPelunasanPiutangs,
                                              'totalPiutang' => $totalPiutang,
                                              'totalBayar' => $totalBayar,
                                              'sisaBayar' => $sisaBayar
                                            ]);
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
