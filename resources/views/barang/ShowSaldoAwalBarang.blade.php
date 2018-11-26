@extends('layouts.index')


@section('pageOptions')
<a href={{ route('barang.create')}} class="btn btn-primary">Tambah Barang</a>
@endsection

@section('content')


<h3 align="center">Saldo Awal Barang</h3>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Kode </th>
            <th>Bulan </th>
            <th>Tahun </th>
            <th>Qty </th>
            <th>Action </th>


          </tr>
        </thead>
        <tbody>


          @foreach ($saldoAwals as $saldoAwal)
          <tr>

            <td align="center"> {{$saldoAwal->kode_barang}} </td>
            <td align="center"> {{$saldoAwal->bulan}} </td>
            <td align="center"> {{$saldoAwal->tahun}} </td>
            <td align="center"> {{$saldoAwal->qty}} </td>
            <td><a href="{{ route('barang.edit-saldo', [ 'id' => $saldoAwal->id ])}}" class="btn btn-secondary"> Update </a></td>


          </tr>
          @endforeach



        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
