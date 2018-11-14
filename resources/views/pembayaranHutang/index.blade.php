@extends('layouts.index')

@section('pageOptions')
<a href={{ route('pembayaran-hutang.create')}} class="btn btn-primary">Tambah Pembayaran</a>
@endsection


@section('content')
<h3 align="center">List Pembayaran Hutang</h3>
<div class="container">
  <div class="row">
    <div class="col-lg-17">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Nomor Pembayaran </th>
            <th>Nomor Faktur </th>
            <th>Nama supplier</th>
            <th>Tanggal Pembayaran </th>
            <th>Tanggal Jatuh Tempo </th>
            <th>Tempo Bayar </th>
            <th>Total Pembayaran </th>
            <th>Sisa Hutang </th>


          </tr  >
        </thead>
        <tbody>
          @foreach($pembayaranHutangs as $pembayaranHutang)
          <tr>
            <td  align="center"> {{$pembayaranHutang->no_pembayaran}} </td>
            <td  align="center"> {{$pembayaranHutang->no_fb}} </td>
            <td  align="center"> {{$pembayaranHutang->nama_supplier}} </td>
            <td  align="center"> {{date('j F Y', strtotime($pembayaranHutang->tgl_pembayaran))}} </td>
            <td  align="center"> {{date('j F Y', strtotime($pembayaranHutang->tgl_jatuh_tempo))}} </td>
            <td align="center"> {{$pembayaranHutang->tempo_bayar}} hari </td>
            <td align="right"> Rp. {{number_format($pembayaranHutang->total_pembayaran,2, ".", ",")}} </td>
            <td  align="right"> Rp. {{number_format($pembayaranHutang->sisa_hutang,2, ".", ",")}} </td>



          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
