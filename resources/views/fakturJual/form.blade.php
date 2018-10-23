<form id="form-faktur-jual" method="POST" action="{{ $formAction }}">
  @csrf
  <div class="row">
    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-title mb-0">Informasi Umum</div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-form-label col-md-4">No. Faktur</label>
            <div class="col-md-8">
              <input type="text" name="noFJ" class="form-control" value="{{$noFJ}}" readonly=""required />
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
            <label class="col-form-label col-md-4">Tanggal Faktur</label>
            <div class="col-md-8">
              <input type="text" name="tglFJ" class="form-control datepicker fj-tanggal-faktur" value="{{ date('Y-m-d') }}" required />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-md-4">Keterangan</label>
            <div class="col-md-8">
              <textarea name="keterangan" class="form-control" required ></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">

      <div class="card mb-3 border-0">
        <div class="card-header border-top border-left border-right border-bottom-0 d-flex flex-row align-items-center justify-content-between">
          <div class="card-title mb-0">Detail Penjualan</div>
          <div class="card-options">
            <button type="button" class="btn btn-secondary fj-tambah-barang">Tambah Barang</button>
          </div>
        </div>
        <div class="card-body p-0 border-left-0">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">No.</th>
                <th scope="col">Pilih Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Qty</th>
                <th scope="col">Sub Total</th>
              </tr>
            </thead>
            <tbody id="fj-barang-list">
              <tr class="barang-row">
                <input type="hidden" name="detilJual[0][subTotal]" value="" class="barang-subtotal-input" />
                <td>
                  <button type="button" class="btn btn-danger btn-sm fj-hapus-barang" data-index="0">
                    Hapus
                  </button>
                </td>
                <td class="barang-index align-middle">1</td>
                <td class="barang-id">
                  <select name="detilJual[0][barangId]" class="custom-select select-barang" required>
                    <option selected disabled value="">-- Pilih barang --</option>
                    @foreach($barangs as $barang)
                      <option
                          value="{{$barang->id}}"
                          data-nama="{{$barang->nama}}"
                          data-harga="{{$barang->harga_jual1}}"
                          data-kode="{{$barang->kode_barang}}"
                      >{{$barang->nama}}</option>
                    @endforeach
                  </select>
                </td>
                <td class="barang-nama">-</td>
                <td class="barang-kode">-</td>
                <td class="barang-harga" align="right">
                  Rp. 0,00
                </td>
                <td class="barang-qty"><input type="number" name="detilJual[0][qty]" min="1" value="1" class="form-control barang-qty-input" required /> </td>
                <td class="barang-subtotal" align="right">
                  Rp. 0,00
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6" align="right">Total</td>
                <td id="faktur-jual-total-qty" align="right">0</td>
                <td id="faktur-jual-total-subTotal" align="right">Rp. 0,00</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Simpan Faktur Jual</button>
  </div>
</form>
