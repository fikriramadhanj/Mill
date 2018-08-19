<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang;
use App\Supplier;
use App\Pelanggan;
use App\FakturJual;
use App\TipeBarang;
use App\DetilPenjualan;





class MillController extends Controller
{


    public function showAllDataBarang()
    {

            $barangs = Barang::all();
            return view('barang.index', [
              'barangs' => $barangs
              ]);

    }
    public function showAllDataSupplier()
    {

            $suppliers = Supplier::all();
            return view('showAllSupplier', [
              'suppliers' => $suppliers
              ]);

    }

    public function showAllDataPelanggan()
    {

            $pelanggans = Pelanggan::all();
            return view('ShowAllPelanggan', [
              'pelanggans' => $pelanggans
              ]);

    }

    public function showAllFakturJual()
    {

              $fakturJuals = DB::table('faktur_juals')
                             ->join('pelanggans','faktur_juals.pelanggan_id','=','pelanggans.id')
                             ->select('faktur_juals.id','faktur_juals.no_fj','faktur_juals.tgl_fj',
                                      'faktur_juals.tempo_bayar','pelanggans.nama_pelanggan',
                                      'faktur_juals.tgl_jatuh_tempo','faktur_juals.keterangan')
                             ->get();
              return view('fakturJual.index',[
                          'fakturJuals'=> $fakturJuals
                          ]);


    }
    public function showAllFakturBeli()
    {

              $fakturJuals = DB::table('faktur_belis')
                             ->join('suppliers','faktur_belis.supplier_id','=','suppliers.id')
                             ->select('faktur_belis.id','faktur_belis.no_fb','faktur_belis.tgl_fb',
                                      'faktur_belis.tempo_bayar','suppliers.nama_supplier',
                                      'faktur_belis.tgl_jatuh_tempo','faktur_belis.keterangan')
                             ->get();
              return view('ShowAllFakturBeli',[
                          'fakturBelis'=> $fakturbelis
                          ]);


    }


    public function showDetilPenjualan($id)
    {
           $detilPenjualans=DB::table('detil_penjualans')
                            ->join('barangs','detil_penjualans.barang_id','=','barangs.id')
                             ->join('faktur_juals','detil_penjualans.fj_id','=','faktur_juals.id')
                             ->select('detil_penjualans.qty','detil_penjualans.sub_total','barangs.nama','barangs.kode_barang',
                                     'barangs.harga_jual1','faktur_juals.no_fj')
                              ->where('faktur_juals.id',"=",$id)
                             ->get();

        //  $detilPenjualans = FakturJual::findOrFail($id)->detilPenjualan;
                            \Log::debug($detilPenjualans);

          return view('fakturJual.show',['detilPenjualans'=>$detilPenjualans
          ]);
    }
    public function showDetilPembelian($id)
    {
            $detilPembelians=DB::table('detil_pembelians')
                            ->join('barangs','detil_pembelians.barang_id','=','barangs.id')
                            ->join('faktur_belis','detil_pembelians.fb_id','=','faktur_belis.id')
                            ->select('detil_pembelians.qty','detil_pembelians.sub_total','barangs.nama','barangs.kode_barang',
                                'barangs.harga_beli','faktur_belis.no_fb')
                            ->where('faktur_belis.id',"=",$id)
                            ->get();

           return view('ShowDetilPembelian',['detilPembelians'=>$detilPembelians
                            ]);

    }

    public function showFormAddSupplier()
    {
          return view('FormAddSupplier');
    }

    public function showFormAddPelanggan()
    {
          return view('FormAddPelanggan');
    }

    public function showFormAddBarang()
    {
          $tipeBarang=$this->showTipeBarang();
          return view('barang.create',['tipeBarangs'=>$tipeBarang
          ]);
    }
    public function showFormFakturJual()
    {
          $pelanggan=$this->getPelanggan();
          $barangs=$this->getBarang();
          // $detilFakturJuals=$this->detilFakturJual;
          $tgl=Date('my');
          $noFJ="FJ-$tgl";

          $result = [
            'pelanggans'=>$pelanggan,
            'barangs'=>$barangs,
            'noFJ'=>$noFJ
          ];

          return view('fakturJual.create', $result);
    }
    public function showFormFakturBeli()
    {
        $suppliers = $this->getSupplier();
        $barangs = $this->getBarang();

        $result = ['suppliers'=>$suppliers,
                    'barangs'=>$barangs
                  ];
        return view('FormFakturBeli',$result);

    }

    public function showFormPelunasanPiutang()
    {
        $pelanggans = $this->getPelanggan();

        $result = ['pelanggans'=>$pelanggans];
      
       return view('FormPelunasanPiutang');
    }
    public function showFormUpdateBarang($id)
    {
        $barangs = Barang::find($id);
        $tipeBarang=$this->showTipeBarang();
        return view('barang.update',[
          'update'=>$barangs,
          'tipeBarangs' => $tipeBarang 
          ]);

    }

    public function showFormUpdateSupplier($id)
    {
        $suppliers = Supplier::find($id);
        return view('FormUpdateSupplier',[
          'update'=>$suppliers
          ]);

    }

    public function showFormUpdatePelanggan($id)
    {
        $pelanggans = Pelanggan::find($id);
        return view('FormUpdatePelanggan',[
          'update'=>$pelanggans
          ]);

    }
    public function addSupplier(Request $request)
    {
            $supplier= new Supplier();
            $supplier->kode_supplier=$request->kode;
            $supplier->nama_supplier=$request->nama;
            $supplier->nama_npwp=$request->npwp;
            $supplier->alamat=$request->alamat;
            $supplier->kota=$request->kota;
            $supplier->kode_pos=$request->kodePos;
            $supplier->no_telp=$request->noTelp;
            $supplier->fax=$request->fax;
            $supplier->kontak_person=$request->kontakPerson;
            $supplier->limit_hutang=$request->limitHutang;
            $supplier->tempo_bayar=$request->tempoBayar;
            $supplier->npwp=$request->npwp;
            $supplier->nppkp=$request->nppkp;

            $supplier->save();

            return redirect()->action('MillController@showAllDataSupplier');
    }
    public function showTipeBarang()
    {
        $idTipe = TipeBarang::all();
        \Log::debug($idTipe);
        return $idTipe;
    }
    public function getPelanggan()
    {
        $idPelanggan = Pelanggan::all();
        return $idPelanggan;
    }
    public function getSupplier()
    {
        $idSupplier = Supplier::all();
        return $idSupplier;
    }
    public function getBarang()
    {
        $barangs = Barang::all();
        \Log::debug($barangs);
        return $barangs;
    }

    public function addBarang(Request $request)
    {
          $barang= new Barang();
          $barang->kode_barang=$request->kode;
          $barang->tipe_id=$request->tipeBarang;
          $barang->tgl_beli=$request->tgl_beli;
          $barang->nama=$request->nama;
          $barang->berat=$request->berat;
          $barang->harga_beli=$request->hargaBeli;
          $barang->harga_jual1=$request->hargaJual1;
          $barang->harga_jual2=$request->hargaJual2;
          $barang->harga_jual3=$request->hargaJual3;
          $barang->harga_jual4=$request->hargaJual4;
          $barang->harga_jual5=$request->hargaJual5;
        //  $barang->qty_minimum=$request->qtyMinimum;
          $barang->qty=$request->qty;
          //$barang->keterangan=$request->keterangan;
          \Log::debug($request);
          $barang->save();
          return redirect()->action('MillController@showAllDataBarang');

    }

    public function addPelanggan(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $request->kode;
        $pelanggan->nama_pelanggan = $request->nama;
        $pelanggan->alamat= $request->alamat;
        $pelanggan->kota= $request->kota;
        $pelanggan->kode_pos= $request->kodePos;
        $pelanggan->no_telp= $request->noTelp;
        $pelanggan->fax= $request->fax;
        $pelanggan->kontak_person= $request->kontakPerson;
        $pelanggan->limit_hutang= $request->limitHutang;
        $pelanggan->default_tempo= $request->defaultTempo;
        $pelanggan->npwp= $request->npwp;
        $pelanggan->nppkp= $request->nppkp;

        $pelanggan->save();
        return redirect()->action('MillController@showAllDataPelanggan');


    }
    public function addFakturJual(Request $request)
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
              
            // $detilJuals=new DetilPenjualan();
            // $detilJuals->qty=$request->qty;
            // $detilJuals->sub_total=$request->subTotal;
            // $detilJuals->barang_id=$request->barangId;
            // $detilJuals->fj_id = $fakturJuals->id;
            // $detilJuals->save();
            // return view('FormFakturJual',['fakturJuals'=>$fakturJuals, 'detilJuals'=>$detilJuals]);

           return redirect()->action('MillController@showAllFakturJual');

    }

    public function addFakturBeli(Request $request)
    {
          $fakturBelis= new FakturBeli();
          $fakturBelis->no_fb=$request->noFB;
          $fakturBelis->tgl_fb=$request->tglFB;
          $fakturBelis->tempo_bayar=$request->tempoBayar;
          $fakturBelis->total_faktur=$request->totalFaktur;
          $fakturBelis->no_pajak=$request->noPajak;
          $fakturBelis->keterangan=$request->keterangan;
          $fakturBelis->save();
          return redirect()->action('MillController@showAllFakturBeli');

    }
    public function addDetilPembelian(Request $request)
    {
          $detilPembelians= new DetilPembelian();
          $detilPembelians->fb_id=$request->fbId;
          $detilPembelians->barang_id=$request->barangId;
          $detilPembelians->qty=$request->qty;
          $detilPembelians->sub_total=$request->subTotal;
          $detilPembelians->discount=$request->discount;
          $detilPembelians->total_setelah_diskon=$request->totalSetelahDiskon;

          $detilPembelians->save();

          return redirect()->action('MillController@showDetilPembelian');

    }


    public function updateBarang(Request $request)
    {
          $barang = Barang::find($request->id);
          $barang->kode_barang=$request->kode;
          $barang->nama=$request->nama;
          $barang->berat=$request->berat;
          $barang->harga_beli=$request->hargaBeli;
          $barang->harga_jual1=$request->hargaJual1;
          $barang->harga_jual2=$request->hargaJual2;
          $barang->harga_jual3=$request->hargaJual3;
          $barang->harga_jual4=$request->hargaJual4;
          $barang->harga_jual5=$request->hargaJual5;
          $barang->qty=$request->qty;
          $barang->save();

          //$barang->keterangan=$request->keterangan;

          return redirect()->action('MillController@showAllDataBarang');


    }

    public function updateSupplier(Request $request)
    {
          $supplier = Supplier::find($request->id);
          $supplier->kode_supplier=$request->kode;
          $supplier->nama_supplier=$request->nama;
          $supplier->nama_npwp=$request->npwp;
          $supplier->alamat=$request->alamat;
          $supplier->kota=$request->kota;
          $supplier->kode_pos=$request->kodePos;
          $supplier->no_telp=$request->noTelp;
          $supplier->fax=$request->fax;
          $supplier->kontak_person=$request->kontakPerson;
          $supplier->limit_hutang=$request->limitHutang;
          $supplier->tempo_bayar=$request->tempoBayar;
          $supplier->npwp=$request->npwp;
          $supplier->nppkp=$request->nppkp;
          $supplier->save();

          return redirect()->action('MillController@showAllDataSupplier');

    }

    public function updatePelanggan(Request $request)
    {
          $pelanggan= Pelanggan::find($request->id);
          $pelanggan->kode_pelanggan = $request->kode;
          $pelanggan->nama_pelanggan = $request->nama;
          $pelanggan->alamat= $request->alamat;
          $pelanggan->kota= $request->kota;
          $pelanggan->kode_pos= $request->kodePos;
          $pelanggan->no_telp= $request->noTelp;
          $pelanggan->fax= $request->fax;
          $pelanggan->kontak_person= $request->kontakPerson;
          $pelanggan->limit_hutang= $request->limitHutang;
          $pelanggan->default_tempo= $request->defaultTempo;
          $pelanggan->npwp= $request->npwp;
          $pelanggan->nppkp= $request->nppkp;

          $pelanggan->save();
          return redirect()->action('MillController@showAllDataPelanggan');

    }
    public function deleteBarang(Request $request)
    {
          $barang = Barang::find($request->id);
          $barang->delete();

          return redirect()->action('MillController@showAllDataBarang');
    }

    public function deleteSupplier(Request $request)
    {
          $supplier = Supplier::find($request->id);
          $supplier->delete();

          return redirect()->action('MillController@showAllDataSupplier');
    }

    public function deletePelanggan(Request $request)
    {
          $supplier = Pelanggan::find($request->id);
          $supplier->delete();

          return redirect()->action('MillController@showAllDataPelanggan');
    }






}
