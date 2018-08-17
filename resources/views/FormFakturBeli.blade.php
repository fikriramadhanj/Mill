<form name="form1" id="form1" method="get" action="/barang/ProsesAddBarang">

<table border="1">

      <tr>
          <td>No Faktur </td>
          <td>:<input type="text" name="noFb" id="noFb"/></td>
      </tr>
      <tr>
          <td>Tgl Faktur  </td>
          <td>:<input type="text" name="tglFb" id="tglFb" /></td>
      </tr>
      <tr>
          <td>Tempo Bayar </td>
          <td>:<input type="text" name="tempoBayar" id="tempoBayar"/></td>
      </tr>
      <tr>
          <td>Kode Supplier </td>
          <td>:<select name="supplierId" id="supplierId">
                @foreach($suppliers as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->nama_supplier}} </option>
                @endforeach

                </select>
          </td>

      </tr>
      <tr>
          <td>Sub Total</td>
          <td>:<input type="text" name="nama" id="nama"/></td>
      </tr>
      <tr>
          <td>Total Faktur </td>
          <td>:<input type="text" name="totalFaktur" id="totalFaktur"/>Kg</td>
      </tr>
      <tr>
          <td>No Pajak </td>
          <td>:<input type="text" name="noPajak" id="noPajak"/>Kg</td>
      </tr>
      <tr>
          <td>Keterangan </td>
          <td>:<input type="text" name="keterangan" id="keterangan"/></td>
      </tr>

    </table>
    <input type="submit" value="Save"/>
  </form>
