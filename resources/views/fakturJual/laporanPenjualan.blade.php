
@section('content')
<h3 align="center">Laporan Penjualan</h3>
<h5 align="center">{{$tglAwal}} S/D {{$tglAkhir}}</h5>
<br> <br>
<form id="form-faktur-jual" method="GET" action="{{ $formAction }}">
<div class="container">
  <div class="form-group row">
    <label class="col-form-label col-md-2">Pelanggan</label>
    <div class="col-md-6">
      <select class="custom-select" name="pelangganId" required>
        <option selected disabled>-- Pilih pelanggan --</option>
        @foreach($pelanggans as $pelanggan)
          <option value="{{$pelanggan->id}}">{{$pelanggan->nama_pelanggan}} </option>
        @endforeach
      </select>
    </div>
  </div>

      <div class="form-group row">
      <label class="col-form-label col-md-2">Periode</label>
      <div class="col-md-3">
        <input type="text" name="tglAwal" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
      </div> S/D
      <div class="col-md-3">
        <input type="text" name="tglAkhir" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
      </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-2">Status</label>
        <div class="text-center">
            <input type="radio"  name="status" value="all" checked="checked"/>All </label> &nbsp
           <input type="radio"  name="status" value="Lunas"/>Lunas </label> &nbsp
           <input type="radio" name="status" value="Belum Lunas"/>Belum Lunas </label> &nbsp
        <button type="submit"  class="btn btn-primary">proses</button>
      </div>
    </div>
</form>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Jual </th>
            <th>Nama Pelanggan </th>
            <th>Tanggal Faktur Jual </th>
            <th>Status </th>
            <th>total Faktur </th>

            <th colspan="3">Action </th>
          </tr>
        </thead>
        <tbody>

          @foreach($statuss as $status)
          <tr>
            <td align="center"> {{$status->no_fj}} </td>
            <td align="center"> {{$status->nama_pelanggan}} </td>
            <td align="center"> {{date('j F Y', strtotime($status->tgl_fj))}} </td>
            <td align="center"> {{$status->status}} </td>
            <td align="right"> Rp. {{number_format($status->total_faktur,2, ".", ",")}} </td>
            <td align="center"> <a href="{{ route('faktur-jual.show', ['id' => $status->id ])}}"> Detil Penjualan  </a></td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
