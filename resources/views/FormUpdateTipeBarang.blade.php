    <form name="updateForm" method="get" action="/TipeBarang/UpdateTipeBarang/{{$update->id}}">
    <table border = "1">

      <tr>
          <td>Id Tipe  </td>
          <td>:<input type="text" name="idTipe" id="idTipe" value="{{$update->id}}"> </td>
      </tr>
      <tr>
          <td>Nama Tipe  </td>
          <td>:<input type="text" name="namaTipe" id="namaTipe" value="{{$update->nama_tipe}}"> </td>
      </tr>
    </table>
    <input type="submit" value="Update"/>

  </form>
