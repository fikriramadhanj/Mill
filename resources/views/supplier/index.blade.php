@extends('layouts.index')

@section('pageTitle')
<h3>List Supplier</h3>
@endsection

@section('pageOptions')
<a href={{ route('supplier.create')}} class="btn btn-primary">Tambah Supplier</a>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <td>Kode Supplier </td>
            <td>Nama Supplier </td>
            <td>Nama NPWP </td>
            <td>Alamat </td>
            <td>Kota </td>
            <td>Kode Pos </td>
            <td>No Telpon </td>
            <td>Fax </td>
            <td>Kontak Supplier</td>
            <td>Limit Hutang </td>
            <td>Tempo Bayar </td>
            <td>NPWP </td>
            <td>NPPKP </td>
            <td colspan="2">Action </td>
          </tr>
        </thead>
        <tbody>
          @foreach ($suppliers as $supplier)
          <tr>
            <td> {{$supplier->kode_supplier}} </td>
            <td> {{$supplier->nama_supplier}} </td>
            <td> {{$supplier->nama_npwp}} </td>
            <td> {{$supplier->alamat}} </td>
            <td> {{$supplier->kota}} </td>
            <td> {{$supplier->kode_pos}} </td>
            <td> {{$supplier->no_telp}} </td>
            <td> {{$supplier->fax}} </td>
            <td> {{$supplier->kontak_person}} </td>
            <td>Rp.{{number_format($supplier->limit_hutang,2, ".", ",")}} </td>
            <td> {{$supplier->tempo_bayar}} </td>
            <td> {{$supplier->npwp}} </td>
            <td> {{$supplier->nppkp}} </td>
            <td><a href="{{ route('supplier.edit', [ 'id' => $supplier->id ])}}" class="btn btn-secondary"> Update </a></td>
            <td>
              @include('supplier.delete')
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
