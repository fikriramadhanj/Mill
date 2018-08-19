<form name="form1" id="form1" method="get" action="/barang.edit/{{$update->id}">

<table border="1">
      <tr>
          <td>Kode Barang </td>
          <td>:<input type="text" name="kode" id="kode" value="{{$update->kode_barang}}"/></td>
      </tr>
      <tr>
          <td>Id Tipe </td>
          <td>:<input type="text" name="idTipe" id="idTipe" value="{{$update->id_tipe}}"/></td>
      </tr>
      <tr>
          <td>Tanggal Pembelian </td>
          <td>:<input type="text" name="tgl_beli" id="tgl_beli" value="{{$update->tgl_beli}}"/></td>
      </tr>
      <tr>
          <td>Nama Barang</td>
          <td>:<input type="text" name="nama" id="nama" value="{{$update->nama}}"/></td>
      </tr>

      <tr>
          <td>Berat </td>
          <td>:<input type="text" name="berat" id="berat" value="{{$update->berat}}"/>Kg</td>
      </tr>
      <tr>
          <td>Harga beli</td>
          <td>:<input type="text" name="hargaBeli" id="hargaBeli" value="{{$update->harga_beli}}"/></td>
      </tr>
      <tr>
          <td>Harga Jual 1</td>
          <td>:<input type="text" name="hargaJual1" id="hargaJual1" value="{{$update->harga_jual1}}"/></td>
      </tr>
      <tr>
          <td>Harga Jual 2</td>
          <td>:<input type="text" name="hargaJual2" id="hargaJual2" value="{{$update->harga_jual2}}"/></td>
      </tr>
      <tr>
          <td>Harga Jual 3</td>
          <td>:<input type="text" name="hargaJual3" id="hargaJual3" value="{{$update->harga_jual3}}"/></td>
      </tr>
      <tr>
          <td>Harga Jual 4</td>
          <td>:<input type="text" name="hargaJual4" id="hargaJual4" value="{{$update->harga_jual4}}"/></td>
      </tr>
      <tr>
          <td>Harga Jual 5</td>
          <td>:<input type="text" name="hargaJual5" id="hargaJual5" value="{{$update->harga_jual5}}"/></td>
      </tr>

      <tr>
          <td>Qty </td>
          <td>:<input type="text" name="qty" id="qty" value="{{$update->qty}}"/></td>
      </tr>

    </table>
    <input type="submit" value="Update"/>
  </form>
