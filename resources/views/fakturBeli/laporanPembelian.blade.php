

@section('content')
<form id="form-faktur-jual" method="GET" action="{{ $formAction }}">
<div class="container">
  <div class="row">
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
  <div class="text-center">
    <button type="submit" class="btn btn-primary">proses</button>
  </div>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Beli </th>
            <th>Nama Supplier </th>
            <th>Tanggal Faktur Beli </th>
            <th>total Faktur </th>

          </tr>
        </thead>
        <tbody>
          @foreach($laporanPembelians as $laporanPembelian)
          <tr>
            <td align="center"> {{$laporanPembelian->no_fb}} </td>
            <td align="center"> {{$laporanPembelian->nama_supplier}} </td>
            <td align="center"> {{date('j F Y', strtotime($laporanPembelian->tgl_fb))}} </td>
            <td align="center"> Rp. {{number_format($laporanPembelian->total_faktur,2, ".", ",")}} </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  <script src="/js/bootstrap-datepicker.min.js"></script>
  <script src="/js/moment.min.js"></script>
  <script src="/js/numeral.min.js"></script>
  <script src="/js/numeral-config.js"></script>
  <script src="/js/app/faktur-beli.js"></script>
@endsection
