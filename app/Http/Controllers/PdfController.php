<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakturJual;
use PDF;

class PdfController extends Controller
{
    public function pdf(){

        $fakturJual = FakturJual::all();
        $pdf = PDF::a'pdf', ['fakturJual' => $fakturJual]);
        return $pdf->download('fakturJual.pdf');
    }
}
