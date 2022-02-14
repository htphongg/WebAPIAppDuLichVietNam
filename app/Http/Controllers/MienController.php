<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mien;

class MienController extends Controller
{
    public function layDsMien()
    {
        $dsMien = Mien::all();
        return json_encode($dsMien);
    }
}
