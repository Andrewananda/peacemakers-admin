@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 30px">Edit Sermon</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('post.sermon') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{ $sermon->title }}" name="title" id="title" placeholder="Enter Sermon Title">
                    </div>
                    <div class="form-group mb-4">
                        <label for="verse">Verse</label>
                        <input type="text" class="form-control" value="{{ $sermon->verse }}" name="verse" id="verse" placeholder="Enter Verse (Genesis 1:1)">
                    </div>
                    <div class="form-group mb-4">
                        <label for="sermon_by">Preacher</label>
                        <input type="text" class="form-control" name="sermon_by" value="{{ $sermon->sermon_by }}" id="sermon_by" placeholder="Enter Name Of Preacher">
                    </div>
                    <div class="form-group mb-4">
                        <label for="day_id">Day</label> <br>
                        <select name="day_id" id="day_id" class="selectpicker" data-live-search="true">
                            <option>Fries</option>
                            <option value="1">Thursday</option>
                            <option value="2">Sunday</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="date">Date</label>
                        <input type="date" value="{{ $sermon->date }}" class="form-control" name="date" id="date">
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Sermon Description">{{ $sermon->description }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <iframe class="embed-responsive-item" width="400" height="300" src="{{ "http://localhost/peacemakersAdmin/storage/app/public/sermons/".$sermon->url }}" allowfullscreen></iframe>
                    </div>

                    <button style="" class="btn btn-primary"><span>Submit</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
