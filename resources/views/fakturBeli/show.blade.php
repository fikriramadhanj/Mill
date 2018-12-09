@extends('layouts.index')

@section('pageTitle')

@endsection

@section('pageOptions')
<a href={{ route('faktur-beli.index')}} class="btn btn-primary">Kembali ke List Pembelian</a>
@endsection

@section('content')
<h3 align="center">Detil Pembelian</h3>
<div class="container">
  <h5> {{"Tanggal Faktur : ".date('j F Y', strtotime($supplier->tgl_fb))}} </h5>
    <h5>{{"Nomor Faktur : ".$supplier->no_fb}}</h5>
  <h5>{{"Nama Supplier : ".$supplier->nama_supplier}} </h5>
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
          </tr  >
        </thead>
        <tbody>
          @if (isset($detilPembelians))
            @foreach($detilPembelians as $detilPembelian)
              <tr>
                <td align="center"> {{$detilPembelian->kode_barang}} </td>
                <td align="center"> {{$detilPembelian->nama}} </td>
                <td align="right"> Rp. {{number_format($detilPembelian->harga_beli,2,".", ",")}} </td>
                <td align="center"> {{$detilPembelian->qty}} </td>
                <td align="right"> Rp. {{number_format($detilPembelian->sub_total,2,".",",")}} </td>
              </tr>
            @endforeach
          @endif
          <td colspan ="6" align="right" > <b >Total : Rp. {{number_format($total,2,".",",")}}</b> </td>

        </tbody>
      </table>
      <a href="{{ route('faktur-beli.pdf', ['id' => $detilPembelian->id ])}}" class="btn btn-primary">Cetak Faktur</a>

    </div>
  </div>
</div>
@endsection
