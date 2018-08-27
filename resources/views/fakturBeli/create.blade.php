@extends('layouts.index')

@section('pageTitle')
<h3>Tambah Faktur Beli</h3>
@endsection

@section('pageOptions')
<a href={{ route('faktur-beli.index')}} class="btn btn-primary">Kembali ke List Pembelian</a>
@endsection

@section('content')
<div class="container">
  <div class="my-3">
    @include('fakturBeli.form', ['formAction' => route('faktur-beli.store')])
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
