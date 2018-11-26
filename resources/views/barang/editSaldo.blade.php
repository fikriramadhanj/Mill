

<form id="form-saldo-barang" method="POST" action="{{ $formAction }}">
  @csrf
  <div class="row">
    <div class="col-lg-10">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="col-md-8">
              <div class="form-group row">
                <label class="col-form-label col-md-6">Kode Barang</label>
                <div class="col-md-8">
                  <input type="text" name="kodeBarang" class="form-control" value="{{$saldoAwal->kode_barang}}"readonly=""/>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group row">
                <label class="col-form-label col-md-7">Bulan</label>
                <div class="col-md-8">
                  <input type="text" name="bulan" class="form-control" value="{{ $saldoAwal->bulan }}"readonly="" />
                  <div class="input-group-append">
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-8">
              <div class="form-group row">
                <label class="col-form-label col-md-7">Tahun</label>
                <div class="col-md-8">
                  <input type="number" name="tahun" class="form-control"  value="{{ $saldoAwal->tahun}}" readonly="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-7">Qty</label>
                <div class="col-md-8">
                  <input type="number" name="qty" class="form-control" value="{{ $saldoAwal->qty}}"  />
                </div>
              </div>


      <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan Saldo</button>
      </div>
    </div>
  </div>
</form>
