<form name="form1" id="form1" method="get" action="/Pelanggan/ProsesUpdatePelanggan/{{$update->id}}">

<table border="1">
      <tr>
          <td>Kode Pelanggan </td>
          <td>:<input type="text" name="kode" id="kode" value="{{$update->kode_pelanggan}}"/></td>
      </tr>
      <tr>
          <td>Nama Pelanggan </td>
          <td>:<input type="text" name="nama" id="nama" value="{{$update->nama_pelanggan}}"/></td>
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
          <td> Default Tempo</td>
          <td>:<input type="text" name="defaultTempo" id="defaultTempo" value="{{$update->default_tempo}}"/></td>
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
