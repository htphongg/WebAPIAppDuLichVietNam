<?php

namespace App\Http\Controllers;

use App\Models\QuanAn;
use Illuminate\Http\Request;

class QuanAnController extends Controller
{
    public function layDsHinhAnhQuan($quan_an_id)
    {
        $dsHinhAnh = QuanAn::find($quan_an_id)->dsHinhAnh;
        return json_encode($dsHinhAnh);
    }

    public function layDsMonAn($quan_an_id)
    {
        $dsMonAn = QuanAn::find($quan_an_id)->dsMonAn;
        return json_encode($dsMonAn);
    }
}
