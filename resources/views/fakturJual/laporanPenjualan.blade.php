
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
            <th>No Faktur Jual </th>
            <th>Nama Pelanggan </th>
            <th>Tanggal Faktur Jual </th>
            <th>total Faktur </th>

            <th colspan="3">Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($laporanPenjualans as $laporanPenjualan)
          <tr>
            <td align="center"> {{$laporanPenjualan->no_fj}} </td>
            <td align="center"> {{$laporanPenjualan->nama_pelanggan}} </td>
            <td align="center"> {{date('j F Y', strtotime($laporanPenjualan->tgl_fj))}} </td>
            <td align="center"> Rp. {{number_format($laporanPenjualan->total_faktur,2, ".", ",")}} </td>
            <td> <a href="{{ route('faktur-jual.show', ['id' => $laporanPenjualan->id ])}}"> Detil Penjualan  </a></td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
