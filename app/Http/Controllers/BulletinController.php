<?php

namespace App\Http\Controllers;

use App\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BulletinController extends Controller
{
    public function index()
    {
        return view('bulletin.add-bulletin');
    }

    public function addBulletin(Request $request)
    {

        $rules = ['featured_photo' => 'required', 'title' => 'required', 'bulletin_by' => 'required', 'date' => 'required', 'description' => 'required'];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput(['warning' => 'Required input']);
        } else {
            if ($request->has('featured_photo')) {
                $url = $request->file('featured_photo');
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = $request->file('featured_photo')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('featured_photo')->storeAs('public/bulletin', $filenameToStore);

                $bulletin = new Bulletin();
                $bulletin->title = $request->input('title');
                $bulletin->description = $request->input('description');
                $bulletin->date = $request->input('date');
                $bulletin->featured_photo = $filenameToStore;
                $bulletin->bulletin_by = $request->input('bulletin_by');

                $bulletin->save();

                return redirect()->back()->with(['success' => 'Bulletin Added Successfully']);
            }
        }

    }

    public function allBulletins()
    {
        $all_bulletins = Bulletin::all();
        return view('bulletin.bulletins', ['bulletins' => $all_bulletins]);
    }

    public function singleBulletin($id)
    {
        $bulletin = Bulletin::where(['id'=>$id])->first();
        return view('bulletin.single-bulletin', ['bulletin' => $bulletin]);
    }

    public function updateBulletin(Request $request, $id)
    {
        $rules = ['title' => 'required', 'bulletin_by' => 'required', 'date' => 'required', 'description' => 'required'];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return redirect()->back()->with(['warning' => 'Required input']);
        }else {

            //Check if image has been updated
            if ($request->has('featured_photo')) {
                $url = $request->file('featured_photo');
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = $request->file('featured_photo')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('featured_photo')->storeAs('public/bulletin', $filenameToStore);

                $bulletin = Bulletin::where(['id'=>$id])->first();
                $bulletin->title = $request->input('title');
                $bulletin->description = $request->input('description');
                $bulletin->date = $request->input('date');
                $bulletin->featured_photo = $filenameToStore;
                $bulletin->bulletin_by = $request->input('bulletin_by');

                $bulletin->save();

                return redirect()->route('all.bulletins')->with('success', 'Updated Successfully');

            }else{
                //update with current image
                $bulletin = Bulletin::where(['id'=>$id])->first();
                $bulletin->title = $request->input('title');
                $bulletin->description = $request->input('description');
                $bulletin->date = $request->input('date');
                $bulletin->bulletin_by = $request->input('bulletin_by');

                $bulletin->save();

                return redirect()->route('all.bulletins')->with('success', 'Updated Successfully');

            }


        }

    }

}
