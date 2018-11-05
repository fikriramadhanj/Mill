
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
</form>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>Kode Barang </th>
            <th>Nama Barang </th>
            <th>Saldo Awal </th>
            <th>Masuk </th>
            <th>Keluar </th>
            <th>Saldo Akhir </th>

            <th colspan="3">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($stockKeluars as $stockKeluar)
          <tr>
                <td> {{ $stocKeluar->kode_barang }} </td>
                <td> {{  $stockKeluar->nama }}</td>
                <td> {{  $stockKeluar->qty }}  </td>
                <td>   </td>

                <td>    </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
