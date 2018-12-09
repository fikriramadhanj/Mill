@extends('layouts.index')

@section('pageTitle')

@endsection
@section('pageOptions')
<a href={{ route('faktur-jual.index')}} class="btn btn-primary">Kembali ke List Penjualan</a>
@endsection

@section('content')
<h3 align="center">Detil Penjualan</h3>

<div class="container">
  <h5> {{"Tanggal Faktur : ".date('j F Y', strtotime($pelanggan->tgl_fj))}} </h5>
    <h5>{{"Nomor Faktur : ".$pelanggan->no_fj}}</h5>
  <h5>{{"Nama Pelanggan : ".$pelanggan->nama_pelanggan}} </h5>

  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th> Kode Barang </th>
            <th> Nama Barang </th>
            <th> Harga Barang </th>
            <th> Qty(Kg) </th>
            <th> Subtotal </th>

          </tr>
        </thead>
        <tbody>
          @if (isset($detilPenjualans))
            @foreach($detilPenjualans as $detilPenjualan)
              <tr>
                <td align="center"> {{$detilPenjualan->kode_barang}} </td>
                <td align="center"> {{$detilPenjualan->nama}} </td>
                <td align="right"> Rp. {{number_format($detilPenjualan->harga_jual,2, ".", ",")}} </td>
                <td align="center"> {{$detilPenjualan->qty}} </td>
                <td align="right"> Rp. {{number_format($detilPenjualan->sub_total,2, ".", ",")}} </td>

              </tr>
            @endforeach
          @endif
          <td colspan ="6" align="right" > <b >Total : Rp. {{number_format($total,2,".",",")}}</b> </td>


        </tbody>
      </table>
      <a href="{{ route('faktur-jual.cetak', ['id' => $detilPenjualan->id ])}}" class="btn btn-primary">Cetak Faktur</a>

    </div>
  </div>
</div>
@endsection
