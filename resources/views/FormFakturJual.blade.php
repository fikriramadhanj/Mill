
<SCRIPT language=Javascript>

function isNumberKey(evt)
//Membuat validasi hanya untuk input angka menggunakan kode javascript
{
       var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
}

          function subtotal(qty)
          {
                  var hitung = (document.getElementById('hargaJual').value * document.getElementById('qty').value);
                  document.forms.form1.subTotal.value = hitung;
          }


</script>



<form name="form1" id="form1" method="get" action="/FakturJual/ProsesAddFakturJual">
<br> <br>
<table border="1" align="center">


      <tr>
          <td>No Faktur </td>
          <td>:<input type="text" name="noFJ" id="noFJ" value=""/></td>
      </tr>
      <tr>
          <td>Tgl Faktur  </td>
          <td>:<input type="text" name="tglFJ" id="tglFJ"/></td>
      </tr>

      <tr>
          <td>Tempo Pembayaran</td>
          <td>:<input type="text" name="tempoBayar" id="tempoBayar"/> Hari</td>
      </tr>
      <tr>
          <td>Tanggal Jatuh Tempo </td>
          <td>:<input type="text" name="tglJatuhTempo" id="tglJatuhTempo"/></td>
      </tr>
      <tr>
          <td>Nama Pelanggan </td>
          <td>:<select name="pelangganId" id="pelangganId">
                @foreach($pelanggans as $pelanggan)
                  <option value="{{$pelanggan->id}}">{{$pelanggan->nama_pelanggan}} </option>
                @endforeach

                </select>
          </td>
      </tr>
      <tr>
          <td>Nama barang  </td>
          <td>:<select name="barangId" id="barangId"/>
                @foreach($barangs as $barang)
                  <option value="{{$barang->id}}">{{$barang->nama}} - {{$barang->harga_jual1}} </option>
                @endforeach

                </select>
          </td>

      </tr>
      <tr>
          <td>Harga Barang </td>
          <td>:<input type="text" name="hargaJual" id="hargaJual"/></td>
      </tr>

      <tr>
          <td>Qty </td>
          <td>:<input type="text" name="qty" id="qty" onkeyup="subtotal(this.value,getElementById('qty').value );" onkeypress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
          <td> Sub Total </td>
          <td>:<input type="text" name="subTotal" id="subTotal" readonly="readonly"/>
          </td>
      </tr>
      <tr>
          <td>Keterangan </td>
          <td>:<input type="text" name="keterangan" id="keterangan"/></td>
      </tr>
    </table>
    <br>
    <center><input type="submit" name="process" value="Add"/><input type="submit" name="process" value="Save"/> </center>

    <br> <br>
    <table border="1" align="center">

    <tr>
          <td align="center"> kode Barang </td>
          <td align="center"> Nama Barang </td>
          <td align="center"> Qty </td>
          <td align="center"> Sub Total </td>

    </tr>

    @if(isset($detilPenjualans))
          @foreach($detilPenjualans as $detilJual)
          <tr>
              <td><input type="text" name="$detilJual[0]['kode_barang']"/></td>
              <td><input type="text" name="$detilJual[0]['nama_barang']"/></td>
              <td><input type="text" name="$detilJual[0]['qty']"/> </td>
              <td><input type="text" name="$detilJual[0]['sub_total']"/> </td>
          </tr>
          @endforeach
    @endif

  </table>
  </form>
