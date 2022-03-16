<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vung extends Model
{
    use HasFactory;
    protected $table = 'vung';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function dsDiaDanh()
    {
        return $this->hasMany('App\Models\DiaDanh');
    }
}
