<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Status extends Model
{
    public function products(){
        return $this->hasMany(Products::class,'id');
    }
}
