@extends('layouts.app')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-3 col-lg-6 col-12" style="padding-bottom: 20px!important;">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body text-left w-100">
                                <h3 class="primary">{{ count($prayer_requests) }}</h3>
                                <span>Prayer Requests</span>
                                <div class="chartjs">
                                    <canvas id="line-stacked-area" height="0" width="0"></canvas>
                                </div>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-users primary font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body text-left w-100">
                                <h3 class="danger">{{ count($news) }}</h3>
                                <span>News</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-folder danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                                 aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body text-left w-100">
                                <h3 class="success">{{ count($sermons) }}</h3>
                                <span>Sermons</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-file success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body text-left w-100">
                                <h3 class="warning">{{ count($fellowships) }}</h3>
                                <span>Fellowships</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="fa fa-money warning font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1">
                        <h4>Prayer Requests</h4>
                        <table id="style-1" class="table style-1 table-hover non-hover">
                            <thead>
                            <tr>
                                <th hidden> Record no. </th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Request</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prayer_requests as $prayerRequest)
                                <tr>
                                    <td hidden > 1 </td>
                                    <td class="user-name">{{ $prayerRequest->name }}</td>
                                    <td>{{ $prayerRequest->phone }}</td>
                                    <td>{{ $prayerRequest->description }}</td>
                                    <td class="text-center">
                                        <div class="dropdown custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                <a class="dropdown-item" href="{{ route('single.sermon',['id'=>$prayerRequest->id]) }}">View</a>
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
