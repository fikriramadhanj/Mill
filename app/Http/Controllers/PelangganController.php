<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use DB;
use Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', [
            'pelanggans' => $pelanggans
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $idPelanggan= DB::table('pelanggans')
                 ->select('id')
                 ->orderBy('id','DESC')
                 ->limit(1)
                 ->value('id');
      $newid = $idPelanggan + 1;
      $newIdPelanggan="PLG-0$newid";


        return view('pelanggan.create',['idPelanggan'=>$newIdPelanggan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $pelanggan->npwp= $request->npwp;
        $pelanggan->nppkp= $request->nppkp;

        $pelanggan->save();
        Alert::success('Data pelanggan berhasil ditambahkan');
        return redirect()->action('PelangganController@index');

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

        $pelanggans = Pelanggan::find($id);
        return view('pelanggan.update',[
          'update'=>$pelanggans,

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
        $pelanggan= Pelanggan::find($id);
        $pelanggan->kode_pelanggan = $request->kode;
        $pelanggan->nama_pelanggan = $request->nama;
        $pelanggan->alamat= $request->alamat;
        $pelanggan->kota= $request->kota;
        $pelanggan->kode_pos= $request->kodePos;
        $pelanggan->no_telp= $request->noTelp;
        $pelanggan->fax= $request->fax;
        $pelanggan->kontak_person= $request->kontakPerson;
        $pelanggan->npwp= $request->npwp;
        $pelanggan->nppkp= $request->nppkp;

        $pelanggan->save();
        Alert::success('Data pelanggan berhasil diubah');
        return redirect()->action('PelangganController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        Alert::success('Data pelanggan berhasil dihapus');
        return redirect()->action('PelangganController@index');

    }
}
