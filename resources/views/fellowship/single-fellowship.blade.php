@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 30px">Edit Fellowship</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('update.sermon',['id'=>$fellowship->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{ $fellowship->title }}" name="title" id="title" placeholder="Enter Sermon Title">
                    </div>
                    <div class="form-group mb-4">
                        <label for="date">Date</label>
                        <input type="date" value="{{ $fellowship->date }}" class="form-control" name="date" id="date">
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Sermon Description">{{ $fellowship->description }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <img src="{{ "http://localhost/peacemakersAdmin/storage/app/public/fellowship/".$fellowship->url }}" width="250" alt="">
                    </div>

                    <button style="" class="btn btn-primary"><span>Submit</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
