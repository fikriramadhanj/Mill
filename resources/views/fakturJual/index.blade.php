@extends('layouts.index')

@section('pageOptions')
<a href={{ route('faktur-jual.create')}} class="btn btn-primary">Tambah Penjualan</a>
@endsection

@section('content')
<h3 align="center">List Penjualan</h3>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Jual </th>
            <th>Nama Pelanggan </th>
            <th>Tanggal Faktur Jual </th>
            <th> Status </th>
            <th>Keterangan </th>
            <th>Total Faktur </th>
            <th colspan="4">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($fakturJuals as $fakturJual)
          <tr>
            <td align="center"> {{$fakturJual->no_fj}} </td>
            <td align="center"> {{$fakturJual->nama_pelanggan}} </td>
            <td align="center"> {{date('j F Y', strtotime($fakturJual->tgl_fj))}} </td>
            <td align="center"> {{$fakturJual->status}} </td>
            <td align="center"> {{$fakturJual->keterangan}} </td>
            <td align="center">Rp. {{number_format($fakturJual->total_faktur,2,".",",")}} </td>
            <td> <a href="{{ route('faktur-jual.show', ['id' => $fakturJual->id ])}}" class="btn btn-primary">Detil Faktur</a></td>
            <td>  @include('fakturJual.Delete')</td>



          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
