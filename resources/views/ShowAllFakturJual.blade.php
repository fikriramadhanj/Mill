<form name="form1" id="form1" method="GET" action="/FakturJual/FormAddFakturJual">

<table border="1">

  <tr>
      <td align="center">No Faktur Jual </td>
      <td align="center">Tanggal Faktur Jual </td>
      <td align="center">Tempo Bayar </td>
      <td align="center">Nama Pelanggan </td>
      <td align="center">Tanggal Jatuh Tempo </td>
      <td align="center">keterangan </td>
      <td align="center" colspan="3">Action </td>

  </tr>

  @foreach($fakturJuals as $fakturJual)

        <tr>
              <td  align="center"> {{$fakturJual->no_fj}} </td>
              <td  align="center"> {{$fakturJual->tgl_fj}} </td>
              <td  align="center"> {{$fakturJual->tempo_bayar}} </td>
              <td  align="center"> {{$fakturJual->nama_pelanggan}} </td>
              <td  align="center"> {{$fakturJual->tgl_jatuh_tempo}} </td>
              <td  align="center"> {{$fakturJual->keterangan}} </td>
              <td  align="center"> <a href="/FakturJual/ShowDetilPenjualan/{{$fakturJual->id}}"> Detil Penjualan  </a></td>

        </tr>
    @endforeach

</table>
<br> <br>
<table border="1">

</table>
          <td colspan="5" align="center"> <input type="submit" value="Tambah"/> </td>


</form>
