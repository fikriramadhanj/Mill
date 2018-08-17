<form name="form1" id="form1" method="GET" action="">

<table border="1">
  <tr>
        <td align="center"> kode Barang </td>
        <td align="center"> Nama Barang </td>
        <td align="center"> Harga Barang </td>
        <td align="center"> Qty </td>
        <td align="center"> Sub Total </td>


  </tr>
  @if (isset($detilPenjualans))
  @foreach($detilPenjualans as $detilPenjualan)

    <tr>
          <td align="center"> {{$detilPenjualan->kode_barang}} </td>
          <td align="center"> {{$detilPenjualan->nama}} </td>
          <td align="center"> {{$detilPenjualan->harga_jual1}} </td>
          <td align="center"> {{$detilPenjualan->qty}} </td>
          <td align="center"> {{$detilPenjualan->sub_total}} </td>
          
    </tr>

  @endforeach
  @endif
</table>
</form>
