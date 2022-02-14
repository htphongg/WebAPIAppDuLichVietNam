<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhMonAn extends Model
{
    use HasFactory;

    protected $table = 'anh_mon_an';

    public function monAn()
    {
        return $this->belongsTo('App\Models\MonAn');
    }
}
