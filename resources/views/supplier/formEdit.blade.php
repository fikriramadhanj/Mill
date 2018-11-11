@php
  $supplier_kode = !empty($supplier) ? $supplier->kode_supplier : '';
  $supplier_nama = !empty($supplier) ? $supplier->nama_supplier : '';
  $supplier_nama_npwp = !empty($supplier) ? $supplier->nama_npwp : '';
  $supplier_alamat = !empty($supplier) ? $supplier->alamat : '';
  $supplier_kota = !empty($supplier) ? $supplier->kota : '';
  $supplier_kode_pos = !empty($supplier) ? $supplier->kode_pos : '';
  $supplier_no_telp = !empty($supplier) ? $supplier->no_telp : '';
  $supplier_fax = !empty($supplier) ? $supplier->fax : '';
  $supplier_kontak_person = !empty($supplier) ? $supplier->kontak_person : '';
  $supplier_tempo_bayar = !empty($supplier) ? $supplier->tempo_bayar : '';
  $supplier_limit_hutang = !empty($supplier) ? $supplier->limit_hutang : '';
  $supplier_npwp = !empty($supplier) ? $supplier->npwp : '';
  $supplier_nppkp = !empty($supplier) ? $supplier->nppkp : '';
@endphp

<form name="form1" method="POST" action={{ $formAction }}>
  @csrf
  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-title mb-0">Informasi Utama</div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kode Supplier</label>
            <div class="col-md-8">
              <input type="text" name="kode" class="form-control" required value="{{ $supplier_kode }}" readonly="" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Nama Supplier</label>
            <div class="col-md-8">
              <input type="text" name="nama" class="form-control" required value="{{ $supplier_nama }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Alamat</label>
            <div class="col-md-8">
              <textarea name="alamat" class="form-control" required>{{ $supplier_alamat }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kota</label>
            <div class="col-md-8">
              <input type="text" name="kota" class="form-control" required value="{{ $supplier_kota }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kode Pos</label>
            <div class="col-md-8">
              <input type="text" name="kodePos" class="form-control" required value="{{ $supplier_kode_pos }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">No. Telepon</label>
            <div class="col-md-8">
              <input type="text" name="noTelp" class="form-control" required value="{{ $supplier_no_telp }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Fax</label>
            <div class="col-md-8">
              <input type="text" name="fax" class="form-control" required value="{{ $supplier_fax }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kontak Person</label>
            <div class="col-md-8">
              <input type="text" name="kontakPerson" class="form-control" required value="{{ $supplier_kontak_person }}" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-title mb-0">Informasi Lainnya</div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-form-label col-md-4">Nama NPWP</label>
            <div class="col-md-8">
              <input type="text" name="namaNpwp" class="form-control" required value="{{ $supplier_nama_npwp }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">NPWP</label>
            <div class="col-md-8">
              <input type="text" name="npwp" class="form-control" required value="{{ $supplier_npwp }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">NPPKP</label>
            <div class="col-md-8">
              <input type="text" name="nppkp" class="form-control" required value="{{ $supplier_nppkp }}" />
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Simpan Data Supplier</button>
  </div>
</form>
