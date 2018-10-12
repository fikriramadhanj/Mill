<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Pelanggan;
use App\Models\Barang;
use App\Models\FakturJual;
use App\Models\DetilPenjualan;
use App\Models\DetilPembelian;


class FakturJualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fakturJuals = DB::table('faktur_juals')
            ->join('pelanggans','faktur_juals.pelanggan_id','=','pelanggans.id')
            ->select('faktur_juals.id','faktur_juals.no_fj','faktur_juals.tgl_fj',
                    'faktur_juals.tempo_bayar','pelanggans.nama_pelanggan',
                    'faktur_juals.tgl_jatuh_tempo','faktur_juals.keterangan')
            ->get();


        return view('fakturJual.index',
            [
                'fakturJuals'=> $fakturJuals
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
        $pelanggan = Pelanggan::all();
        $barangs = Barang::all();
        $idFaktur= DB::table('faktur_juals')
                   ->select('id')
                   ->orderBy('id','DESC')
                   ->limit(1)
                   ->value('id');
        $tgl=Date('my');
        $newid = $idFaktur + 1;
        $noFJ="FJ0$newid";

        $result = [
            'pelanggans' => $pelanggan,
            'barangs' => $barangs,
            'noFJ' => $noFJ,
            'idFaktur' => $idFaktur
        ];

        return view('fakturJual.create', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fakturJuals=new FakturJual();
        $fakturJuals->no_fj=$request->noFJ;
        $fakturJuals->tgl_fj=$request->tglFJ;
        $fakturJuals->pelanggan_id=$request->pelangganId;
        $fakturJuals->tempo_bayar=$request->tempoBayar;
        $fakturJuals->tgl_jatuh_tempo=$request->tglJatuhTempo;
        $fakturJuals->keterangan=$request->keterangan;
        $fakturJuals->save();

        $detilInputJual = $request->detilJual;
        if (isset($detilInputJual))
        {
            foreach($detilInputJual as $inputJual)
            {
                $detilJuals=new DetilPenjualan();
                $detilJuals->qty=$inputJual['qty'];
                $detilJuals->sub_total=$inputJual['subTotal'];
                $detilJuals->barang_id=$inputJual['barangId'];
                $detilJuals->fj_id = $fakturJuals->id;


                $detilJuals->save();
            }
        }

        return redirect()->action('FakturJualController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detilPenjualans=DB::table('detil_penjualans')

            ->join('barangs','detil_penjualans.barang_id','=','barangs.id')
            ->join('faktur_juals','detil_penjualans.fj_id','=','faktur_juals.id')
            ->select('detil_penjualans.qty','detil_penjualans.sub_total','barangs.nama','barangs.kode_barang',
                    'barangs.harga_jual1','faktur_juals.no_fj')
            ->where('faktur_juals.id',"=",$id)
            ->get();


            $total = DB::table('detil_penjualans')
                     ->select(DB::raw('SUM(sub_total) as Total'))
                     ->where('fj_id','=',$id)
                     ->value('sub_total');
                    //  return response()->json($total);

        return view('fakturJual.show',
            [
                'detilPenjualans' => $detilPenjualans,
                'total' => $total
            ]
        );
    }

    public function getBarang()
    {
        $barangs = Barang::all();
        return view('fakturJual.DataBarang',['barangs'=>$barangs]);

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


    public function getTotal($id)
    {


    }


}
