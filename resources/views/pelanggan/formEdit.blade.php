@php
  $pelanggan_kode = !empty($pelanggan) ? $pelanggan->kode_pelanggan : '';
  $pelanggan_nama = !empty($pelanggan) ? $pelanggan->nama_pelanggan : '';
  $pelanggan_alamat = !empty($pelanggan) ? $pelanggan->alamat : '';
  $pelanggan_kota = !empty($pelanggan) ? $pelanggan->kota : '';
  $pelanggan_kode_pos = !empty($pelanggan) ? $pelanggan->kode_pos : '';
  $pelanggan_no_telp = !empty($pelanggan) ? $pelanggan->no_telp : '';
  $pelanggan_fax = !empty($pelanggan) ? $pelanggan->fax : '';
  $pelanggan_kontak_person = !empty($pelanggan) ? $pelanggan->kontak_person : '';
  $pelanggan_npwp = !empty($pelanggan) ? $pelanggan->npwp : '';
  $pelanggan_nppkp = !empty($pelanggan) ? $pelanggan->nppkp : '';
@endphp

<form name="form1" method="POST" action="{{ $formAction }}">
  @csrf
  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-title mb-0">Informasi Utama</div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kode Pelanggan</label>
            <div class="col-md-8">
              <input type="text" name="kode" class="form-control" required value="{{$pelanggan_kode}}" readonly="" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Nama Pelanggan</label>
            <div class="col-md-8">
              <input type="text" name="nama" class="form-control" required value="{{ $pelanggan_nama }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Alamat</label>
            <div class="col-md-8">
              <textarea name="alamat" class="form-control" required>{{ $pelanggan_alamat }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kota</label>
            <div class="col-md-8">
              <input type="text" name="kota" class="form-control" required value="{{ $pelanggan_kota }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kode Pos</label>
            <div class="col-md-8">
              <input type="text" name="kodePos" class="form-control" required value="{{ $pelanggan_kode_pos }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">No. Telepon</label>
            <div class="col-md-8">
              <input type="text" name="noTelp" class="form-control" required value="{{ $pelanggan_no_telp }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Fax</label>
            <div class="col-md-8">
              <input type="text" name="fax" class="form-control" required value="{{ $pelanggan_fax }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">Kontak Person</label>
            <div class="col-md-8">
              <input type="text" name="kontakPerson" class="form-control" required value="{{ $pelanggan_kontak_person }}" />
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
            <label class="col-form-label col-md-4">NPWP</label>
            <div class="col-md-8">
              <input type="text" name="npwp" class="form-control" required value="{{ $pelanggan_npwp }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-4">NPPKP</label>
            <div class="col-md-8">
              <input type="text" name="nppkp" class="form-control" required value="{{ $pelanggan_nppkp }}" />
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Simpan Data Pelanggan</button>
  </div>
</form>
