<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Materials;

class Meditions extends Model
{
    protected $table = 'meditions';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function materials(){
        return $this->belongsToMany(Materials::class,'meditions_id');
    }
}
