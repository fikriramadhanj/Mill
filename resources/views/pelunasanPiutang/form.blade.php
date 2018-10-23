<form id="form-pelunasan-piutang" method="POST" action="{{ $formAction }}">
  @csrf
  <div class="row">
    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-title mb-0">Informasi Umum</div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-form-label col-md-4">No. Pembayaran</label>
            <div class="col-md-8">
              <input type="text" name="noBayar" class="form-control" value="{{$noBayar}}" readonly=""required />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-md-4">Faktur Jual</label>
            <div class="col-md-8">
              <select class="custom-select" name="fjId" required>
                <option selected disabled>-- Pilih Faktur Jual --</option>
                @foreach($fakturJuals as $fakturJual)
                  <option value="{{$fakturJual->id}}">{{$fakturJual->no_fj}} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Pelanggan</label>
            <div class="col-md-8">
              <select class="custom-select" name="pelangganId" required>
                <option selected disabled>-- Pilih pelanggan --</option>
                @foreach($pelanggans as $pelanggan)
                  <option value="{{$pelanggan->id}}">{{$pelanggan->nama_pelanggan}} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Tanggal Pembayaran</label>
            <div class="col-md-8">
              <input type="text" name="tglBayar" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Tanggal Jatuh Tempo</label>
            <div class="col-md-8">
              <input type="text" name="tglJatuhTempo" class="form-control datepicker fj-tanggal-jatuh-tempo" value="{{ date('Y-m-d') }}" required />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Tempo Pembayaran</label>
            <div class="col-md-8">
              <div class="input-group">
                <input type="number" name="tempoBayar" class="form-control" min="0" value="0" readonly id="fj-tempo-bayar" required />
                <div class="input-group-append">
                  <span class="input-group-text" >Hari</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Total Pembayaran</label>
            <div class="col-md-8">
              <input type="text" name="totalBayar" class="form-control" required />
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Simpan Pembayaran Piutang</button>
  </div>
</form>
