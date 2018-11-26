<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelanggan;
use App\Models\FakturJual;
use App\Models\PembayaranPiutang;
use App\Models\DetilPelunasanPiutang;
use Alert;



class PelunasanPiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelunasanPiutangs = DB::table('pembayaran_piutangs')
                            ->join('faktur_juals','pembayaran_piutangs.fj_id','=','faktur_juals.id')
                            ->join('pelanggans','pembayaran_piutangs.pelanggan_id','=','pelanggans.id')
                            ->select('pembayaran_piutangs.no_pembayaran',
                            'pembayaran_piutangs.id',
                            'pelanggans.nama_pelanggan',
                            'pembayaran_piutangs.tgl_pembayaran',
                            'pembayaran_piutangs.tgl_jatuh_tempo',
                            'pembayaran_piutangs.tempo_bayar',
                            'pembayaran_piutangs.total_pembayaran',
                            'faktur_juals.no_fj',
                            'pembayaran_piutangs.sisa_hutang')
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
          $fakturJuals = DB::table('faktur_juals')
                         ->join('pelanggans','pelanggans.id','=','faktur_juals.pelanggan_id')
                         ->select('faktur_juals.id','faktur_juals.no_fj','pelanggans.nama_pelanggan','faktur_juals.total_faktur')
                         ->get();
          $pelanggans = Pelanggan::all();

          $idBayar= DB::table('pembayaran_piutangs')
                     ->select('id')
                     ->orderBy('id','DESC')
                     ->limit(1)
                     ->value('id');
          $tgl=Date('my');
          $newid = $idBayar + 1;
          $noBayar="FJ-0$newid-$tgl";
          return view('pelunasanPiutang.create',[

                    'fakturJuals'=>$fakturJuals,
                    'noBayar' => $noBayar,
                    'pelanggans' => $pelanggans

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
        $fjId = $request->fjId;
        $totalBayar = $request->totalBayar;

        $pelangganId = DB::table('faktur_juals')
                            ->join('pelanggans','faktur_juals.pelanggan_id','=','pelanggans.id')
                            ->select('pelanggans.id')
                            ->where('faktur_juals.id','=',$fjId)
                            ->value('pelanggans.id');

        $sisa_piutang= DB::table('pembayaran_piutangs')
                   ->select('sisa_hutang')
                   ->where('fj_id','=',$fjId)
                   ->orderBy('id','DESC')
                   ->limit(1)
                   ->value('sisa_hutang');
         $total_piutang= DB::table('faktur_juals')
                    ->select('total_faktur')
                    ->where('id','=',$fjId)
                    ->value('total_faktur');

        $pelunasanPiutangs = new PembayaranPiutang();
        $pelunasanPiutangs->no_pembayaran=$request->noBayar;
        $pelunasanPiutangs->tgl_pembayaran=$request->tglBayar;
        $pelunasanPiutangs->tempo_bayar=$request->tempoBayar;
        $pelunasanPiutangs->tgl_jatuh_tempo=$request->tglJatuhTempo;
        $pelunasanPiutangs->total_pembayaran=$request->totalBayar;
        $pelunasanPiutangs->fj_id=$request->fjId;
        $pelunasanPiutangs->pelanggan_id=$pelangganId;

        // if($totalBayar > $sisa_piutang)
        // {
        //     Alert::error('jumlah pembayaran lebih besar, tidak dapat melakukan pembayaran');
        //     return redirect()->action('PelunasanPiutangController@create');
        //
        // }
        //bayar tunai
        if($total_piutang==$request->totalBayar){

            $fakturJuals = FakturJual::find($fjId);
            $fakturJuals->status= 'Lunas';
            $fakturJuals->save();

        }
        //bayar angsuran
        if($sisa_piutang > 0){
          $pelunasanPiutangs->sisa_hutang= $sisa_piutang - ($request->totalBayar) ;
          $cekHutang = $sisa_piutang - ($request->totalBayar);

          if($cekHutang == 0)
          {
            $fakturJuals = FakturJual::find($fjId);
            $fakturJuals->status= 'Lunas';
            $fakturJuals->save();
          }

        }
        else {
          $pelunasanPiutangs->sisa_hutang=$total_piutang-$request->totalBayar;

        }


        $pelunasanPiutangs->save();
        Alert::success('Pembayaran hutang berhasil dilakukan');
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



       $totalBayar = DB::table('pembayaran_piutangs')
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
