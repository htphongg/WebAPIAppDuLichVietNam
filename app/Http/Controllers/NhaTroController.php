<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaTro;

class NhaTroController extends Controller
{
    public function layDsHinhAnhNhaTro($nha_tro_id)
    {
        $dsHinhAnh = NhaTro::find($nha_tro_id)->dsHinhAnh;
        return json_encode($dsHinhAnh);
    }
}
