@php
  $barang_kode = !empty($barang) ? $barang->kode_barang : '';
  $barang_tipe = !empty($barang) ? $barang->tipe_id : '';
  $barang_tglbeli = !empty($barang) ? date('Y-m-d', strtotime($barang->tgl_beli)) : date('Y-m-d');
  $barang_nama = !empty($barang) ? $barang->nama : '';
  $barang_hargabeli = !empty($barang) ? $barang->harga_beli : '';
  $barang_hargajual1 = !empty($barang) ? $barang->harga_jual1 : '';
  $barang_hargajual2 = !empty($barang) ? $barang->harga_jual2 : '';
  $barang_hargajual3 = !empty($barang) ? $barang->harga_jual3 : '';
  $barang_hargajual4 = !empty($barang) ? $barang->harga_jual4 : '';
  $barang_hargajual5 = !empty($barang) ? $barang->harga_jual5 : '';

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
                  <input type="text" name="kode" class="form-control" required value="{{$barang_kode}}" readonly="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-md-4">Tipe Barang</label>
                <div class="col-md-8">
                  <select name="tipeBarang" class="custom-select">
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
                <label class="col-form-label col-md-4">Harga Jual 1</label>
                <div class="col-md-8">
                  <div class="input-group">
                    <input type="number" name="hargaJual1" class="form-control" required value="{{ $barang_hargajual1 }}"  />
                    <div class="input-group-append">
                      <span class="input-group-text" >IDR / kg</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                  <label class="col-form-label col-md-4">Harga Jual 2</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <input type="number" name="hargaJual2" class="form-control" required value="{{ $barang_hargajual2 }}"  />
                      <div class="input-group-append">
                        <span class="input-group-text" >IDR / kg</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-4">Harga Jual 3</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <input type="number" name="hargaJual3" class="form-control" required value="{{ $barang_hargajual3 }}"  />
                        <div class="input-group-append">
                          <span class="input-group-text" >IDR / kg</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-form-label col-md-4">Harga Jual 4</label>
                  <div class="col-md-8">
                    <div class="input-group">
                      <input type="number" name="hargaJual4" class="form-control" required value="{{ $barang_hargajual4 }}"  />
                      <div class="input-group-append">
                        <span class="input-group-text" >IDR / kg</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                <label class="col-form-label col-md-4">Harga Jual 5</label>
                <div class="col-md-8">
                  <div class="input-group">
                    <input type="number" name="hargaJual5" class="form-control" required value="{{ $barang_hargajual5 }}"  />
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
