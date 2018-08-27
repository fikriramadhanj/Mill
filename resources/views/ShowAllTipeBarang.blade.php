<form name="showAllBarang" method='get' action='/TipeBarang/FormAddTipeBarang'>
<table border="1">

    <tr>
          <td> Id Tipe </td>
          <td> Nama Tipe </td>
          <td colspan="2"> Action </td>
    </tr>
    @foreach($tipeBarangs as $tipeBarang)
    <tr>
          <td> {{$tipeBarang->id}} </td>
          <td>{{$tipeBarang->nama_tipe}} </td>
          <td> <a href="/TipeBarang/FormUpdateTipeBarang/{{$tipeBarang->id}}">Update </a></td>
          <td> <a href="/TipeBarang/DeleteTipeBarang/{{$tipeBarang->id}}">Delete </a></td>
    </tr>
    @endforeach
</table>
  <input type="submit" value="Tambah"/>
</form>
