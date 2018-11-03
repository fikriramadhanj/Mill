@extends('layouts.index')

@section('pageTitle')
<h3>Edit Barang - {{ $update->nama }}</h3>
@endsection

@section('pageOptions')
<a href={{ route('barang.index')}} class="btn btn-primary">Kembali ke List Barang</a>
@endsection

@section('content')
<div class="container">
  <div class="my-3">
  @include('barang.formEdit', [ 'formAction' => route('barang.update', ['id' => $update->id]),
                                                                        'barang' => $update ])
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
