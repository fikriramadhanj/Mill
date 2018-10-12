@php
  $tipeBarang_id = !empty($tipeBarangs) ? $tipeBarangs->id : '';
  $tipeBarang_nama = !empty($tipeBarangs) ? $tipeBarangs->nama_tipe : '';

@endphp

<form id="form-tipeBarang" method="POST" action="{{ $formAction }}">
  @csrf
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group row">
                <label class="col-form-label col-md-4">Id Tipe</label>
                <div class="col-md-8">
                  <input type="text" name="idTipe" class="form-control" required value="{{ $tipeBarang_id }}" />
                </div>
              </div>
              </div>
            </div>

            <div class="row">
            <div class="col-lg-6">
              <div class="form-group row">
                <label class="col-form-label col-md-4">Nama Tipe</label>
                <div class="col-md-8">
                  <input type="text" name="namaTipe" class="form-control" required value="{{ $tipeBarang_nama }}" />
                </div>
              </div>
            </div>
                </div>
              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan Tipe Barang</button>
      </div>
    </div>
  </div>
</form>
