<form name="form1" id="form1" method="GET" action="/barang/formAddBarang">

<table border="1">

  <tr>
      <td align="center">Tanggal Pembelian </td>
      <td align="center">Kode Barang </td>
      <td align="center">Nama Barang </td>
      <td align="center">Berat (Kg) </td>
      <td align="center">Harga Beli </td>
      <td align="center">Harga Jual 1 </td>
      <td align="center">Harga Jual 2 </td>
      <td align="center">Harga Jual 3 </td>
      <td align="center">Harga Jual 4 </td>
      <td align="center">Harga Jual 5 </td>
      <td align="center">Qty </td>
      <td align="center" colspan="3">Action </td>


  </tr>

    @foreach ($barangs as $barang)

      <tr>
              <td align="center"> {{$barang->tgl_beli}} </td>
              <td align="center"> {{$barang->kode_barang}} </td>
              <td align="center"> {{$barang->nama}} </td>
              <td align="center"> {{$barang->berat}} </td>
              <td align="center"> {{$barang->harga_beli}} </td>
              <td align="center"> {{$barang->harga_jual1}} </td>
              <td align="center"> {{$barang->harga_jual2}} </td>
              <td align="center"> {{$barang->harga_jual3}} </td>
              <td align="center"> {{$barang->harga_jual4}} </td>
              <td align="center"> {{$barang->harga_jual5}} </td>
              <td align="center"> {{$barang->qty}} </td>
              <td align="center"><a href="/barang/formUpdateBarang/{{$barang->id}}"> Update </a></td>
              <td align="center"><a href="/barang/ProsesDeleteBarang/{{$barang->id}}"> Delete </a></td>



      </tr>
      @endforeach
            </table>
          <td colspan="5" align="center"> <input type="submit" value="Tambah"/> </td>


</form>
