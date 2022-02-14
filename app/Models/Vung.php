<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vung extends Model
{
    use HasFactory;
    protected $table = 'vung';

    public function dsDiaDanh()
    {
        return $this->hasMany('App\Models\DiaDanh');
    }
}
