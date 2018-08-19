<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;
use App\Barang;
use App\FakturBeli;
use App\DetilPembelian;


class FakturBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fakturBelis = DB::table('faktur_belis')
                        ->join('suppliers','faktur_belis.supplier_id','suppliers.id')
                        ->select('faktur_belis.no_fb','faktur_belis.tgl_fb','faktur_belis.tempo_bayar','faktur_belis.tgl_jatuh_tempo
                        ','suppliers.nama_supplier','faktur_belis.no_sj')
                        ->get();

        return view('fakturBeli.index',
        [
              'fakturBelis'=> $fakturBelis
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
        $suppliers = Supplier::all();
        $barangs = Barang::all();

        $result=['suppliers'=>$suppliers,
                  'barangs'=>$barangs

        ];
        return view('fakturBeli.create',$result);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fakturBelis = new FakturBeli();
        $fakturBelis->no_fb = $request->noFb;
        $fakturBelis->tgl_fb = $request->tglFb;
        $fakturBelis->no_sj = $request->noSj;
        $fakturBelis->tempo_bayar = $request->tempoBayar;
        $fakturBelis->no_pajak = $request->noPajak;
        $fakturBelis->uang_muka = $request->uangMuka;
        $fakturBelis->total_bayar = $request->totalBayar;
        $fakturBelis->discount = $request->discount;
        $fakturBelis->supplier_id = $request->supplierId;

        $fakturBelis->save();

        $detilInputBeli = $request->detilBeli;
        if (isset($detilInputBeli))
        {
            foreach($detilInputBeli as $inputBeli)
            {
                $detilBelis=new DetilPembelian();
                $detilBelis->qty=$inputBeli['qty'];
                $detilBelis->sub_total=$inputBeli['subTotal'];
                $detilBelis->barang_id=$inputBeli['barangId'];
                $detilBelis->fb_id = $fakturBelis->id;
                $detilBelis->save();
            }
        }

        return redirect()->action('FakturBeliController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detilPembelians = DB::table('detil_pembelians');
                          ->join('barangs','detil_pembelians.barang_id','=','barangs.id')
                          ->join('faktur_belis','detil_pembelians.fb_id','=','faktur_belis.id')
                          ->select('barangs.kode_barang','barangs.nama','barangs.harga_beli','faktur_belis.no_fb','detil_pembelians.qty','detil_pembelians.sub_total')
                          ->where('faktur_belis.id','=',$id)
                          ->get();

                          return view('fakturBeli.show',
                              [
                                  'detilPembelians' => $detilPembelians
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