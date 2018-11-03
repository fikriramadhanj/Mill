@extends('layouts.index')

@section('pageTitle')
<h3>Edit Penjualan </h3>
@endsection

@section('pageOptions')
<a href={{ route('faktur-jual.index')}} class="btn btn-primary">Kembali ke List Penjualan</a>
@endsection

@section('content')
<div class="container">
  <div class="my-3">
    @include('fakturJual.FormEdit', ['formAction' => route('faktur-jual.edit', ['id' => $fakturJual->id]) ,
                                                                                'fakturJual' => $fakturJual])

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
