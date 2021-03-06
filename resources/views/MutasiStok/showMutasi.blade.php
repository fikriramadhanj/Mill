@extends('layouts.index')

@section('pageTitle')

@endsection



@section('content')
<div class="container">
  <div class="my-3">
    @include('MutasiStok.mutasi',['formAction' => route('mutasi-stok.mutasi')])
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
