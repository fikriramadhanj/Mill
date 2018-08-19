<form class="m-0" method="POST" action="{{ route('supplier.destroy', [ 'id' => $supplier->id ])}}">
  @csrf
  <button type="submit" class="btn btn-danger"> Delete </a>
</form>
