@extends('layouts.index')


@section('pageOptions')
<a href={{ route('tipe-barang.create')}} class="btn btn-primary">Tambah Tipe Barang</a>
@endsection

@section('content')
<h3 align="center">List Tipe Barang</h3>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <td>Id Tipe </td>
            <td>Nama Tipe </td>

            <td colspan="2">Action </td>
          </tr>
        </thead>
        <tbody>
          @foreach ($tipeBarangs as $tipeBarang)
          <tr>
            <td> {{$tipeBarang->id}} </td>
            <td> {{$tipeBarang->nama_tipe}} </td>

            <td><a href="{{ route('tipe-barang.edit', [ 'id' => $tipeBarang->id ])}}" class="btn btn-secondary"> Update </a></td>
            <td>
            @include('tipeBarang.delete')
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
