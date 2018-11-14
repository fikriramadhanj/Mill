<form class="m-0" method="POST" action="{{ route('faktur-beli.destroy', [ 'id' => $fakturBeli->id ])}}">
  @csrf
  <button type="submit" class="btn btn-danger"> Delete </a>
</form>
