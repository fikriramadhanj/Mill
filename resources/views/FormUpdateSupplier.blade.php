<form name="form1" id="form1" method="get" action="/Supplier/ProsesUpdateSupplier/{{$update->id}}">

<table border="1">
      <tr>
          <td>Kode Supplier </td>
          <td>:<input type="text" name="kode" id="kode" value="{{$update->kode_supplier}}"/></td>
      </tr>
      <tr>
          <td>Nama Supplier </td>
          <td>:<input type="text" name="nama" id="nama" value="{{$update->nama_supplier}}"/></td>
      </tr>
      <tr>
          <td>Nama NPWP</td>
          <td>:<input type="text" name="namaNpwp" id="namaNpwp" value="{{$update->nama_npwp}}"/></td>
      </tr>
      <tr>
          <td>Alamat </td>
          <td>:<input type="text" name="alamat" id="alamat" value="{{$update->alamat}}"/></td>
      </tr>
      <tr>
          <td>Kota </td>
          <td>:<input type="text" name="kota" id="kota" value="{{$update->kota}}"/>Kg</td>
      </tr>
      <tr>
          <td>Kode Pos</td>
          <td>:<input type="text" name="kodePos" id="kodePos" value="{{$update->kode_pos}}"/></td>
      </tr>
      <tr>
          <td>No Telpon</td>
          <td>:<input type="text" name="noTelp" id="noTelp" value="{{$update->no_telp}}"/></td>
      </tr>
      <tr>
          <td>Fax</td>
          <td>:<input type="text" name="fax" id="fax" value="{{$update->fax}}"/></td>
      </tr>
      <tr>
          <td>Kontak Person</td>
          <td>:<input type="text" name="kontakPerson" id="kontakPerson" value="{{$update->kontak_person}}"/></td>
      </tr>
      <tr>
          <td>Limit Hutang</td>
          <td>:<input type="text" name="limitHutang" id="limitHutang" value="{{$update->limit_hutang}}"/></td>
      </tr>
      <tr>
          <td>Tempo Bayar</td>
          <td>:<input type="text" name="tempoBayar" id="tempoBayar" value="{{$update->tempo_bayar}}"/></td>
      </tr>

      <tr>
          <td>NPWP </td>
          <td>:<input type="text" name="npwp" id="npwp" value="{{$update->npwp}}"/></td>
      </tr>
      <tr>
          <td>NPPKP </td>
          <td>:<input type="text" name="nppkp" id="nppkp" value="{{$update->nppkp}}"/></td>
      </tr>

    </table>
    <input type="submit" value="Update"/>
  </form>
