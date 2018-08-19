<form name="form1" id="form1" method="get" action="/FakturJual/ProsesAddFakturJual">
    <br>
    <br>
    <center><p>Informasi Utama</p></center>
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
            <td>Tanggal Jatuh Tempo</td>
            <td>:<input type="text" name="tglJatuhTempo" id="tglJatuhTempo"/></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td>:<select name="pelangganId" id="pelangganId">
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{$pelanggan->id}}">{{$pelanggan->nama_pelanggan}} </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <!-- <tr>
            <td>Nama barang</td>
            <td>:<select name="barangId" id="barangId">
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
            <td>:<input type="text" name="subTotal" id="subTotal" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Keterangan </td>
            <td>:<input type="text" name="keterangan" id="keterangan"/></td>
        </tr> -->
    </table>
    <br>
    
    <center><p>Detail Penjualan</p></center>
    <table border="1" align="center">
        <tbody>
            <tr>
                <td align="left"> No. </td>
                <td align="center"> Pilih Barang </td>
                <td align="center"> Nama Barang </td>
                <td align="center"> Kode Barang </td>
                <td align="center"> Qty </td>
                <td align="center"> Harga Satuan </td>
                <td align="center"> Sub Total </td>
            </tr>
            <tr class="barang-row">
                <td class="barang-index">1</td>
                <td class="barang-id">
                    <select name="detilJual[0]['barangId']" onselect="onSelectBarang(this);">
                        @foreach($barangs as $barang)
                            <option
                                value="{{$barang->id}}"
                                data-nama="{{$barang->nama}}"
                                data-harga="{{$barang->harga_jual1}}"
                                data-kode="{{$barang->kode_barang}}"
                            >{{$barang->nama}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="barang-nama"></td>
                <td class="barang-kode"></td>
                <td class="barang-qty"><input type="number" name="detilJual[0]['qty']" min="1" value="1" /> </td>
                <td class="barang-harga"></td>
                <td class="barang-subtotal"><input type="text" name="detilJual[0]['subTotal']"/> </td>
            </tr>
            <tr>
                <td colspan="6" align="right">Total</td>
                <td id="faktur-jual-total" align="right">0</td>
            </tr>
            <tr>
                <td colspan="7">
                    <button type="button" style="text-align: center;display:inline-block; width: 100%;">Tambah Barang</button>
                </td>
            </tr>
        </tbody>
    </table>

    <br />
    <br />
    <center><input type="submit" value="Simpan Faktur Jual"/></center>
</form>

<script type="application/javascript">
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
