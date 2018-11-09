
@section('content')
<h3 align="center">Laporan Mutasi Stock</h3>
<h5 align="center">{{$tglAwal}} S/D {{$tglAkhir}}</h5>
<form id="form-faktur-jual" method="GET" action="{{ $formAction }}"></br>
<div class="container">
  <div class="row">
      <div class="form-group row">
      <label class="col-form-label col-md-4">Periode</label>
      <div class="col-md-8">
        <input type="text" name="tglAwal" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
      </div>
    </div>
    <div class="form-group row">
    <label class="col-form-label col-md-4 center">S/D</label>
    <div class="col-md-8">
      <input type="text" name="tglAkhir" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">proses</button>
  </div>
  <div class="text-center">

     </div>
</form>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th align="center">Kode Barang </th>
            <th align="center">Nama Barang </th>
            <th align="center">Saldo Awal </th>
            <th align="center">Masuk </th>
            <th align="center">Keluar </th>
            <th align="center">Saldo Akhir </th>

          </tr>
        </thead>
        <tbody>
          @foreach($stocks as $stock)
          <tr>
                <td align="center"> {{ $stock->kode_barang }} </td>
                <td align="center"> {{  $stock->nama }}</td>
                <td align="center">  {{ 0 }} </td>
                <td align="center">  {{ $stock->masuk }} </td>
                <td align="center"> {{  $stock->keluar }} </td>
                <td align="center">  {{  0 }} </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
