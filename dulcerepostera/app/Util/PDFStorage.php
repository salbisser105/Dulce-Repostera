<?php

namespace App\Util;

use App\Interfaces\FileStorage;
use App\Interfaces\ImageStorage;
use PDF;

use Illuminate\Support\Facades\Storage;

class PDFStorage implements FileStorage {

    public function store($data){
        view()->share('data',$data);
        $pdf = PDF::loadView('pdf/pdfview', $data);
        return $pdf->download($data['order']->getId().'.pdf');
    }
}