@extends('layouts.index')

@section('pageOptions')
<a href={{ route('faktur-beli.create')}} class="btn btn-primary">Tambah Pembelian</a>
@endsection

@section('content')
<h3 align="center">List Pembelian</h3>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Beli </th>
            <th>Nama Supplier </th>
            <th>Tanggal Faktur Beli </th>
            <th>Status </th>
            <th>Keterangan </th>
            <th>Total Faktur </th>
            <th colspan="3">Action </th>
          </tr  >
        </thead>
        <tbody>
          @foreach($fakturBelis as $fakturBeli)
          <tr>
            <td align="center"> {{$fakturBeli->no_fb}} </td>
            <td align="center"> {{$fakturBeli->nama_supplier}} </td>
            <td align="center"> {{date('j F Y', strtotime($fakturBeli->tgl_fb))}} </td>
            <td align="center"> {{$fakturBeli->status}} </td>
            <td align="center"> {{$fakturBeli->keterangan}} </td>
            <td align="right">Rp. {{number_format($fakturBeli->total_faktur,2,".",",")}} </td>
            <td align="center"> <a href="{{ route('faktur-beli.show', ['id' => $fakturBeli->id ])}}" class="btn btn-primary">Detail </a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
