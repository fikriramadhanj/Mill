<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;
use App\FakturBeli;

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
                               ->select('pembayaran_hutangs.no_pembayaran','pembayaran_hutangs.tgl_pembayaran',
                                        'suppliers.nama_supplier','suppliers.kode_supplier','pembayaran_hutangs.tgl_jatuh_tempo',
                                        'pembayaran_hutangs.total_pembayaran')
                              ->get();

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

          return view('pembayaranHutang.create',['suppliers'=>$suppliers]);

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
        $pembayaranHutangs->total_pembayaran=$request->totalBayar;
        $pembayaranHutangs->supplier_id=$request->supplierId;

        $pembayaranHutangs->save();

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
                                           'faktur_belis.writeoff','faktur_belis.hutang')
                                  ->get();

                                  return view('pembayaranHutang.show',
                                      [
                                          'detilPembayaranHutangs' => $detilPembayaranHutangs
                                      ];
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
