<?php

namespace App\Http\Controllers;

use App\Day;
use App\Fellowship;
use App\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SermonController extends Controller
{

    public function index() {
        $days = Day::all();
        return view('sermons.sermon',['days'=>$days]);
    }
    public function createSermon(Request $request) {

        $validation = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'date'=>'required',
            'sermon_by'=>'required',
            'featured_photo'=>'required'
        ]);

        if ($validation){
            if ($request->has('url')){
                //get file
                $url = $request->file('url');
                //get file name
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name,PATHINFO_FILENAME);
                $extension = $request->file('url')->getClientOriginalExtension();
                $filenameToStore = $filename . '_'.time().'.' .$extension;
                $request->file('url')->storeAs('public/sermons',$filenameToStore);

                $featured_photo = $request->file('featured_photo');
                $photo_name = $featured_photo->getClientOriginalName();
                $photo_extension = $request->file('featured_photo')->getClientOriginalExtension();
                $photo_to_store = $photo_name . '_' .time().'.'.$photo_extension;
                $request->file('featured_photo')->storeAs('public/sermons',$photo_to_store);

                //post sermon
                $sermon = new Sermon();
                $sermon->title = $request['title'];
                $sermon->verse = $request['verse'];
                $sermon->description = $request['description'];
                $sermon->sermon_by = $request['sermon_by'];
                $sermon->date = $request['date'];
                $sermon->day_id = $request['day_id'];
                $sermon->featured_photo = $photo_to_store;
                $sermon->url = $filenameToStore;

                $sermon->save();

                return redirect()->back()->with(['message'=>'Sermon Created Successfully']);

            }
        }else {
          //  dd('test');
            return redirect()->back()->with(['error'=>'Required fields']);
        }

    }

    public function allSermons() {
        $sermons = Sermon::all();
        return view('sermons.sermons',['sermons'=>$sermons]);
    }

    public function editSermon($id) {
        $sermon = Sermon::where(['id'=>$id])->first();
        $base_url = "http://localhost/PeacemakersAdmin/storage/app/public/";
        return view('sermons.sermon-single',['sermon'=>$sermon,'base_url'=>$base_url]);
    }

    public function getSermons() {
        $sermons = Sermon::with('day')->get();
        if ($sermons) {
         return GeneralResponseController::getGeneralSuccessResponse('Sermons Fetched Successfully',$sermons,200);
        }else {
          return GeneralResponseController::getGeneralErrorResponse('An error occurred',404);
        }
    }

    public function getDay() {
        return view('setup.day');
    }
    public function postDay(Request $request) {
        $rules = ['title'=>'required'];
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return redirect()->back()->with(['warning'=>'Day title is required !']);
        }else{
            $day = new Day();
            $day->title = $request->title;

            $day->save();
            return redirect()->back()->with(['success'=>'Day Created Successfully']);
        }
    }


}
