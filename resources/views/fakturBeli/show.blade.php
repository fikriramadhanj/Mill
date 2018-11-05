@extends('layouts.index')

@section('pageTitle')
<h3>Detail Pembelian</h3>
@endsection

@section('pageOptions')
<a href={{ route('faktur-beli.index')}} class="btn btn-primary">Kembali ke List Pembelian</a>
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
          </tr  >
        </thead>
        <tbody>
          @if (isset($detilPembelians))
            @foreach($detilPembelians as $detilPembelian)
              <tr>
                <td> {{$detilPembelian->kode_barang}} </td>
                <td> {{$detilPembelian->nama}} </td>
                <td> Rp. {{number_format($detilPembelian->harga_beli,2,".", ",")}} </td>
                <td> {{$detilPembelian->qty}} </td>
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
