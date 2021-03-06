@extends('layouts.index')

@section('content')

<h3 align="center">Laporan Barang Kelebihan</h3>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Tanggal Pembelian </th>
            <th>Kode Barang </th>
            <th>Nama Barang </th>
            <th>Qty(Kg)</th>
            <th>Stok Maks </th>

          </tr>
        </thead>
        <tbody>


          @foreach ($barangs as $barang)
          <tr>
            <td align="center"> {{date('j F Y', strtotime($barang->tgl_beli))}} </td>
            <td align="center"> {{$barang->kode_barang}} </td>
            <td align="center"> {{$barang->nama}} </td>
            <td align="center"> {{$barang->qty}} </td>
            <td align="center"> {{$barang->maks_stok}} </td>


          </tr>
          @endforeach



        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
