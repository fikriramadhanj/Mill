<form name="form1" id="form1" method="GET" action="/Pelanggan/FormAddPelanggan">

<table border="1">

  <tr>
      <td align="center">Kode Pelanggan </td>
      <td align="center">Nama Pelanggan </td>
      <td align="center">Alamat </td>
      <td align="center">Kota </td>
      <td align="center">Kode Pos </td>
      <td align="center">No Telpon </td>
      <td align="center">Fax </td>
      <td align="center">Kontak Supplier</td>
      <td align="center">Limit Hutang </td>
      <td align="center">Default Tempo </td>
      <td align="center">NPWP </td>
      <td align="center">NPPKP </td>

      <td align="center" colspan="3">Action </td>


  </tr>

    @foreach ($pelanggans as $pelanggan)

      <tr>
              <td align="center"> {{$pelanggan->kode_pelanggan}} </td>
              <td align="center"> {{$pelanggan->nama_pelanggan}} </td>
              <td align="center"> {{$pelanggan->alamat}} </td>
              <td align="center"> {{$pelanggan->kota}} </td>
              <td align="center"> {{$pelanggan->kode_pos}} </td>
              <td align="center"> {{$pelanggan->no_telp}} </td>
              <td align="center"> {{$pelanggan->fax}} </td>
              <td align="center"> {{$pelanggan->kontak_person}} </td>
              <td align="center"> {{$pelanggan->limit_hutang}} </td>
              <td align="center"> {{$pelanggan->default_tempo}} </td>
              <td align="center"> {{$pelanggan->npwp}} </td>
              <td align="center"> {{$pelanggan->nppkp}} </td>


              <td align="center"><a href="/Pelanggan/FormUpdatePelanggan/{{$pelanggan->id}}"> Update </a></td>
              <td align="center"><a href="/Pelanggan/ProsesDeletePelanggan/{{$pelanggan->id}}"> Delete </a></td>



      </tr>
      @endforeach
            </table>
          <td colspan="5" align="center"> <input type="submit" value="Tambah"/> </td>


</form>
