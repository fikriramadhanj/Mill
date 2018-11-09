@extends('layouts.index')

@section('content')
<div class="container">
  <div class="my-3">
    @include('fakturBeli.laporanPembelian', ['formAction' => route('faktur-beli.laporan')])
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
  <script src="/js/app/faktur-beli.js"></script>
@endsection
