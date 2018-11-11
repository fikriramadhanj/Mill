@extends('layouts.index')


@section('pageOptions')
<a href={{ route('barang.create')}} class="btn btn-primary">Tambah Barang</a>
@endsection

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
            <th>Harga Jual </th>
            <th>Qty(kg) </th>
            <th>Stok Minimum </th>
            <th>Stok Maksimum </th>
            <th colspan="3">Action </th>
          </tr>
        </thead>
        <tbody>


          @foreach ($barangs as $barang)
          <tr>
            <td align="center"> {{date('j F Y', strtotime($barang->tgl_beli))}} </td>
            <td align="center"> {{$barang->kode_barang}} </td>
            <td align="center"> {{$barang->nama}} </td>
            <td align="right"> Rp.{{number_format($barang->harga_beli,2, ".", ",")}} </td>
            <td align="right"> Rp.{{number_format($barang->harga_jual,2, ".", ",")}} </td>
            <td align="center"> {{$barang->qty}} </td>
            <td align="center"> {{$barang->min_stok}} </td>
            <td align="center"> {{$barang->maks_stok}} </td>

            <td><a href="{{ route('barang.edit', [ 'id' => $barang->id ])}}" class="btn btn-secondary"> Update </a></td>

          </tr>
          @endforeach

          <div class = "col-md-6">

                 {{$barangs->links()}}

          </div>

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
