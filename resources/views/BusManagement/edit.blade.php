@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">Update Bus</div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('bus.update',$bus->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="bus_number">Bus Number <span style="color: red;">*</span></label>
                                <input type="text" name="bus_number" class="form-control{{ $errors->has('bus_number') ? ' is-invalid' : '' }}" value = {{$bus->bus_number ?? old('bus_number')}} >
                                @if ($errors->has('bus_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bus_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="driver_id">Assign Driver <span style="color: red;">*</span></label>
                                <select name="driver_id" class="form-control{{ $errors->has('driver_id') ? ' is-invalid' : '' }}">
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}" {{ (old('driver_id', $bus->driver_id) == $driver->id) ? 'selected' : '' }}>
                                            {{ $driver->first_name . ' ' . $driver->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('driver_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driver_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ac">AC/Non-AC <span style="color: red;">*</span></label>
                                <select name="ac" class="form-control{{ $errors->has('ac') ? ' is-invalid' : '' }}" value = {{$bus->busAttribute->ac ?? old('ac')}} >
                                    <option value="1">AC</option>
                                    <option value="0">Non AC</option>
                                </select>
                                @if ($errors->has('ac'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ac') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Manufacturer <span style="color: red;">*</span></label>
                                <input type="text" name="manufacturer" class="form-control{{ $errors->has('manufacturer') ? ' is-invalid' : '' }}" value = {{$bus->busAttribute->manufacturer ?? old('manufacturer')}} >
                                @if ($errors->has('manufacturer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="manufacture_year">Manufacture Year <span style="color: red;">*</span></label>
                                <select name="manufacture_year" class="form-control{{ $errors->has('manufacture_year') ? ' is-invalid' : '' }}" value = {{$bus->busAttribute->manufacture_year ?? old('manufacture_year')}} >
                                @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 30; // Change this number to specify the start year
                                @endphp
                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                                </select>
                                @if ($errors->has('manufacture_year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manufacture_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="seating_capacity">Seating Capacity <span style="color: red;">*</span></label>
                                <input type="number" name="seating_capacity" class="form-control{{ $errors->has('seating_capacity') ? ' is-invalid' : '' }}" value = {{$bus->busAttribute->seating_capacity ?? old('seating_capacity')}} >
                                @if ($errors->has('seating_capacity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('seating_capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="insurance_expire_date">Insurance Expire Date <span style="color: red;">*</span></label>
                                <input type="date" name="insurance_expire_date" class="form-control{{ $errors->has('insurance_expire_date') ? ' is-invalid' : '' }}" value = {{$bus->busAttribute->insurance_expireDate ?? old('insurance_expire_date')}} >
                                @if ($errors->has('insurance_expire_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('insurance_expire_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="fuel_type">Fuel Type <span style="color: red;">*</span></label>
                                <select name="fuel_type" class="form-control{{ $errors->has('fuel_type') ? ' is-invalid' : '' }}">
                                    <option value="diesel"{{ old('fuel_type', $bus->busAttribute->fuel_type) === 'diesel' ? ' selected' : '' }}>Diesel</option>
                                    <option value="super_diesel"{{ old('fuel_type', $bus->busAttribute->fuel_type) === 'super_diesel' ? ' selected' : '' }}>Super Diesel</option>
                                </select>

                                @if ($errors->has('fuel_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fuel_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update Bus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
