<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mien extends Model
{
    use HasFactory;

    protected $table = 'mien';

    public function dsDiaDanh()
    {
        return $this->hasMany('App\Models\DiaDanh');
    }
}
