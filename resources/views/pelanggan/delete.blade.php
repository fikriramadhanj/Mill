<form class="m-0" method="POST" action="{{ route('pelanggan.destroy', [ 'id' => $pelanggan->id ])}}">
  @csrf
  <button type="submit" class="btn btn-danger"> Delete </a>
</form>
