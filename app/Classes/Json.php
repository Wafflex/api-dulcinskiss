<?php 

namespace App\Classes;

use Illuminate\Support\Facades\Response;

class Json {
    public function sendSuccess($data,$message='All ok :)', $internalCode=200, $httpCode = 200)
    {
    	$return['meta']['code'] = $internalCode;
    	$return['meta']['message'] = $message;

        if ($data != NULL)
        {
            $return['data'] = $data;
        }

        return Response::json($return, $httpCode);
    }

    public function sendError($error='An error was ocurred',$internalCode,$data=null)
    {
    	$return['meta']['code'] = $internalCode;
    	$return['meta']['error_message'] = $error;

        if ($data != NULL){
            $return['data'] = $data;
        }

        return Response::json($return, 404);
    }
} 