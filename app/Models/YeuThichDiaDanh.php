<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThichDiaDanh extends Model
{
    use HasFactory;
    protected $table = 'yeu_thich_dia_danh';
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
