<?php 

namespace App\Classes;

use Illuminate\Support\Facades\Response;
use App\Models\Products;

class Validation {
    public function existence($name){
        $validate = Products::where('name','=',$name)->first();
        if (!is_null($validate)){
            return true;
        }
    }
} 