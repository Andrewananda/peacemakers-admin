<?php

namespace App\Http\Controllers;

use App\Bulletin;
use App\Contact;
use App\Fellowship;
use App\News;
use App\Prayer_request;
use App\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function sermons() {
        $sermons = Sermon::with('day')
            ->orderBy('id','desc')
            ->get();
        return GeneralResponseController::getGeneralSuccessResponse('Sermon Fetched Successfully',$sermons,200);
    }

    public function fellowships() {

        $fellowships = Fellowship::with('day')
            ->orderBy('id','desc')
            ->get();
        return GeneralResponseController::getGeneralSuccessResponse('Fellowships Fetched Successfully',$fellowships,200);
    }

    public function news() {
        $news = News::query()
            ->orderBy('id','desc')
            ->get();
        return GeneralResponseController::getGeneralSuccessResponse('News Fetched Successfully',$news,200);
    }

    public function bulletin() {
        $bulletin = Bulletin::query()
            ->orderBy('id','desc')
            ->get();
        return GeneralResponseController::getGeneralSuccessResponse('Bulletin Fetched Successfully',$bulletin,200);
    }

    public function contact_us(Request $request) {
        $rules = [
            'name'=>'required',
            'phone'=>'required',
            'description'=>'required'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()){
            return GeneralResponseController::getGeneralErrorResponse('Required fields',406);
        }else {
            $contact = new Contact();
            $contact->name = $request['name'];
            $contact->email = $request['email'];
            $contact->phone = $request['phone'];
            $contact->description = $request['description'];

            return GeneralResponseController::getGeneralSuccessResponse('Submitted Successfully',$contact,200);
        }
    }

    public function prayer_request(Request $request) {

        $rules = [
            'name'=>'required',
            'phone'=>'required',
            'description'=>'required'
        ];
        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()) {
            return GeneralResponseController::getGeneralErrorResponse('Kindly fill all required fields',406);
        }else {

            $prayer_request = new Prayer_request();
            $prayer_request->name = $request['name'];
            $prayer_request->email = $request['email'];
            $prayer_request->phone = $request['phone'];
            $prayer_request->descripiton = $request['description'];

            return GeneralResponseController::getGeneralSuccessResponse('Prayer Request Submitted Successfully',$prayer_request,200);

        }


    }


}
