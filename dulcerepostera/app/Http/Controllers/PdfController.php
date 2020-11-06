<?php
//Created by Santiago Albisser
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class PdfController extends Controller
{
    public function pdfview(Request $request)
    {
        $items = DB::table("items")->get();
        view()->share('items', $items);
        if ($request->has('download')) {
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
}
