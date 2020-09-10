@extends('layouts.app')
@section('content')

    <div class="layout-top-spacing layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 30px">Add Day</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('post.day') }}" >
                    @csrf
                    @include('errors.message')
                    <div class="form-group mb-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Day">
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Description"></textarea>
                    </div>

                    <button style="" class="btn btn-primary"><span>Submit</span></button>
                </form>
            </div>
        </div>
    </div>

@endsection
