<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Persons;
use App\Models\Rols;

class users extends Model
{
    public function person()
    {
        return $this->hasOne(Persons::class,'person_id');
    }

    public function rol()
    {
        return $this->hasOne(Rols::class,'rol_id');
    }

}
