@extends('layouts.index')

@section('content')
<div class="mt-4">
  <div class="row">
    <div class="col">
      <h3>Edit Penjualan</h3>
    </div>
  </div>
</div>
<div class="my-3">
  @include('fakturJual.form', ['formAction' => ''])
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
