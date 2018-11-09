@extends('layouts.index')

@section('pageOptions')
<a href={{ route('barang.index')}} class="btn btn-primary">Kembali ke List Barang</a>
@endsection

@section('content')
<h3 align="center">Tambah Barang</h3>

<div class="container">
  <div class="my-3">
  @include('barang.form', ['formAction' => route('barang.store'), 'barang' => ''])
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
  <script src="/js/app/barang.js"></script>
@endsection
