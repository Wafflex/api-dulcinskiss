<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Classes\Validation;
use App\Models\Persons;
use App\Models\Rols;

class users extends Model
{
	public function __construct(){
		$this->validation = new Validation();
	}

	protected $table = 'users';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function person(){
        return $this->belongsTo(Persons::class,'id');
    }

    public function rol(){
        return $this->hasOne(Rols::class,'id');
    }

    public function authenticate($user){
    	$dbuser = $this->validation->userExistence($user);

    	if (count($dbuser) > 0){

    		if (Hash::check($user->password, $dbuser->password)) {
			    $dbuser->person;
			    unset($dbuser->password,$dbuser->persons_id,$dbuser->person->id);
			    $data['user'] = $dbuser;
			    $data['message'] = "User authenticated successfully";
			    return $data;;
			}else{
				return "Incorrect password";
			}

    	}else{

    		return "The user " . $user->username . " doesn't exist";

    	}
    }

    public function register($person){
    	$dbuser = $this->validation->userExistence($person);
    	$dbemail = $this->validation->emailExistence($person->email);


    	if (count($dbuser) > 0){
    		return "The username " . $person->username . " is already taken";
    	}

    	if ($dbemail){
    		return "The email " . $person->email . " is already taken";
    	}

    	$client = new Persons();

    	$client->name = $person->name;
    	$client->lastname = $person->lastname;
    	$client->cedula = $person->cedula;
    	$client->address = $person->address;
    	$client->phone = $person->phone;
    	$client->birthday = $person->birthday;

    	$client->save();

    	$user = new Users();

    	$user->persons_id = $client->id;
    	$user->username = $person->username;
    	$user->password = Hash::make($person->password);
    	$user->rols_id = 2;
    	$user->email = $person->email;

    	$user->save();

    	//return "User successfully created";
    }

}
