<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class persons extends Model
{
    public function user()
    {
        return $this->belongsTo(Users::class,'person_id');
    }
}
