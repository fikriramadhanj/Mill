@extends('layouts.index')

@section('pageTitle')
<h3>Edit Tipe Barang - {{ $update->nama_tipe }}</h3>
@endsection

@section('pageOptions')
<a href={{ route('tipe-barang.index')}} class="btn btn-primary">Kembali ke List Tipe Barang </a>
@endsection

@section('content')
<div class="container">
  <div class="my-3">
    @include('tipeBarang.form', ['formAction' => route('tipe-barang.update', ['id' => $update->id]), 'tipeBarangs' => $update ])
  </div>
</div>
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/datepicker.css">
@endsection

@section('scripts')
  <script src="/js/bootstrap-datepicker.min.js"></script>
  <script src="/js/moment.min.js"></script>
  <script src="/js/numeral.min.js"></script>
  <script src="/js/numeral-config.js"></script>
  <!-- <script src="/js/app/pelanggan.js"></script> -->
@endsection
