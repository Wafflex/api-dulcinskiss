<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Classes\Json;


class usersController extends Controller
{

	public function __construct(){
		$this->model = new Users();
		$this->json = new Json();
	}

    public function login(Request $request){
    	$dbuser = $this->model->authenticate($request);

    	if (is_array($dbuser)){
    		$this->json->message = $dbuser['message'];
    		$this->json->data = $dbuser['user'];
    	}else{
    		$this->json->message = $dbuser;
    	}

    	return $this->json->sendResponse();
    }

    public function register(Request $request){
    	$dbuser = $this->model->register($request);
    	return $dbuser;
    }
}
