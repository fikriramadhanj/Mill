<form class="m-0" method="POST" action="{{ route('tipe-barang.destroy', ['id' => $tipeBarang->id ])}}">
  @csrf
  <button type="submit" class="btn btn-danger"> Delete </a>
</form>
