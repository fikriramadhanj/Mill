@extends('layouts.index')


@section('content')
<h3 align="center">List Barang</h3>
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
            <th>Harga Jual 1 </th>
            <th>Harga Jual 2 </th>
            <th>Harga Jual 3 </th>
            <th>Harga Jual 4 </th>
            <th>Harga Jual 5 </th>
            <th>Qty(kg) </th>
          </tr>
        </thead>
        <tbody>


          @foreach ($barangs as $barang)
          <tr>
            <td align="center"> {{date('j F Y', strtotime($barang->tgl_beli))}} </td>
            <td align="center"> {{$barang->kode_barang}} </td>
            <td align="center"> {{$barang->nama}} </td>
            <td align="center"> Rp.{{number_format($barang->harga_beli,2, ".", ",")}} </td>
            <td align="center"> Rp.{{number_format($barang->harga_jual1,2, ".", ",")}} </td>
            <td align="center"> Rp.{{number_format($barang->harga_jual2,2, ".", ",")}} </td>
            <td align="center"> Rp.{{number_format($barang->harga_jual3,2, ".", ",")}} </td>
            <td align="center"> Rp.{{number_format($barang->harga_jual4,2, ".", ",")}} </td>
            <td align="center"> Rp.{{number_format($barang->harga_jual5,2, ".", ",")}} </td>
            <td align="center"> {{$barang->qty}} </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
