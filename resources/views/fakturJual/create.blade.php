@extends('layouts.index')


@section('pageOptions')
<a href={{ route('faktur-jual.index')}} class="btn btn-primary">Kembali ke List Penjualan</a>
@endsection

@section('content')
<h3 align="center">Tambah Faktur Jual</h3>

<div class="container">
  <div class="my-3">
    @include('fakturJual.form', ['formAction' => route('faktur-jual.store')])
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
  <script src="/js/app/faktur-jual.js"></script>
@endsection
