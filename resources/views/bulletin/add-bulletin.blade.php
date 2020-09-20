@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 50px; margin-left: 25px">Add Bulletin</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('post.bulletin') }}" enctype="multipart/form-data" >
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
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Donation Type (i.e Lord is Sufficient for all of our needs)">
                    </div>

                    <div class="form-group mb-4">
                        <label for="bulletin_by">Bulletin By</label>
                        <input type="text" class="form-control" name="bulletin_by" id="bulletin_by" placeholder="Enter Speaker Name (i.e pst Z.Ndombi)">
                    </div>

                    <div class="form-group mb-4">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="Enter Date">
                    </div>

                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" cols="30" rows="5" class="form-control" name="description" id="description" placeholder="Add Donation Description"></textarea>
                    </div>

                    <button style="" class="btn btn-primary"><span>Submit</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
