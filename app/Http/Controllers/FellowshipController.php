<?php

namespace App\Http\Controllers;

use App\Day;
use App\Fellowship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FellowshipController extends Controller
{
    public function index() {
        $days = Day::all();
        return view('fellowship.add-fellowship',['days'=>$days]);
    }
    public function getFellowships() {
        $fellowships = Fellowship::with('day')->get();
        if ($fellowships){
             GeneralResponseController::getGeneralSuccessResponse('Fellowship fetched successfully',$fellowships,200);
            return view('fellowship.all-fellowships',['fellowships'=>$fellowships]);
        }else{
            return GeneralResponseController::getGeneralErrorResponse('No fellowships available',404);
        }
    }

    public function addFellowship(Request $request) {
        $rules=[
            'title'=>'required',
            ''
        ];
        $validate = Validator::make($request->all(),$rules);
    }

}
