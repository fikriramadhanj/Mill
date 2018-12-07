
@section('content')
<h3 align="center">Laporan Pembelian</h3>
<h5 align="center">{{$tglAwal}} S/D {{$tglAkhir}}</h5>
<br> <br>
<form id="form-faktur-beli" method="GET" action="{{ $formAction }}">
<div class="container">
  <div class="form-group row">
    <label class="col-form-label col-md-2">Supplier</label>
    <div class="col-md-6">
      <select class="custom-select" name="supplierId" required>
        <option selected disabled>-- Pilih supplier --</option>
        @foreach($suppliers as $supplier)
          <option value="{{$supplier->id}}">{{$supplier->nama_supplier}} </option>
        @endforeach
      </select>
    </div>
  </div>

      <div class="form-group row">
      <label class="col-form-label col-md-2">Periode</label>
      <div class="col-md-3">
        <input type="text" name="tglAwal" class="form-control datepicker fj-tanggal-faktur" value="{{$tglAwal}}" required />
      </div> S/D
      <div class="col-md-3">
        <input type="text" name="tglAkhir" class="form-control datepicker fj-tanggal-faktur" value="{{$tglAkhir}}" required />
      </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-2">Status</label>
        <div class="text-center">
            <input type="radio"  name="status" value="all" checked="" <?php if($status=='all') echo 'checked';  ?>/>All </label> &nbsp
           <input type="radio"  name="status" value="Lunas" <?php if($status=='Lunas') echo 'checked';  ?>/>Lunas </label> &nbsp
           <input type="radio" name="status" value="Belum Lunas" <?php if($status=='Belum Lunas') echo 'checked';  ?>/>Belum Lunas </label> &nbsp
        <button type="submit"  class="btn btn-primary">proses</button>
      </div>
    </div>
</form>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>No Faktur Beli </th>
            <th>Nama Supplier </th>
            <th>Tanggal Faktur Beli </th>
            <th>Status </th>
            <th>total Faktur </th>

            <th colspan="3">Action </th>
          </tr>
        </thead>
        <tbody>

          @foreach($statuss as $status)
          <tr>
            <td align="center"> {{$status->no_fb}} </td>
            <td align="center"> {{$status->nama_supplier}} </td>
            <td align="center"> {{date('j F Y', strtotime($status->tgl_fb))}} </td>
            <td align="center"> {{$status->status}} </td>
            <td align="right"> Rp. {{number_format($status->total_faktur,2, ".", ",")}} </td>
            <td align="center"> <a href="{{ route('faktur-beli.show', ['id' => $status->id ])}}"> Detil Pembelian  </a></td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
