@extends('layouts.index')

@section('pageTitle')
<h3>List Pelanggan</h3>
@endsection

@section('pageOptions')
<a href={{ route('pelanggan.create')}} class="btn btn-primary">Tambah Pelanggan</a>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>Kode Pelanggan </th>
              <th>Nama Pelanggan </th>
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
            @foreach ($pelanggans as $pelanggan)
            <tr>
              <td align="center"> {{$pelanggan->kode_pelanggan}} </td>
              <td align="center"> {{$pelanggan->nama_pelanggan}} </td>
              <td align="center"> {{$pelanggan->alamat}} </td>
              <td align="center"> {{$pelanggan->kota}} </td>
              <td align="center"> {{$pelanggan->kode_pos}} </td>
              <td align="center"> {{$pelanggan->no_telp}} </td>
              <td align="center"> {{$pelanggan->fax}} </td>
              <td align="center"> {{$pelanggan->kontak_person}} </td>
              <td align="center"> {{$pelanggan->npwp}} </td>
              <td align="center"> {{$pelanggan->nppkp}} </td>
              <td><a href="{{ route('pelanggan.edit', [ 'id' => $pelanggan->id ])}}" class="btn btn-secondary"> Update </a></td>
              <td>
                @include('pelanggan.delete')
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
