@extends('layouts.index')


@section('pageOptions')
<a href={{ route('supplier.create')}} class="btn btn-primary">Tambah Supplier</a>
@endsection

@section('content')
<h3 align="center">List Supplier</h3>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Kode Supplier </th>
            <th>Nama Supplier </th>
            <th>Nama NPWP </th>
            <th>Alamat </th>
            <th>Kota </th>
            <th>Kode Pos </th>
            <th>No Telpon </th>
            <th>Fax </th>
            <th>Kontak Supplier</th>
            <th>NPWP </th>
            <th>NPPKP </th>
            <th colspan="2">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($suppliers as $supplier)
          <tr>
            <td align="center"> {{$supplier->kode_supplier}} </td>
            <td align="center"> {{$supplier->nama_supplier}} </td>
            <td align="center"> {{$supplier->nama_npwp}} </td>
            <td align="center"> {{$supplier->alamat}} </td>
            <td align="center"> {{$supplier->kota}} </td>
            <td align="center"> {{$supplier->kode_pos}} </td>
            <td align="center"> {{$supplier->no_telp}} </td>
            <td align="center"> {{$supplier->fax}} </td>
            <td align="center"> {{$supplier->kontak_person}} </td>
            <td align="center"> {{$supplier->npwp}} </td>
            <td align="center"> {{$supplier->nppkp}} </td>
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
