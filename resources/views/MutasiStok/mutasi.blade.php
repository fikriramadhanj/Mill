@extends('layouts.index')

@section('pageTitle')
<h3>Mutasi Stok</h3>
@endsection


@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <div class="form-group row">
      <label class="col-form-label col-md-4">Periode</label>
      <div class="col-md-8">
        <input type="text" name="tglAwal" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
      </div>
    </div>
    <div class="form-group row">
    <label class="col-form-label col-md-4">S/D</label>
    <div class="col-md-8">
      <input type="text" name="tglAkhir" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
    </div>
  </div>
      <div class="table-responsive">
        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>Kode Barang </th>
              <th>Nama Barang </th>
              <th>Saldo Awal </th>
              <th>Masuk </th>
              <th>Keluar </th>
              <th>Saldo Akhir </th>

            </tr>
          </thead>
          <tbody>
            @foreach($stocks as $stock)

            <tr>
                  <td> {{ $stock->kode_barang }} </td>
                  <td> {{  $stock->nama }}</td>
                  <td>   </td>
                  <td>   </td>
                  <td> {{ $stock->qty }} </td>
                  <td>           </td>


            </tr>


          </tbody>
          @endforeach
        </table>
      </div>
    </div>
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
