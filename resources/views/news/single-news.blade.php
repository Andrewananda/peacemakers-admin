@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 30px">Update News</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @include('errors.message')
                <form method="post" action="{{ route('update.news',['id'=>$news->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{ $news->title }}" name="title" id="title" placeholder="Enter Sermon Title">
                    </div>
                    <div class="form-group mb-4">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" value="{{ $news->date }}" name="date" id="date">
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Sermon Description">{{ $news->description }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Upload (Image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" id="featured_photo" name="featured_photo" accept="file_extension|audio/*|video/*|image/*|media_type">
                                <input type="hidden" name="MAX_FILE_SIZE" value="71191571" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div >
                                <img src="{{ "http://localhost/PeacemakersAdmin/storage/app/public/sermons/" . $news->featured_photo }}" height="100" width="100" alt="img">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary"><span>Submit</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
