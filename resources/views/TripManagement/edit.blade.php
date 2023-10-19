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
                        <form action="{{ route('trip.update',$trip->id) }}" method="POST">
                            @csrf
                        
                                <div class="card">
                                    <div class="card-header bg-primary text-white">{{$trip->direction}}</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="{{$trip->direction}}_arrival_time">Arrival Time</label>
                                                    <input type="time" name="{{ $trip->direction }}_arrival_time" class="form-control" value="{{ $trip->arrival_time ?? old($trip->direction . '_arrival_time') }}">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="{{$trip->direction}}_departure_time">Departure Time</label>
                                                    <input type="time" name="{{ $trip->direction }}_departure_time" class="form-control" value="{{ $trip->departure_time ?? old($trip->direction . '_departure_time') }}">

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="{{$trip->direction}}_bus_id">Assign Bus</label>
                                                    <select name="{{ $trip->direction }}_bus_id" class="form-control">
                                                        <option value="">Select Bus</option>
                                                        @foreach ($buses as $bus)
                                                            <option value="{{ $bus->id }}" @if($bus->id == $trip->bus_id) selected @endif>{{ $bus->bus_number }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <button type="submit" name="action" value="confirm" class="btn btn-primary">Update Trip</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
