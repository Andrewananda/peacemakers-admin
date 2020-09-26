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
        $prayerRequests=Prayer_request::where(['is_viewed'=>0])->get();
        return view('prayer-request.all_prayer_requests',['prayerRequests'=>$prayerRequests]);

    }

    public function getReviewedRequests() {
        $reviewedPrayerRequests=Prayer_request::where(['is_viewed'=>0])->get();
        return view('prayer-request.reviewed-requests',['reviewedPrayerRequests'=>$reviewedPrayerRequests]);

    }

    public function updateRequest($id) {
        $updateRequest = Prayer_request::where(['id'=>$id])->first();
        $updateRequest->is_viewed = 1;
        $updateRequest->update();
        return redirect()->back()->with('success','Prayer Request Updated Successfully');

    }
}
