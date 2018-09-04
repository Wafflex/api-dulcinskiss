<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Materials;

class Providers extends Model
{
    protected $table = 'providers';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function materials(){
        return $this->hasMany(Materials::class,'id');
    }
}
