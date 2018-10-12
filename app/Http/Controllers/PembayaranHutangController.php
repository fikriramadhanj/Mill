<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;
use App\Models\FakturBeli;
use App\Models\PembayaranHutang;
use App\Models\DetilPembayaranHutang;



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
                               ->join('suppliers','pembayaran_hutangs.supplier_id','=','suppliers.id')
                               ->join('faktur_belis','pembayaran_hutangs.fb_id','=','faktur_belis.id')
                               ->select('pembayaran_hutangs.no_pembayaran',
                                        'faktur_belis.no_fb',
                                        'pembayaran_hutangs.tgl_pembayaran',
                                        'pembayaran_hutangs.tempo_bayar',
                                        'suppliers.nama_supplier',
                                        'pembayaran_hutangs.tgl_jatuh_tempo',
                                        'pembayaran_hutangs.total_pembayaran')
                              ->get();
                              // return response()->json($pembayaranHutangs);
                            return view('pembayaranHutang.index',['pembayaranHutangs'=> $pembayaranHutangs]);
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


          return view('pembayaranHutang.create',[

                      'suppliers'=>$suppliers,
                      'fakturBelis' => $fakturBeli


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
        $pembayaranHutangs = new PembayaranHutang();
        $pembayaranHutangs->no_pembayaran=$request->noBayar;
        $pembayaranHutangs->tgl_pembayaran=$request->tglBayar;
        $pembayaranHutangs->tgl_jatuh_tempo=$request->tglJatuhTempo;
        $pembayaranHutangs->tempo_bayar=$request->tempoBayar;
        $pembayaranHutangs->total_pembayaran=$request->totalBayar;
        $pembayaranHutangs->posted=$request->posted;
        $pembayaranHutangs->supplier_id=$request->supplierId;
        $pembayaranHutangs->fb_id=$request->fbId;
        $pembayaranHutangs->keterangan=$request->keterangan;

        $pembayaranHutangs->save();
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
                                  ->join('faktur_belis','detil_pembayaran_hutangs.fb_id','=','faktur_belis.id')
                                  ->select('faktur_belis.no_fb','faktur_belis.tgl_fb','faktur_belis.bayar','faktur_belis.discount',
                                           'faktur_belis.hutang')
                                  ->where('faktur_belis.id','=',$id)
                                  ->get();

                                  return view('pembayaranHutang.show',
                                      [
                                          'detilPembayaranHutangs' => $detilPembayaranHutangs
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

    public function getFakturBeli()
    {
        $getFakturs = DB::table('faktur_belis')
                     ->join('suppliers','faktur_belis.supplier_id','=','suppliers.id')
                     ->select('faktur_belis.no_fb')
                     ->get();
                    return view('pembayaranHutang.form',['getFakturs'=>$getFakturs]);

    }
}
