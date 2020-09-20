<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralApiResponseHandler extends Controller
{
    public static function generalSuccessResponse($data,$message,$status=1) {
        return response()->json([

            'status_code'=>$status,
            'message'=>$message,
            'data'=>$data

        ])->setStatusCode(200);
    }

    public static function getErrorResponse($message,$error,$status=0){
        return response()->json([

            'status_code'=>$status,
            'message'=>$message,
            'error'=>$error

        ])->setStatusCode(200);
    }
}
