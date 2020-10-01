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
            'verse'=>'required',
            'preacher'=>'required',
            'day_id'=>'required',
        ];
        $validate = Validator::make($request->all(),$rules);
        if (!$validate){
            return redirect()->back()->with(['warning'=>'Required Fields']);
        }else {
            if ($request->has('url')) {
                //get file
                $url = $request->file('url');
                //get file name
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = $request->file('url')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('url')->storeAs('public/fellowship', $filenameToStore);

                $fellowship = new Fellowship();
                $fellowship->title = $request->input('title');
                $fellowship->day_id = $request->input('day_id');
                $fellowship->url = $filenameToStore;
                $fellowship->date = $request->input('date');
                $fellowship->description = $request->input('description');
                $fellowship->save();

                return redirect()->route('all.fellowships')->with('success','Fellowship Created Successfully');
            }
        }
    }

    public function getSingleFellowship($id) {
            $fellowship = Fellowship::where(['id'=>$id])->first();
            return view('fellowship.single-fellowship',['fellowship'=>$fellowship]);
    }

    public function updateFellowship($id, Request $request) {
        $rules=[
            'title'=>'required',
            'verse'=>'required',
        ];
        $validate = Validator::make($request->all(),$rules);
        if (!$validate){
            return redirect()->back()->with(['warning'=>'Required Fields']);
        }else {
            if ($request->has('url')) {
                //get file
                $url = $request->file('url');
                //get file name
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = $request->file('url')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('url')->storeAs('public/fellowship', $filenameToStore);

                $fellowship = Fellowship::where(['id'=>$id])->first();
                $fellowship->title = $request->input('title');
                $fellowship->day_id = $request->input('day_id');
                $fellowship->url = $filenameToStore;
                $fellowship->date = $request->input('date');
                $fellowship->description = $request->input('description');
                $fellowship->update();

                return redirect()->route('all.fellowships')->with('success','Fellowship Updated Successfully');
            }else {

                $fellowship = Fellowship::where(['id'=>$id])->first();
                $fellowship->title = $request->input('title');
                $fellowship->date = $request->input('date');
                $fellowship->description = $request->input('description');
                $fellowship->update();

                return redirect()->route('all.fellowships')->with('success','Fellowship Updated Successfully');
            }
        }


    }

}
