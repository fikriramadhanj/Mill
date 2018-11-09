@extends('layouts.index')


@section('pageOptions')
<a href={{ route('pelanggan.index')}} class="btn btn-primary">Kembali ke List Pelanggan</a>
@endsection

@section('content')
<h3 align="center">Tambah Pelanggan</h3>

<div class="container">
  <div class="my-3">
    @include('pelanggan.form', ['formAction' => route('pelanggan.store'), 'pelanggan' => ''])
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
  <!-- <script src="/js/app/pelanggan.js"></script> -->
@endsection
