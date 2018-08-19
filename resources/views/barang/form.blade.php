@php
  $barang_kode = !empty($barang) ? $barang->kode_barang : '';
  $barang_tipe = !empty($barang) ? $barang->tipe_id : '';
  $barang_tglbeli = !empty($barang) ? date('Y-m-d', strtotime($barang->tgl_beli)) : date('Y-m-d');
  $barang_nama = !empty($barang) ? $barang->nama : '';
  $barang_berat = !empty($barang) ? $barang->berat : '';
  $barang_hargabeli = !empty($barang) ? $barang->harga_beli : '';
  $barang_hargajual = !empty($barang) ? $barang->harga_jual1 : '';
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
                  <input type="text" name="kode" class="form-control" required value="{{ $barang_kode }}" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Tipe Barang</label>
                <div class="col-md-8">
                  <select name="tipeBarang" class="custom-select">
                    <option selected disabled>-- Pilih Tipe Barang --</option>
                    @foreach($tipeBarangs as $tipeBarang)
                      <option value="{{$tipeBarang->id}}" {{ $tipeBarang->id == $barang_tipe ? 'selected' : ''}}>{{$tipeBarang->nama_tipe}} </option>
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
            <div class="col-lg-6"> 
              <div class="form-group row">
                <label class="col-form-label col-md-4">Nama Barang</label>
                <div class="col-md-8">
                  <input type="text" name="nama" class="form-control" required value="{{ $barang_nama }}" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Berat</label>
                <div class="col-md-8">
                  <div class="input-group">
                    <input type="number" name="berat" class="form-control" required value="{{ $barang_berat }}"  />
                    <div class="input-group-append">
                      <span class="input-group-text" >kg</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Qty</label>
                <div class="col-md-8">
                  <input type="number" name="qty" class="form-control" required value="{{ $barang_qty }}"  />
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
                    <input type="number" name="hargaJual1" class="form-control barang-harga-jual" required value="{{ $barang_hargajual }}"  />
                    <div class="input-group-append">
                      <span class="input-group-text" >IDR / kg</span>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="hargaJual2" value="" class="barang-harga-jual" value="{{ $barang_hargajual }}" />
                <input type="hidden" name="hargaJual3" value="" class="barang-harga-jual" value="{{ $barang_hargajual }}" />
                <input type="hidden" name="hargaJual4" value="" class="barang-harga-jual" value="{{ $barang_hargajual }}" />
                <input type="hidden" name="hargaJual5" value="" class="barang-harga-jual" value="{{ $barang_hargajual }}" />
              </div>
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
