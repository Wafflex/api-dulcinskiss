<?php 

namespace App\Classes;

use Illuminate\Support\Facades\Response;
use App\Models\Products;
use App\Models\Users;

class Validation {
    public function existence($name){
        $product = Products::where('name','=',$name)->first();
        if (!is_null($product)){
            return true;
        }
    }

    public function userExistence($user){
    	$dbuser = Users::where('username','=',$user->username)->first();
    	if (count($dbuser) > 0){
    		return $dbuser;
    	}
    }

    public function emailExistence($email){
    	$dbemail = Users::where('email','=',$email)->first();
    	if (count($dbemail) > 0){
    		return true;
    	}
    }
} 