@extends('layouts.app')
@section('content')

    <div class="row layout-top-spacing layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="margin-top: 30px">All Bulletins</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1">
                        <table id="style-1" class="table style-1 table-hover non-hover">
                            <thead>
                            <tr>
                                <th hidden> Record no. </th>
                                <th>Featured Photo</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bulletins as $bulletin)
                                <tr>
                                    <td hidden > 1 </td>
                                    <td class="user-name"><img src="{{ "http://localhost/peacemakersAdmin/storage/app/public/bulletin/" . $bulletin->featured_photo }}" height="100" alt=""></td>
                                    <td>{{ $bulletin->title }}</td>
                                    <td>{{ $bulletin->date }}</td>
                                    <td>{{ $bulletin->description }}</td>
                                    <td class="text-center">
                                        <div class="dropdown custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                <a class="dropdown-item" href="{{ route('single.bulletin',['id'=>$bulletin->id]) }}">View</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
