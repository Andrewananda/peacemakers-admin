<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralResponseController extends Controller
{
    public static function getGeneralSuccessResponse($message,$data,$response_status) {
        return response()->json([
            'response_status'=>$response_status,
            'response_message'=>$message,
            'data'=>$data
        ])->setStatusCode(200);
    }
    public static function getGeneralErrorResponse($message,$response_status) {
        return response()->json([
            'response_status'=>$response_status,
            'response_message'=>$message,
            'data'=>null
        ])->setStatusCode(201);
    }

 }
