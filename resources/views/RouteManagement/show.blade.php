@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">View Route</div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="route_number">Route Number</label>
                            <input type="text" name="route_number" class="form-control{{ $errors->has('route_number') ? ' is-invalid' : '' }}" value="{{ $route->route_number }}" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $route->description }}" disabled>
                            
                        </div>

                        <!-- Inbound and Outbound City Fields -->
                        <div class="form-group">
                            <label for="start_inbound">Start Inbound</label>
                            <select name="start_inbound" class="form-control{{ $errors->has('start_inbound') ? ' is-invalid' : '' }}" disabled>
                                <option value="">Select Start Inbound</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $route->start_point_outbound == $city->id ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="end_inbound">End Inbound</label>
                            <select name="end_inbound" class="form-control{{ $errors->has('end_inbound') ? ' is-invalid' : '' }}" disabled>
                                <option value="">Select End Inbound</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $route->end_point_outbound == $city->id ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="start_outbound">Start Outbound</label>
                            <select name="start_outbound" class="form-control{{ $errors->has('start_outbound') ? ' is-invalid' : '' }}" disabled>
                                <option value="">Select Start Outbound</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $route->start_point_inbound == $city->id ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="end_outbound">End Outbound</label>
                            <select name="end_outbound" class="form-control{{ $errors->has('end_outbound') ? ' is-invalid' : '' }}" disabled>
                                <option value="">Select End Outbound</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $route->end_point_inbound == $city->id ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
