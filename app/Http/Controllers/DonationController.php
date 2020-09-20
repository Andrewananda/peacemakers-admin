<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Donation_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function donationType() {
        return view('donation.donation-type');
    }
    public function addDonationType(Request $request) {
        $rules=['title'=>'required'];

        $validation=Validator::make($rules,$request->all());
        //validate input
        if ($validation){
            $donation_type=new Donation_type();
            $donation_type->title=$request->title;
            $donation_type->description=$request->description;
            $donation_type->save();

            return back()->with(['success'=>'Donation Type Created Successfully']);
        }else{
            return redirect()->back()->with(['warning'=>'Title Field Required']);
        }
    }

    public function index() {
        $donation_types=Donation_type::all();
        return view('donation.add-donation',['donation_types'=>$donation_types]);
    }

    public function postDonation(Request $request) {
        $rules=['title'=>'required','donation_type_id'=>'required','expected_amount'=>'required',
                'date'=>'required','description'=>'required'];

        $validation=Validator::make($rules,$request->all());

        //validate inputs
        if ($validation){

            //check if request has an image
            if ($request->has('featured_photo')){
                $url = $request->file('featured_photo');
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name,PATHINFO_FILENAME);
                $extension = $request->file('featured_photo')->getClientOriginalExtension();
                $filenameToStore = $filename . '_'.time().'.' .$extension;
                $request->file('featured_photo')->storeAs('public/donations',$filenameToStore);

                $donation = new Donation();
                $donation->title=$request->title;
                $donation->donation_type_id=$request->donation_type_id;
                $donation->date=$request->date;
                $donation->description=$request->description;
                $donation->featured_photo=$filenameToStore;
                $donation->expected_amount=$request->expected_amount;
                $donation->duration=$request->duration;

                $donation->save();

                return redirect()->back()->with(['success'=>'Donation Created Successfully']);
            }

        }else{
            return redirect()->back()->with(['warning'=>'All Inputs Are Required']);

        }
    }

    public function allDonations() {

        $donations=Donation::all();
        return view('donation.donations',['donations'=>$donations]);
    }

    public function singleDonation($id) {

        $donation=Donation::with('donation_type')->where(['id'=>$id])->first();

        $donation_types=Donation_type::all();

        return view('donation.single-donation',['donation'=>$donation,'donation_types'=>$donation_types]);

    }

    public function updateDonation(Request $request,$id){
        //set rules
        $rules=['title'=>'required','donation_type_id'=>'required','expected_amount'=>'required',
            'date'=>'required','description'=>'required'];

        $validation=Validator::make($rules,$request->all());

        if ($validation){
            //check if new image was uploaded
            if ($request->has('featured_photo')) {
                $url = $request->file('featured_photo');
                $name = $url->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = $request->file('featured_photo')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('featured_photo')->storeAs('public/donations', $filenameToStore);

                $donation = Donation::where(['id'=>$id])->first();
                $donation->title=$request->title;
                $donation->donation_type_id=$request->donation_type_id;
                $donation->date=$request->date;
                $donation->description=$request->description;
                $donation->featured_photo=$filenameToStore;
                $donation->expected_amount=$request->expected_amount;
                $donation->duration=$request->duration;

                $donation->update();

                return redirect()->back()->with(['success'=>'Donation Updated Successfully']);
            }else{
                //if image was not updated

                $donation = Donation::where(['id'=>$id])->first();
                $donation->title=$request->title;
                $donation->donation_type_id=$request->donation_type_id;
                $donation->date=$request->date;
                $donation->description=$request->description;
                $donation->expected_amount=$request->expected_amount;
                $donation->duration=$request->duration;

                $donation->update();

                return redirect()->route('donations')->with(['success'=>'Donation Updated Successfully']);
            }

        }else{
            return redirect()->back()->with(['warning'=>'Input required']);

        }

    }

    public function allDonationTypes(){
        $donation_types=Donation_type::all();
        return view('donation.donation-types',['donation_types'=>$donation_types]);
    }

    public function singleDonationType($id){

        $donation_type=Donation_type::where(['id'=>$id])->first();

        return view('donation.single-donation-type',['donation_type'=>$donation_type]);
    }

    public function updateDonationType(Request $request, $id){

        //check if everything isset
        $rules=['title'=>'required','description'=>'required'];

        $validation=Validator::make($rules,$request->all());

        if (!$validation){
            return redirect()->back()->with(['warning'=>'All fields required']);

        }else{

            //get donation type to be updated
            $donation_type=Donation_type::where(['id'=>$id])->first();
            $donation_type->title=$request->title;
            $donation_type->description=$request->description;
            $donation_type->update();

            return redirect()->route('donation.types')->with(['success'=>'Updated Successfully']);
        }


    }


}
