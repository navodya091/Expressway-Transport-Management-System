@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">Create Trip</div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('trip.store') }}" method="POST">
                            @csrf

                            <!-- Add Route Number-->
                            <div class="form-group">
                                <label for="route_number">Route Number</label>
                                <input type="text" name="route_number" value = "{{$route->route_number }}" class="form-control" disabled>
                                <input type="hidden" name="route_id" value = "{{$route->id }}" class="form-control">
                            </div>
                        
                            <!-- Inbound Section -->
                            <div class="card">
                                <div class="card-header bg-primary text-white">Inbound</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inbound_arrival_time">Arrival Time</label>
                                                <input type="time" name="inbound_arrival_time" class="form-control" value="{{ old('inbound_arrival_time') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inbound_departure_time">Departure Time</label>
                                                <input type="time" name="inbound_departure_time" class="form-control" value="{{ old('inbound_departure_time') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inbound_bus_id">Assign Bus</label>
                                                <select name="inbound_bus_id" class="form-control" value="{{ old('inbound_bus_id') }}">
                                                    <option value="">Select Bus</option>
                                                    @foreach ($buses as $bus)
                                                        <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Outbound Section -->
                            <div class="card">
                                <div class="card-header bg-primary text-white">Outbound</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="outbound_arrival_time">Arrival Time</label>
                                                <input type="time" name="outbound_arrival_time" class="form-control" value="{{ old('outbound_arrival_time') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="outbound_departure_time">Departure Time</label>
                                                <input type="time" name "outbound_departure_time" class="form-control" value="{{ old('outbound_departure_time') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="outbound_bus_id">Assign Bus</label>
                                                <select name="outbound_bus_id" class="form-control" value="{{ old('outbound_bus_id') }}">
                                                    <option value="">Select Bus</option>
                                                    @foreach ($buses as $bus)
                                                        <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Continue with the rest of the form fields -->

                            <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>

                            <button type="submit" name="action" value="confirm" class="btn btn-primary">Confirm & Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
