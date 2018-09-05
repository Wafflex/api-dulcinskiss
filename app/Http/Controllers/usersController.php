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

    	$user = new Users();



    	$user->persons_id = 2;
    	$user->username = $request->username;
    	$user->password = "asdasd";//Hash::make($request->password);
    	$user->rols_id = 2;
    	$user->email = $request->email;

    	$user->save();
    	return $user;
    	$dbuser = $this->model->register($request);
    	return $dbuser;
    }
}
