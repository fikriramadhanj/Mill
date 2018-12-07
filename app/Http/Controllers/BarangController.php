<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\SaldoAwalBarang;
use App\Models\TipeBarang;
use DB;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = DB::table('barangs')->paginate(5);

        return view('barang.index',
            [
                'barangs' => $barangs

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
        $tipeBarang= TipeBarang::all();
        $idBarang= DB::table('barangs')
                   ->select('id')
                   ->orderBy('id','DESC')
                   ->limit(1)
                   ->value('id');

        $newid = $idBarang + 1;
        $newIdBarang="BRG-0$newid";
        return view('barang.create',
            [
                'tipeBarangs'=>$tipeBarang,
                'idBarang' => $newIdBarang

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang= new Barang();
        $barang->kode_barang=$request->kode;
        $barang->tipe_id=$request->tipeId;
        $barang->tgl_beli=$request->tgl_beli;
        $barang->nama=$request->nama;
        $barang->harga_beli=$request->hargaBeli;
        $barang->harga_jual=$request->hargaJual;
        $barang->qty=0;
        $barang->min_stok=$request->minStok;
        $barang->maks_stok=$request->maksStok;
        $barang->save();


        //Penambahan barang ke Saldo Awal Barang
        $tglBeli = $request->tgl_beli;

        $bulan = date('m',strtotime($tglBeli));
        $tahun = date('Y',strtotime($tglBeli));
        // \Log::debug($bulan);
        $saldoAwal = new SaldoAwalBarang();
        $saldoAwal->kode_barang = $request->kode;
        $saldoAwal->bulan = $bulan;
        $saldoAwal->tahun = $tahun;
        $saldoAwal->qty= $barang->qty;
        $saldoAwal->save();

        Alert::success('Data barang berhasil ditambahkan');


        return redirect()->action('BarangController@index');
    }

    public function showAwalBarang()
    {

          $saldoAwals = SaldoAwalBarang::all();
          return view('barang.ShowSaldoAwalBarang',['saldoAwals'=> $saldoAwals]);

    }

    public function editSaldoBarang($id){


          $saldoAwal = SaldoAwalBarang::find($id);
          return view('barang.updateSaldo',[
            'update'=>$saldoAwal,
            'saldoAwal' =>$saldoAwal
            ]);
    }
    public function storeSaldoAwalBarang()
    {
        $barangs = Barang::all();
        \Log::debug($barangs);

            foreach($barangs as $barang)
            {
                $tglBeli = $barang->tgl_beli;

                $bulan = date('m',strtotime($tglBeli));
                $tahun = date('Y',strtotime($tglBeli));
                // \Log::debug($bulan);
                $saldoAwal = new SaldoAwalBarang();
                $saldoAwal->kode_barang = $barang->kode_barang;
                $saldoAwal->bulan = $bulan;
                $saldoAwal->tahun = $tahun;

                $saldoAwal->qty= $barang->qty;
                if($saldoAwal!=null)
                {
                  $saldoAwal->save();
                }


            }

        return redirect()->action('BarangController@showAwalBarang');



    }
    public function updateSaldoBarang(Request $request, $id){

        $saldoAwal = SaldoAwalBarang::find($id);
        $saldoAwal->kode_barang = $request->kodeBarang;
        $saldoAwal->bulan=$request->bulan;
        $saldoAwal->tahun = $request->tahun;
        $saldoAwal->qty= $request->qty;
        $saldoAwal->save();
        return redirect()->action('BarangController@showAwalBarang');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::find($id);
        $tipeBarang = TipeBarang::all();
        return view('barang.update',[
          'update'=>$barangs,
          'tipeBarangs' => $tipeBarang
          ]);
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
        $barang = Barang::find($request->id);
        $barang->kode_barang = $request->kode;
        $barang->nama = $request->nama;
        $barang->harga_beli = $request->hargaBeli;
        $barang->harga_jual = $request->hargaJual;
        $barang->qty = $request->qty;
        $barang->min_stok = $request->minStok;
        $barang->maks_stok = $request->maksStok;
        $barang->save();

        //$barang->keterangan=$request->keterangan;
        Alert::success('Data barang berhasil diubah');

        return redirect()->action('BarangController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        Alert::success('Data barang berhasil dihapus');

        return redirect()->action('BarangController@index');
    }

    public function laporanBarangKekurangan()
    {
          // $barangs = DB::table('barangs')
          //            ->select('tgl_beli','kode_barang','nama','qty','min_stok')
          //            ->where('qty','<','min_stok')
          //            ->get();

          $barangs=DB::select("select tgl_beli, kode_barang, nama, qty, min_stok
                      from barangs where qty < min_stok");

         return view('barang.LaporanBarangKekurangan',['barangs' => $barangs]);


    }

    public function laporanBarangKelebihan()
    {
          // $barangs = DB::table('barangs')
          //                ->select('tgl_beli','kode_barang', 'nama', 'qty','maks_stok')
          //                ->where('qty','>','maks_stok')
          //                ->get();

          $barangs=DB::select("select tgl_beli, kode_barang, nama, qty, maks_stok
                      from barangs where qty > maks_stok");

          return view('barang.LaporanBarangKelebihan',['barangs' => $barangs]);

    }


}
