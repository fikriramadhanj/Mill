<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;
use App\Models\FakturBeli;
use App\Models\PembayaranHutang;
use App\Models\DetilPembayaranHutang;
use App\Models\DetilPembelian;
use Alert;




class PembayaranHutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $pembayaranHutangs = DB::table('pembayaran_hutangs')
                               ->join('faktur_belis','pembayaran_hutangs.fb_id','=','faktur_belis.id')
                               ->select(
                                        'pembayaran_hutangs.id',
                                        'pembayaran_hutangs.no_pembayaran',
                                        'faktur_belis.no_fb',
                                        'pembayaran_hutangs.tgl_pembayaran',
                                        'pembayaran_hutangs.tempo_bayar',
                                        'pembayaran_hutangs.tgl_jatuh_tempo',
                                        'pembayaran_hutangs.total_pembayaran',
                                        'pembayaran_hutangs.sisa_hutang')
                              ->get();


                              // return response()->json($pembayaranHutangs);
                            return view('pembayaranHutang.index',[

                                        'pembayaranHutangs'=> $pembayaranHutangs

                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $suppliers = Supplier::all();
          $fakturBeli = FakturBeli::all();
          $idBayar= DB::table('pembayaran_hutangs')
                     ->select('id')
                     ->orderBy('id','DESC')
                     ->limit(1)
                     ->value('id');
          $tgl=Date('my');
          $newid = $idBayar + 1;
          $noBayar="FB-0$newid-$tgl";

          return view('pembayaranHutang.create',[

                      'suppliers'=>$suppliers,
                      'fakturBelis' => $fakturBeli,
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
      $sisa_hutang = 0;
      $fbId = $request->fbId;

      $sisa_hutang= DB::table('pembayaran_hutangs')
                 ->select('sisa_hutang')
                 ->where('fb_id','=',$fbId)
                 ->orderBy('id','DESC')
                 ->limit(1)
                 ->value('sisa_hutang');

       $total_hutang= DB::table('faktur_belis')
                  ->select('total_faktur')
                  ->where('id','=',$fbId)
                  ->value('total_faktur');

        $pembayaranHutangs = new PembayaranHutang();
        $pembayaranHutangs->no_pembayaran=$request->noBayar;
        $pembayaranHutangs->tgl_pembayaran=$request->tglBayar;
        $pembayaranHutangs->tgl_jatuh_tempo=$request->tglJatuhTempo;
        $pembayaranHutangs->tempo_bayar=$request->tempoBayar;
        $pembayaranHutangs->total_pembayaran=$request->totalBayar;

        if($sisa_hutang > 0){
          $pembayaranHutangs->sisa_hutang= $sisa_hutang - ($request->totalBayar) ;
          $cekHutang = $sisa_hutang - ($request->totalBayar);
          if($cekHutang == 0)
          {
            $fakturBelis = FakturBeli::find($fbId);
            $fakturBelis->status= 'Lunas';
            $fakturBelis->save();
          }
        }
        else {
          $pembayaranHutangs->sisa_hutang=$total_hutang -$request->totalBayar;

        }


        $pembayaranHutangs->fb_id=$request->fbId;
        $pembayaranHutangs->supplier_id=$request->supplierId;



        $pembayaranHutangs->save();
        Alert::success('Berhasil melakukan pembayaran hutang');
        // return response()->json($pembayaranHutangs);
        return redirect()->action('PembayaranHutangController@index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detilPembayaranHutangs = DB::table('detil_pembayaran_hutangs')
                                  ->join('pembayaran_hutangs','detil_pembayaran_hutangs.pembayaran_id','=','pembayaran_hutangs.id')
                                  ->join('detil_pembelians','detil_pembayaran_hutangs.fb_id','=','detil_pembelians.id')

                                  ->select('pembayaran_hutangs.no_pembayaran')
                                  ->where('pembayaran_hutangs.id','=',$id)
                                  ->get();


          $totalHutang = DB::table('detil_pembelians')
                        ->join('faktur_belis','detil_pembelians.fb_id','=','faktur_belis.id')
                        ->select(DB::raw('SUM(detil_pembelians.sub_total) as total'))
                        ->where('detil_pembelians.id',$id)
                        ->value('detil_pembelians.sub_total');



         $totalBayar = DB::table('pembayaran_hutangs')
                      ->select('total_pembayaran')
                      ->where('id','=',$id)
                      ->value('total_pembayaran');




          $sisaBayar = $totalHutang-$totalBayar;
                        // return response()->json($totalHutang);
                                  return view('pembayaranHutang.show',
                                      [
                                          // 'detilPembayaranHutangs' => $detilPembayaranHutangs,
                                          'totalHutang' => $totalHutang,
                                          'totalBayar' => $totalBayar,
                                          'sisaBayar' => $sisaBayar
                                      ]
                                  );

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
