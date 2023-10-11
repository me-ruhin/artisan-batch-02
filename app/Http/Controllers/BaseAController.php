<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController
{
    public function seccessResponse($message = "", $statusCode = 200, $data = []){
        $arr = [
            'msg' => $message,
            "status" => $statusCode,
            "data" => $data
        ];
        return response()->json($arr);
    }

    public function errorResponse($message = "", $statusCode = 200, $data = []){
        $arr = [
            'msg' => $message,
            "status" => $statusCode,
            "data" => []
        ];
        return response()->json($arr);
    }
}
