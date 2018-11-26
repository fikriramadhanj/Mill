<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakturJual;
use App\Models\FakturBeli;
use App\Models\DetilPenjualan;
use App\Models\SaldoAwalBarang;
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

        $tglAwal = $request->tglAwal;
        $tglAkhir = $request->tglAkhir;
        $barangs = Barang::all();
        $stocks=DB::select("select nama, kode_barang,id,
        COALESCE(db.masuk,0) as masuk,COALESCE(dj.keluar,0) as keluar
        from barangs b
        LEFT  JOIN (
        	select barang_id,sum(qty)as masuk
        	from detil_pembelians
        	where (created_at between '".$tglAwal."' and '".$tglAkhir."')
        	group by barang_id
        	) db on db.barang_id=b.id
        LEFT JOIN  (
        	select barang_id,sum(qty) as keluar
        	from detil_penjualans
        	where (created_at between '".$tglAwal."' and '".$tglAkhir."')
        	group by barang_id
        	)dj on dj.barang_id=b.id
          group by id");

$bulan = substr($tglAkhir, 5, 2) - 1;
if ($bulan==0) {
  $bulan = 12;
}
// $a=DB::select("select b.nama, b.kode_barang,b.id,
// COALESCE(sum(db.qty)-sum(dj.qty),0) as saldo_awal
// from barangs b
// LEFT  JOIN detil_pembelians db on db.barang_id=b.id
// LEFT join detil_penjualans dj on dj.barang_id=b.id
// where DATE_FORMAT(db.created_at, '%Y-%m-%d') = DATE_FORMAT( DATE_ADD(STR_TO_DATE( ".$tglAkhir.", '%Y-%m-%d') , INTERVAL -1 MONTH), '%Y-%m-%d')
// or DATE_FORMAT(dj.created_at, '%Y-%m-%d')  = DATE_FORMAT( DATE_ADD(STR_TO_DATE( ".$tglAkhir.", '%Y-%m-%d') , INTERVAL -1 MONTH), '%Y-%m-%d')
// group by b.id");

// $ymd = date('Y-m-d', strtotime($tglAkhir));
//
// $db = DB::select("select b.nama, b.kode_barang,b.id,
// sum(db.qty) as db
// from barangs b
// LEFT  JOIN detil_pembelians db on db.barang_id=b.id
// WHERE DATE_FORMAT( DATE_ADD(STR_TO_DATE( ".$ymd.", '%Y-%m-%d') , INTERVAL -1 MONTH), '%m')= DATE_FORMAT(db.created_at, '%m')
// GROUP BY b.id");
//
// $dj = DB::select("select b.nama, b.kode_barang,b.id,
// sum(dj.qty) as dj
// from barangs b
// LEFT  JOIN detil_penjualans dj on dj.barang_id=b.id
// WHERE DATE_FORMAT( DATE_ADD(STR_TO_DATE( ".$ymd.", '%Y-%m-%d') , INTERVAL -1 MONTH), '%m')= DATE_FORMAT(dj.created_at, '%m')
// GROUP BY b.id");



          // $stocks = DB::table('barangs AS b')
          //           ->leftJoin('detil_pembelians AS db')
          //
          //           ->whereBetween('')
          //           'db.barang_id','=','b.id')
          //           ->LeftJoin('faktur_belis AS fb','fb.id','=','db.fb_id')
          //           ->whereBetween('fb.tgl_fb',[$tglAwal, $tglAkhir])
          //
          //           ->leftJoin('detil_penjualans AS dj','dj.barang_id','=','b.id')
          //           ->leftJoin('faktur_juals AS fj','fj.id','=','dj.fj_id')
          //           ->whereBetween('fj.tgl_fj',[$tglAwal, $tglAkhir])
          //
          //           ->select('b.kode_barang AS kbrg','b.nama AS nm',DB::raw('COALESCE(SUM(db.qty),0) as masuk'),DB::raw('COALESCE(SUM(dj.qty),0) as keluar'))
          //           ->groupBy('b.id')
          //           ->get();


            // $stocks = DB::table('barangs')
            //           ->leftJoin('faktur_juals','detil_penjualans.barang_id','=','barangs.id')
            //           ->leftJoin('detil_Penjualans','detil_penjualans.barang_id','=','barangs.id')
            //           ->leftJoin('faktur_juals','detil_penjualans.barang_id','=','barangs.id')
            //           ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(SUM(detil_penjualans.qty),0)'))
            //           ->where('detil_Penjualans.')
       //
      //  $saldoAwal = DB::table('barangs')
      //           ->leftJoin('detil_pembelians','detil_pembelians.barang_id','=','barangs.id')
      //           ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(SUM(detil_pembelians.qty),0) as qty'))
      //           ->groupBy('barangs.kode_barang')
      //           ->get();


      // $mutasiStock = DB::table('barangs')
      //               ->select('barangs.kode_barang','barangs.nama',DB::raw('COALESCE(detil_pembelians.saldo),0) as saldoAwal',
      //                                                             DB::raw('COALESCE(detil_Pembelians.masuk),0) as masuk',
      //                                                             DB::raw('COALESCE(detil_Penjualans.keluar),0) as keluar')
      //               ->leftJoin()

        return view('MutasiStok.showMutasi',['stocks' => $stocks,
                                            'tglAwal' => $tglAwal,
                                            'tglAkhir' => $tglAkhir
        ]);
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
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
      {
          $bulan=11;
          $mutasiStok = DB::table('detil_penjualans')
                        ->join('faktur_juals','detil_penjualans.fj_id','=','faktur_juals.id')
                        ->select(DB::raw('SUM(detil_penjualans.qty) as Total'))
                        // ->select('detil_penjualans.qty')
                        ->where(date('m',strtotime('faktur_juals.tgl_fj')),'=',$bulan)
                        ->get();
                        \Log::debug($mutasiStok);

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
