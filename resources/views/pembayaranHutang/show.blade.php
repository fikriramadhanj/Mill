@extends('layouts.index')

@section('pageTitle')
<h3>Detail Pembayaran</h3>
@endsection

@section('pageOptions')
<a href={{ route('pembayaran-hutang.index')}} class="btn btn-primary">Kembali ke List Pembayaran</a>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th> Total Hutang </th>
            <th> Total Bayar </th>
            <th> Sisa Pembayaran Hutang </th>


          </tr>
        </thead>
        <tbody>
              <tr>
                    <td>Rp. {{number_format($totalHutang,2,".",",")}} </td>
                    <td>Rp. {{number_format($totalBayar,2,".",",")}} </td>
                    <td>Rp. {{number_format($sisaBayar,2, ".", ",")}} </td>
              </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
