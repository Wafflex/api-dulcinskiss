<?php 

namespace App\Classes;

use Illuminate\Support\Facades\Response;

class Json {

    public $data;
    public $message = 'Api Dulcinskiss Response';

    public function sendResponse(){
    	$return['meta']['message'] = $this->message;

        if ($this->data != NULL){
            $return['data'] = $this->data;
        }

        return Response::json($return);
    }
} 