<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class rols extends Model
{
    public function user(){
    	return $this->hasMany(Users::class,'rols_id');
    }
}
