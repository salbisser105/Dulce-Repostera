<?php

namespace App\Util;

use App\Exports\BillExport;
use App\Interfaces\FileStorage;
use Maatwebsite\Excel\Facades\Excel;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ExcelStorage implements FileStorage {

    public function store($data){        
        return Excel::download(new BillExport($data), $data['order']->getId().'.xlsx');
    }
    
}