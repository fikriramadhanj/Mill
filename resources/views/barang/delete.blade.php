<form class="m-0" method="POST" action="{{ route('barang.destroy', [ 'id' => $barang->id ])}}">
  @csrf
  <button type="submit" class="btn btn-danger"> Delete </a>
</form>
