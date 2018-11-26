@extends('layouts.index')



@section('content')
<h3 align="center"> Form Saldo Barang </h3>
<div class="container">
  <div class="my-3">
  @include('barang.editSaldo', [ 'formAction' => route('barang.update-saldo',['id' => $update->id]),
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
