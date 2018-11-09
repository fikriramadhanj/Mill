
<h3 align="center">Faktur Pembelian </h3>


      <table border="1">
        <thead>
          <tr>
            <th align="center"> Kode Barang </th>
            <th align="center"> Nama Barang </th>
            <th align="center"> Harga Barang </th>
            <th align="center"> Qty </th>
            <th align="center"> Subtotal </th>

          </tr>
        </thead>
        <tbody>
          @if (isset($detilBelis))
            @foreach($detilBelis as $detilBeli)
              <tr>
                <td align="center"> {{$detilBeli->kode_barang}} </td>
                <td align="center"> {{$detilBeli->nama}} </td>
                <td align="center"> Rp. {{number_format($detilBeli->harga_beli,2, ".", ",")}} </td>
                <td align="center"> {{$detilBeli->qty}} </td>
                <td align="right"> Rp. {{number_format($detilBeli->sub_total,2, ".", ",")}} </td>

              </tr>
             @endforeach
          @endif
          <td colspan ="6" align="right" > <b >Total : Rp. {{number_format($total,2,".",",")}}</b> </td>

        </tbody>
      </table>
    </div>
  </div>
</div>
