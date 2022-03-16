<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhMonAn extends Model
{
    use HasFactory;

    protected $table = 'anh_mon_an';
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function monAn()
    {
        return $this->belongsTo('App\Models\MonAn');
    }
}
