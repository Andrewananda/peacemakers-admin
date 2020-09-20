@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 50px; margin-left: 25px">Manage Donation</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('update.donation',['id'=>$donation->id]) }}" enctype="multipart/form-data" >
                    @csrf
                    @include('errors.message')

                    <div class="form-group mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Upload (Upload Image To Appear On The Website) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" id="featured_photo" name="featured_photo" accept="file_extension|audio/*|video/*|image/*|media_type">
                                <input type="hidden" name="MAX_FILE_SIZE" value="71191571" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div>
                                <img src="{{ "http://localhost/peacemakersAdmin/storage/app/public/donations/" . $donation->featured_photo }}" height="200" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $donation->title }}" placeholder="Enter Donation Type (i.e Covid19 Situation in the country)">
                    </div>

                    <div class="form-group mb-4">
                        <label for="donation_type_id">Donation Type</label> <br>
                        <select name="donation_type_id" id="donation_type_id" class="selectpicker form-control" data-live-search="true">
                            @foreach($donation_types as $donation_type)
                                <option class="form-control" value="{{ $donation_type->id }}" >{{ $donation->donation_type->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="expected_amount">Expected Amount</label>
                        <input type="text" class="form-control" name="expected_amount" id="expected_amount" value="{{ $donation->expected_amount }}" placeholder="Enter Expected Amount Type (Donation Expected Amount)">
                    </div>

                    <div class="form-group mb-4">
                        <label for="duration">Expected Date </label>
                        <input type="date" class="form-control" name="duration" id="duration" value="{{ $donation->date }}" placeholder="Enter Expected duration ()">
                    </div>

                    <div class="form-group mb-4">
                        <label for="date">Date (Date Posted)</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ $donation->date }}" placeholder="Enter Date">
                    </div>

                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" cols="30" rows="5" class="form-control" name="description" id="description" placeholder="Add Donation Description">{{ $donation->description }}</textarea>
                    </div>

                    <button style="width: 200px; text-align: center; height: 50px" class="btn btn-primary"><span>Update</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
