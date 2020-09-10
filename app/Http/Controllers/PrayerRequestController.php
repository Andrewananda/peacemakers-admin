<?php

namespace App\Http\Controllers;

use App\Prayer_request;
use Illuminate\Http\Request;

class PrayerRequestController extends Controller
{
    public function postPrayerRequest(Request $request) {

        $prayer_request = new Prayer_request();
        $prayer_request->name = $request['name'];
        $prayer_request->phone = $request['phone'];
        $prayer_request->request = $request['message'];

        $prayer_request->save();
        if ($prayer_request){
            return GeneralResponseController::getGeneralSuccessResponse('Successful',$prayer_request,200);
        }else{
            return GeneralResponseController::getGeneralErrorResponse('Error',201);
        }
    }

    public function index() {
        $prayerRequests=Prayer_request::where(['status'=>'pending']);
        return view('prayer-request.all_prayer_requests',['prayerRequests'=>$prayerRequests]);

    }
}
