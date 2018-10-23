@extends('layouts.index')

@section('pageTitle')
<h3>Tambah Pembayaran Hutang</h3>
@endsection

@section('pageOptions')
<a href={{ route('pembayaran-hutang.index')}} class="btn btn-primary">Kembali ke List Pembayaran Hutang</a>
@endsection

@section('content')
<div class="container">
  <div class="my-3">
    @include('pembayaranHutang.form', ['formAction' => route('pembayaran-hutang.store')])
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
