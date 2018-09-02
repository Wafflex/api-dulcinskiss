<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Status extends Model
{
    public function products(){
        return $this->belongsTo(Products::class,'status_id');
    }
}
