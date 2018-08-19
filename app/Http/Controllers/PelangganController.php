<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pelanggan;

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
        return view('FormAddPelanggan');
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
        $pelanggan->limit_hutang= $request->limitHutang;
        $pelanggan->default_tempo= $request->defaultTempo;
        $pelanggan->npwp= $request->npwp;
        $pelanggan->nppkp= $request->nppkp;

        $pelanggan->save();
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
        return view('FormUpdatePelanggan',[
          'update'=>$pelanggans
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
        $pelanggan->limit_hutang= $request->limitHutang;
        $pelanggan->default_tempo= $request->defaultTempo;
        $pelanggan->npwp= $request->npwp;
        $pelanggan->nppkp= $request->nppkp;

        $pelanggan->save();
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

        return redirect()->action('PelangganController@index');
    }
}
