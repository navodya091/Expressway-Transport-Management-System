@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">Create New Route</div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('route.store') }}" method="POST">
                            @csrf

                            <!-- Add Route Number, Route Name, and Description Fields -->
                            <div class="form-group">
                                <label for="route_number">Route Number</label>
                                <input type="text" name="route_number" class="form-control{{ $errors->has('route_number') ? ' is-invalid' : '' }}">
                                @if ($errors->has('route_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('route_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="start_inbound">Start Inbound</label>
                                <select name="start_inbound" class="form-control{{ $errors->has('start_inbound') ? ' is-invalid' : '' }}">
                                    <option value="">Select Start Inbound</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('start_inbound'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_inbound') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="end_inbound">End Inbound</label>
                                <select name="end_inbound" class="form-control{{ $errors->has('end_inbound') ? ' is-invalid' : '' }}">
                                    <option value="">Select End Inbound</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('end_inbound'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end_inbound') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="start_outbound">Start Outbound</label>
                                <select name="start_outbound" class="form-control{{ $errors->has('start_outbound') ? ' is-invalid' : '' }}">
                                    <option value="">Select Start Outbound</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('start_outbound'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_outbound') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="end_outbound">End Outbound</label>
                                <select name="end_outbound" class="form-control{{ $errors->has('end_outbound') ? ' is-invalid' : '' }}">
                                    <option value="">Select End Outbound</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('end_outbound'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end_outbound') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Continue with the rest of the form fields -->

                            <button type="submit" class="btn btn-primary">Save & Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
