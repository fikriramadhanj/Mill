@extends('layouts.index')

@section('pageTitle')
@endsection

@section('pageOptions')
<a href={{ route('pelunasan-piutang.create')}} class="btn btn-primary">Tambah Pembayaran</a>
@endsection

@section('content')
<h3 align="center">List Pembayaran Piutang</h3>

<div class="container">
  <div class="row">
    <div class="col-lg-15">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Pembayaran </th>
            <th>Nomor Faktur </th>
            <th>Nama Pelanggan </th>
            <th>Tanggal Pembayaran </th>
            <th>Tanggal Jatuh Tempo </th>
            <th>Tempo Bayar </th>
            <th>Total Pembayaran </th>
            <th>Sisa Piutang</th>
          </tr >
        </thead>
        <tbody>
          @foreach($pelunasanPiutangs as $pelunasanPiutang)
          <tr>
            <td align="center"> {{$pelunasanPiutang->no_pembayaran}} </td>
            <td align="center"> {{$pelunasanPiutang->no_fj}} </td>
            <td align="center"> {{$pelunasanPiutang->nama_pelanggan}} </td>
            <td align="center"> {{date('j F Y', strtotime($pelunasanPiutang->tgl_pembayaran))}} </td>
            <td align="center"> {{date('j F Y', strtotime($pelunasanPiutang->tgl_jatuh_tempo))}} </td>
            <td align="center"> {{$pelunasanPiutang->tempo_bayar}} hari </td>
            <td align="right"> Rp. {{number_format($pelunasanPiutang->total_pembayaran,2, ".", ",")}} </td>
            <td align="right"> Rp. {{number_format($pelunasanPiutang->sisa_hutang,2, ".", ",")}} </td>



          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
