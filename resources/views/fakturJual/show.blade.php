@extends('layouts.index')

@section('pageTitle')
<h3>Detail Penjualan</h3>
@endsection

@section('pageOptions')
<a href={{ route('faktur-jual.index')}} class="btn btn-primary">Kembali ke List Penjualan</a>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th> Kode Barang </th>
            <th> Nama Barang </th>
            <th> Harga Barang </th>
            <th> Qty </th>
            <th> Subtotal </th>

          </tr>
        </thead>
        <tbody>
          @if (isset($detilPenjualans))
            @foreach($detilPenjualans as $detilPenjualan)
              <tr>
                <td align="center"> {{$detilPenjualan->kode_barang}} </td>
                <td align="center"> {{$detilPenjualan->nama}} </td>
                <td align="center"> Rp. {{number_format($detilPenjualan->harga_jual1,2, ".", ",")}} </td>
                <td align="center"> {{$detilPenjualan->qty}} </td>
                <td align="right"> Rp. {{number_format($detilPenjualan->sub_total,2, ".", ",")}} </td>

              </tr>
            @endforeach
          @endif
          <td colspan ="6" align="right" > <b >Total : Rp. {{number_format($total,2,".",",")}}</b> </td>


        </tbody>
      </table>
      <a href="{{ route('faktur-jual.pdf', ['id' => $detilPenjualan->id ])}}" class="btn btn-primary">Cetak Faktur</a>

    </div>
  </div>
</div>
@endsection
