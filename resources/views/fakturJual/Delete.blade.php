<form class="m-0" method="POST" action="{{ route('faktur-jual.destroy', [ 'id' => $fakturJual->id ])}}">
  @csrf
  <button type="submit" class="btn btn-danger"> Delete </a>
</form>
