@extends('layouts.index')

@section('pageTitle')
<h3>List Penjualan</h3>
@endsection

@section('pageOptions')
<a href={{ route('faktur-jual.create')}} class="btn btn-primary">Tambah Penjualan</a>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Jual </th>
            <th>Nama Pelanggan </th>
            <th>Tanggal Faktur Jual </th>
            <th>Tanggal Jatuh Tempo </th>
            <th>Tempo Bayar </th>
            <th>Keterangan </th>
            <th>Total </th>

            <th colspan="3">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($fakturJuals as $fakturJual)
          <tr>
            <td> {{$fakturJual->no_fj}} </td>
            <td> {{$fakturJual->nama_pelanggan}} </td>
            <td> {{date('j F Y', strtotime($fakturJual->tgl_fj))}} </td>
            <td> {{date('j F Y', strtotime($fakturJual->tgl_jatuh_tempo))}} </td>
            <td> {{$fakturJual->tempo_bayar}} </td>
            <td> {{$fakturJual->keterangan}} </td>
            <td> {{$fakturJual->keterangan}} </td>
            <td> <a href="{{ route('faktur-jual.show', ['id' => $fakturJual->id ])}}"> Detil Penjualan  </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
