<form name="form1" id="form1" method="GET" action="/Supplier/FormAddSupplier">

<table border="1">

  <tr>
      <td align="center">Kode Supplier </td>
      <td align="center">Nama Supplier </td>
      <td align="center">Nama NPWP </td>
      <td align="center">Alamat </td>
      <td align="center">Kota </td>
      <td align="center">Kode Pos </td>
      <td align="center">No Telpon </td>
      <td align="center">Fax </td>
      <td align="center">Kontak Supplier</td>
      <td align="center">Limit Hutang </td>
      <td align="center">Tempo Bayar </td>
      <td align="center">NPWP </td>
      <td align="center">NPPKP </td>

      <td align="center" colspan="3">Action </td>


  </tr>

    @foreach ($suppliers as $supplier)

      <tr>
              <td align="center"> {{$supplier->kode_supplier}} </td>
              <td align="center"> {{$supplier->nama_supplier}} </td>
              <td align="center"> {{$supplier->nama_npwp}} </td>
              <td align="center"> {{$supplier->alamat}} </td>
              <td align="center"> {{$supplier->kota}} </td>
              <td align="center"> {{$supplier->kode_pos}} </td>
              <td align="center"> {{$supplier->no_telp}} </td>
              <td align="center"> {{$supplier->fax}} </td>
              <td align="center"> {{$supplier->kontak_person}} </td>
              <td align="center"> {{$supplier->limit_hutang}} </td>
              <td align="center"> {{$supplier->tempo_bayar}} </td>
              <td align="center"> {{$supplier->npwp}} </td>
              <td align="center"> {{$supplier->nppkp}} </td>


              <td align="center"><a href="/Supplier/FormUpdateSupplier/{{$supplier->id}}"> Update </a></td>
              <td align="center"><a href="/Supplier/ProsesDeleteSupplier/{{$supplier->id}}"> Delete </a></td>



      </tr>
      @endforeach
            </table>
          <td colspan="5" align="center"> <input type="submit" value="Tambah"/> </td>


</form>
