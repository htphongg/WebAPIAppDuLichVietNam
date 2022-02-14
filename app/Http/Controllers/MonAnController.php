<?php

namespace App\Http\Controllers;

use App\Models\MonAn;
use App\Models\QuanAn;
use Illuminate\Http\Request;

class MonAnController extends Controller
{
    public function layDsHinhAnhMon($mon_an_id)
    {
        $dsHinhAnh = MonAn::find($mon_an_id)->dsHinhAnh;
        return json_encode($dsHinhAnh);
    }

  
}
