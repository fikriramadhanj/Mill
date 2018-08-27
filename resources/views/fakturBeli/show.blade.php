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
                <td> {{$detilPembelian->harga_beli}} </td>
                <td> {{$detilPembelian->qty}} </td>
                <td> {{$detilPembelian->sub_total}} </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
