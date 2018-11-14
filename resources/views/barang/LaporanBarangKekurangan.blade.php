@extends('layouts.index')

@section('content')

<h3 align="center">Laporan Barang Kekurangan</h3>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Tanggal Pembelian </th>
            <th>Kode Barang </th>
            <th>Nama Barang </th>
            <th>Harga Beli </th>
            <th>Harga Jual </th>
            <th>Qty(kg) </th>

          </tr>
        </thead>
        <tbody>


          @foreach ($barangs as $barang)
          <tr>
            <td align="center"> {{date('j F Y', strtotime($barang->tgl_beli))}} </td>
            <td align="center"> {{$barang->kode_barang}} </td>
            <td align="center"> {{$barang->nama}} </td>
            <td align="center"> {{$barang->qty}} </td>
            <td align="center"> {{$barang->min_stok}} </td>


          </tr>
          @endforeach



        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
