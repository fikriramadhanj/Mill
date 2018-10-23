@extends('layouts.index')

@section('pageTitle')
<h3>Detail Pelunasan</h3>
@endsection

@section('pageOptions')
<a href={{ route('pelunasan-piutang.index')}} class="btn btn-primary">Kembali ke List Pelunasan</a>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th> Total Piutang </th>
            <th> Total Bayar </th>
            <th> Sisa Pelunasan Piutang </th>

          </tr>
        </thead>
        <tbody>
              <tr>
                    <td>Rp. {{number_format($totalPiutang,2,".",",")}} </td>
                    <td>Rp. {{number_format($totalBayar,2,".",",")}} </td>
                    <td>Rp. {{number_format($sisaBayar,2, ".", ",")}} </td>
              </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
