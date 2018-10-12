<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', [
            'suppliers' => $suppliers
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $idSupplier= DB::table('suppliers')
                 ->select('id')
                 ->orderBy('id','DESC')
                 ->limit(1)
                 ->value('id');
      $newid = $idSupplier + 1;
      $newIdSupplier="SPL-0$newid";

        return view('supplier.create',[ 'idSupplier' =>$newIdSupplier
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

        return redirect()->action('SupplierController@index');
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
        $suppliers = Supplier::find($id);
        return view('supplier.update',
            [
                'update'=>$suppliers
            ]
        );
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

        return redirect()->action('SupplierController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->action('SupplierController@index');
    }
}
