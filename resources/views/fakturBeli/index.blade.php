@extends('layouts.index')

@section('pageTitle')
<h3>List Pembelian</h3>
@endsection

@section('pageOptions')
<a href={{ route('faktur-beli.create')}} class="btn btn-primary">Tambah Pembelian</a>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Beli </th>
            <th>No Surat Jalan </th>
            <th>No Pajak </th>
            <th>Nama Supplier </th>
            <th>Uang Muka </th>
            <th>Tanggal Faktur Beli </th>
            <th>Tanggal Jatuh Tempo </th>
            <th>Tempo Bayar </th>
            <th>Keterangan </th>
            <th colspan="3">Action </th>
          </tr  >
        </thead>
        <tbody>
          @foreach($fakturBelis as $fakturBeli)
          <tr>
            <td> {{$fakturBeli->no_fb}} </td>
            <td> {{$fakturBeli->no_sj}} </td>
            <td> {{$fakturBeli->no_pajak}} </td>
            <td> {{$fakturBeli->nama_supplier}} </td>
            <td>Rp.{{number_format($fakturBeli->uang_muka,2,".",",")}} </td>
            <td> {{date('j F Y', strtotime($fakturBeli->tgl_fb))}} </td>
            <td> {{date('j F Y', strtotime($fakturBeli->tgl_jatuh_tempo))}} </td>
            <td> {{$fakturBeli->tempo_bayar}} hari </td>
            <td> {{$fakturBeli->keterangan}} </td>
            <td> <a href="{{ route('faktur-beli.show', ['id' => $fakturBeli->id ])}}"> Detil Pembelian  </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
