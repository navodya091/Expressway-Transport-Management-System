@extends('layouts.app')

@section('content')
<style>
    /* CSS styles */
    .table th {
        font-size: 12px; 
    }

    .create-button {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
    }

    .small-label {
        font-size: 12px; 
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-success text-white">Report</div>
                                <!-- Filter section -->
                                <div class="card-body">
                                    <form method="get" action="{{ route('report.index') }}">
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <input type="text" name="bus_number" placeholder="Bus Number" class="form-control" value="{{ request('bus_number') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="route_number" placeholder="Route Number" class="form-control" value="{{ request('route_number') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="driver_name" placeholder="Driver Name" class="form-control" value="{{ request('driver_name') }}">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small-label" for="from_city">From City</label>
                                                    <select name="from_city" class="form-control">
                                                        <option value="">Select City</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="small-label" for="to_city">To City</label>
                                                    <select name="to_city" class="form-control">
                                                        <option value="">Select City</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            <label class="small-label" for="From Time">From time</label>
                                                <input type="time" name="from_time" placeholder="From Time" class="form-control" value="{{ request('from_time') }}">
                                            </div>
                                            <div class="col-md-3">
                                            <label class="small-label" for="From Time">To time</label>
                                                <input type="time" name="to_time" placeholder="To Time" class="form-control" value="{{ request('to_time') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Filter</button>
                                                <a href="{{ route('report.index') }}" class="btn btn-danger">Remove Filters</a>
                                            </div>
                                            <a href="{{ route('report.generate', request()->query())}}" class="btn btn-success">Generate CSV Report</a>
                                            
                                        </div>
                                    </form>
                                </div>
                                <!-- Filter section end -->

                                @if($data->count() > 0)
                                <div class="card-body">
                                    <!-- Display a table with a list of routes -->
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Bus Number</th>
                                                <th>Route Number</th>
                                                <th>Start Outbound</th>
                                                <th>End Outbound</th>
                                                <th>Start Inbound</th>
                                                <th>End Inbound</th>
                                                <th>Driver Name</th>
                                                <th>Arival Time</th>
                                                <th>Depature Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $trip)
                                            <tr>
                                                <td>{{$trip->id}}</td>
                                                <td>{{$trip->bus->bus_number}}</td>
                                                <td>{{$trip->route->route_number}}</td>
                                                <td>{{$trip->route->startOutboundCity->city_name}}</td>
                                                <td>{{$trip->route->endOutboundCity->city_name}}</td>
                                                <td>{{$trip->route->startInboundCity->city_name}}</td>
                                                <td>{{$trip->route->endInboundCity->city_name}}</td>
                                                <td>{{$trip->bus->user->first_name . ' ' . $trip->bus->user->last_name}}</td>
                                                <td>{{$trip->arrival_time}}</td>
                                                <td>{{$trip->departure_time}}</td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        <!-- Pagination links -->
                                        @if($data->count() > 0){{ $data->links('pagination') }}@endif
                                    </div>
                                </div>
                                @else
                                <div class="text-center">
                                    <label>No Data Available</label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
