<form name="form1" id="form1" method="get" action="/barang.store">

<table border="1">
      <tr>
          <td>Kode Barang </td>
          <td>:<input type="text" name="kode" id="kode"/></td>
      </tr>
      <tr>
          <td>Tipe Barang </td>
          <td>:<select name="tipeBarang" id="tipeBarang">
                @foreach($tipeBarangs as $tipeBarang)
                  <option value="{{$tipeBarang->id}}">{{$tipeBarang->nama_tipe}} </option>
                @endforeach

                </select>

          </td>
      </tr>
      <tr>
          <td>Tanggal Pembelian </td>
          <td>:<input type="text" name="tgl_beli" id="tgl_beli"/></td>
      </tr>
      <tr>
          <td>Nama Barang</td>
          <td>:<input type="text" name="nama" id="nama"/></td>
      </tr>
      <tr>
          <td>Berat </td>
          <td>:<input type="text" name="berat" id="berat"/>Kg</td>
      </tr>
      <tr>
          <td>Harga beli</td>
          <td>:<input type="text" name="hargaBeli" id="hargaBeli"/>Rp / Kg</td>
      </tr>
      <tr>
          <td>Harga Jual 1</td>
          <td>:<input type="text" name="hargaJual1" id="hargaJual1"/>Rp / Kg</td>
      </tr>
      <tr>
          <td>Harga Jual 2</td>
          <td>:<input type="text" name="hargaJual2" id="hargaJual2"/>Rp / Kg</td>
      </tr>
      <tr>
          <td>Harga Jual 3</td>
          <td>:<input type="text" name="hargaJual3" id="hargaJual3"/>Rp / Kg</td>
      </tr>
      <tr>
          <td>Harga Jual 4</td>
          <td>:<input type="text" name="hargaJual4" id="hargaJual4"/>Rp / Kg</td>
      </tr>
      <tr>
          <td>Harga Jual 5</td>
          <td>:<input type="text" name="hargaJual5" id="hargaJual5"/>Rp / Kg</td>
      </tr>
      <tr>
          <td>Qty </td>
          <td>:<input type="text" name="qty" id="qty"/></td>
      </tr>

    </table>
    <input type="submit" value="Save"/>
  </form>
