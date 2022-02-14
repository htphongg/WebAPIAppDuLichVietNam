<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoatDong;
use App\Models\DiaDanh;

class HoatDongController extends Controller
{
   public function layDsHoatDong()
   {
       $dsHoatDong = HoatDong::all();
       return json_encode($dsHoatDong);
   }

   public function layDsDiaDanh($hoat_dong_id)
   {
       $dsDiaDanh = HoatDong::find($hoat_dong_id)->dsDiaDanh;
       return json_encode($dsDiaDanh);
   }
}
