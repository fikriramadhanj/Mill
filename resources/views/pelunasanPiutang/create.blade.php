@extends('layouts.index')

@section('pageTitle')
<h3>Tambah Pembayaran Piutang</h3>
@endsection

@section('pageOptions')
<a href={{ route('pelunasan-piutang.index')}} class="btn btn-primary">Kembali ke List Pembayaran Piutang</a>
@endsection

@section('content')
<div class="container">
  <div class="my-3">
    @include('pelunasanPiutang.form', ['formAction' => route('pelunasan-piutang.store')])
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
