@extends('layouts.app')
@section('content')

<div class="row layout-top-spacing layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 style="margin-top: 30px">All Reviewed Prayer Requests</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4 style-1">
                    <table id="style-1" class="table style-1 table-hover non-hover">
                        <thead>
                        <tr>
                            <th hidden> Record no. </th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Request</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviewedPrayerRequests as $reviewedPrayerRequest)
                        <tr>
                            <td hidden > 1 </td>
                            <td class="user-name">{{ $reviewedPrayerRequest->name }}</td>
                            <td>{{ $reviewedPrayerRequest->phone }}</td>
                            <td>{{ $reviewedPrayerRequest->description }}</td>

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
