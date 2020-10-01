@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 30px">Add Sermon</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('post.sermon') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Sermon Title">
                    </div>
                    <div class="form-group mb-4">
                        <label for="verse">Verse</label>
                        <input type="text" class="form-control" name="verse" id="verse" placeholder="Enter Verse (Genesis 1:1)">
                    </div>
                    <div class="form-group mb-4">
                        <label for="sermon_by">Preacher</label>
                        <input type="text" class="form-control" name="sermon_by" id="sermon_by" placeholder="Enter Name Of Preacher">
                    </div>
                    <div class="form-group mb-4">
                        <label for="day_id">Day</label> <br>
                        <select name="day_id" id="day_id" class="selectpicker form-control" data-live-search="true">
                            <option>Select Sermon Day</option>
                            @foreach($days as $day)
                                <option value="{{ $day->id }}">{{ $day->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Sermon Description"></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="featured_photo">Featured Photo(Required *)</label>
                        <input type="file" id="featured_photo" name="featured_photo" accept="file_extension|*image/*|media_type">
                    </div>


                    <div class="form-group mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Upload (Video) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" id="url" name="url" accept="file_extension|audio/*|video/*|image/*|media_type">
                                <input type="hidden" name="MAX_FILE_SIZE" value="71191571" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>

                    <button style="" class="btn btn-primary"><span>Submit</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
