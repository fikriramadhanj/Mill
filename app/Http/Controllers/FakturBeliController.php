<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\SaldoAwalBarang;
use App\Models\FakturBeli;
use App\Models\DetilPembelian;
use Alert;
use PDF;


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
                        ->join('suppliers','faktur_belis.supplier_id','=','suppliers.id')
                        ->select(
                          'faktur_belis.id',
                          'faktur_belis.no_fb',
                          'faktur_belis.tgl_fb',
                          'suppliers.nama_supplier',
                          'faktur_belis.status',
                          'faktur_belis.keterangan',
                          'faktur_belis.total_faktur')

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
        $idFaktur= DB::table('faktur_belis')
                   ->select('id')
                   ->orderBy('id','DESC')
                   ->limit(1)
                   ->value('id');
        $tgl=Date('my');
        $newid = $idFaktur + 1;
        $noFB="FB-0$newid";

        $result=['suppliers'=>$suppliers,
                  'barangs'=>$barangs,
                  'idFakturBeli' => $noFB

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
        $status = "Belum Lunas";
        $fakturBelis = new FakturBeli();
        $fakturBelis->no_fb = $request->noFB;
        $fakturBelis->tgl_fb = $request->tglFB;
        $fakturBelis->keterangan = $request->keterangan;
        $fakturBelis->supplier_id = $request->supplierId;
        $fakturBelis->status=$status;

        $detilInputBeli = $request->detilBeli;
        if (isset($detilInputBeli))
        {
            foreach($detilInputBeli as $inputBeli)
            {
                $fakturBelis->total_faktur += $inputBeli['subTotal'];
            }
        }
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

                $stokBarang = Barang::find($inputBeli['barangId']);
                $stokBarang->qty = $stokBarang->qty + $inputBeli['qty'];
                $stokBarang->save();


            }


        }

        Alert::success('Transaksi pembelian berhasil dilakukan');
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
        $detilPembelians = DB::table('detil_pembelians')
                          ->join('barangs','detil_pembelians.barang_id','=','barangs.id')
                          ->join('faktur_belis','detil_pembelians.fb_id','=','faktur_belis.id')
                          ->select('faktur_belis.id','barangs.kode_barang','barangs.nama','barangs.harga_beli','faktur_belis.no_fb','detil_pembelians.qty','detil_pembelians.sub_total')
                          ->where('faktur_belis.id','=',$id)
                          ->get();

        $total = DB::table('detil_pembelians')
                ->select(DB::raw('SUM(sub_total) as Total'))
                ->where('fb_id','=',$id)
                ->value('sub_total');

                          return view('fakturBeli.show',
                              [
                                  'detilPembelians' => $detilPembelians,
                                  'total' => $total
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
      $fakturBeli = FakturBeli::find($id);

      $fakturBeli->delete();
      Alert::success('Data Faktur Beli berhasil dihapus');

      return redirect()->action('FakturBeliController@index');
    }

    public function downloadPDF($id){

            $detilBelis = DB::table('detil_pembelians')
                              ->join('barangs','detil_pembelians.barang_id','=','barangs.id')
                              ->join('faktur_belis','detil_pembelians.fb_id','=','faktur_belis.id')
                              ->select('detil_pembelians.id','barangs.kode_barang','barangs.nama','barangs.harga_beli','faktur_belis.no_fb','detil_pembelians.qty','detil_pembelians.sub_total')
                              ->where('faktur_belis.id','=',$id)
                              ->get();

            $total = DB::table('detil_pembelians')
                    ->select(DB::raw('SUM(sub_total) as Total'))
                    ->where('fb_id','=',$id)
                    ->value('sub_total');


        $pdf = PDF::loadView('fakturBeli.pdf', compact('detilBelis','total'));
        return $pdf->download('FakturBeli.pdf');

      }


    public function laporanPembelian(Request $request)
    {
        $suppliers = Supplier::all();
        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;

          $supplier = $request->supplierId;
          $status = $request->status;
          if($status == 'all'){

                $statusLunas = DB::table('faktur_belis')
                               ->join('suppliers','faktur_belis.supplier_id','suppliers.id')
                               ->select('faktur_belis.id','faktur_belis.no_fb','suppliers.nama_supplier',
                                         'faktur_belis.tgl_fb','faktur_belis.status','faktur_belis.total_faktur')
                               ->where('suppliers.id','=',$supplier)
                               ->whereBetween('faktur_belis.tgl_fb', [$tglAwal, $tglAkhir])
                                ->get();
          }else {
            $statusLunas = DB::table('faktur_belis')
                           ->join('suppliers','faktur_belis.supplier_id','suppliers.id')
                           ->select('faktur_belis.id','faktur_belis.no_fb','suppliers.nama_supplier',
                                     'faktur_belis.tgl_fb','faktur_belis.status','faktur_belis.total_faktur')
                           ->where('faktur_belis.status',$status)
                           ->where('suppliers.id','=',$supplier)
                           ->whereBetween('faktur_belis.tgl_fb', [$tglAwal, $tglAkhir])
                            ->get();
            }


        return view('fakturBeli.ShowLaporan',['suppliers'=> $suppliers,
                                              'tglAwal' => $tglAwal,
                                              'tglAkhir' => $tglAkhir,
                                              'statuss' => $statusLunas
                    ]);

    }
}
