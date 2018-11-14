@php
  $barang_kode = !empty($barang) ? $barang->kode_barang : '';
  $barang_tipe = !empty($barang) ? $barang->tipe_id : '';
  $barang_tglbeli = !empty($barang) ? date('Y-m-d', strtotime($barang->tgl_beli)) : date('Y-m-d');
  $barang_nama = !empty($barang) ? $barang->nama : '';
  $barang_berat = !empty($barang) ? $barang->berat : '';
  $barang_hargabeli = !empty($barang) ? $barang->harga_beli : '';
  $barang_hargajual = !empty($barang) ? $barang->harga_jual : '';
  $barang_min_stok = !empty($barang) ? $barang->min_stok : '';
  $barang_maks_stok = !empty($barang) ? $barang->maks_stok : '';
  $barang_qty = !empty($barang) ? $barang->qty : '';

@endphp

<form id="form-barang" method="POST" action="{{ $formAction }}">
  @csrf
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group row">
                <label class="col-form-label col-md-4">Kode Barang</label>
                <div class="col-md-8">
                  <input type="text" name="kode" class="form-control" required value="{{ $idBarang }}" readonly="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Tipe Barang</label>
                <div class="col-md-8">
                  <select name="tipeId" class="custom-select">
                    <option selected disabled>-- Pilih Tipe Barang --</option>
                    @foreach($tipeBarangs as $tipeBarang)
                      <option value="{{$tipeBarang->id}}">{{$tipeBarang->nama_tipe}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Tanggal Pembelian</label>
                <div class="col-md-8">
                  <input type="text" name="tgl_beli" class="form-control datepicker" required value="{{ $barang_tglbeli }}" />
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group row">
                <label class="col-form-label col-md-4">Nama Barang</label>
                <div class="col-md-8">
                  <input type="text" name="nama" class="form-control" required value="{{ $barang_nama }}" />
                  <div class="input-group-append">
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-8">
              <div class="form-group row">
                <label class="col-form-label col-md-4">Min Stok</label>
                <div class="col-md-8">
                  <input type="number" name="minStok" class="form-control" required value="{{ $barang_min_stok}}"  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Maks Stok</label>
                <div class="col-md-8">
                  <input type="number" name="maksStok" class="form-control" required value="{{ $barang_maks_stok }}"  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Harga Beli</label>
                <div class="col-md-8">
                  <div class="input-group">
                    <input type="number" name="hargaBeli" class="form-control" required value="{{ $barang_hargabeli }}"  />
                    <div class="input-group-append">
                      <span class="input-group-text" >IDR / kg</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Harga Jual</label>
                <div class="col-md-8">
                  <div class="input-group">
                    <input type="number" name="hargaJual" class="form-control" required value="{{ $barang_hargajual }}"  />
                    <div class="input-group-append">
                      <span class="input-group-text" >IDR / kg</span>
                    </div>
                  </div>
                </div>
              </div>


      <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan Barang</button>
      </div>
    </div>
  </div>
</form>
