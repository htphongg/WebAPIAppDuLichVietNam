<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vung;

class VungController extends Controller
{
    public function layDsVung()
    {
        $dsVung = Vung::all();
        return json_encode($dsVung);
    }
    
}
