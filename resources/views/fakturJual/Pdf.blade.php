
<h3 align="Center">Faktur Penjualan </h3>


      <table border="1">
        <thead>
          <tr>
            <th> Kode Barang </th>
            <th> Nama Barang </th>
            <th> Harga Barang </th>
            <th> Qty </th>
            <th> Subtotal </th>

          </tr>
        </thead>
        <tbody>
          @if (isset($detilJuals))
            @foreach($detilJuals as $detilJual)
              <tr>
                <td align="center"> {{$detilJual->kode_barang}} </td>
                <td align="center"> {{$detilJual->nama}} </td>
                <td align="right"> Rp. {{number_format($detilJual->harga_jual,2, ".", ",")}} </td>
                <td align="center"> {{$detilJual->qty}} </td>
                <td align="right"> Rp. {{number_format($detilJual->sub_total,2, ".", ",")}} </td>

              </tr>
             @endforeach
          @endif
          <td colspan ="6" align="right" > <b >Total : Rp. {{number_format($total,2,".",",")}}</b> </td>

        </tbody>
      </table>
    </div>
  </div>
</div>
