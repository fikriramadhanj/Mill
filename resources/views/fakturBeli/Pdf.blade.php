
<H3>Faktur Pembelian </h3>


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
          @if (isset($detilBelis))
            @foreach($detilBelis as $detilBeli)
              <tr>
                <td> {{$detilBeli->kode_barang}} </td>
                <td> {{$detilBeli->nama}} </td>
                <td> Rp. {{number_format($detilBeli->harga_beli,2, ".", ",")}} </td>
                <td> {{$detilBeli->qty}} </td>
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
