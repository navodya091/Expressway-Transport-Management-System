@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">View Bus</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bus_number">Bus Number <span style="color: red;">*</span></label>
                            <input type="text" name="bus_number" class="form-control{{ $errors->has('bus_number') ? ' is-invalid' : '' }}" value = "{{$bus->bus_number ?? old('bus_number')}}" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="driver_id">Assign Driver <span style="color: red;">*</span></label>
                            <select name="driver_id" class="form-control{{ $errors->has('driver_id') ? ' is-invalid' : '' }}" disabled>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ (old('driver_id', $bus->driver_id) == $driver->id) ? 'selected' : '' }}>
                                        {{ $driver->first_name . ' ' . $driver->last_name }}
                                    </option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="ac">AC/Non-AC <span style="color: red;">*</span></label>
                            <select name="ac" class="form-control{{ $errors->has('ac') ? ' is-invalid' : '' }}" value = "{{$bus->busAttribute->ac ?? old('ac')}}" disabled>
                                <option value="1">AC</option>
                                <option value="0">Non AC</option>
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer <span style="color: red;">*</span></label>
                            <input type="text" name="manufacturer" class="form-control{{ $errors->has('manufacturer') ? ' is-invalid' : '' }}" value = "{{$bus->busAttribute->manufacturer ?? old('manufacturer')}}" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="manufacture_year">Manufacture Year <span style="color: red;">*</span></label>
                            <select name="manufacture_year" class="form-control{{ $errors->has('manufacture_year') ? ' is-invalid' : '' }}" value ="{{$bus->busAttribute->manufacture_year ?? old('manufacture_year')}}" disabled>
                            @php
                                $currentYear = date('Y');
                                $startYear = $currentYear - 30; // Change this number to specify the start year
                            @endphp
                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="seating_capacity">Seating Capacity <span style="color: red;">*</span></label>
                            <input type="number" name="seating_capacity" class="form-control{{ $errors->has('seating_capacity') ? ' is-invalid' : '' }}" value = "{{$bus->busAttribute->seating_capacity ?? old('seating_capacity')}}" disabled>
                           
                        </div>
                        <div class="form-group">
                            <label for="insurance_expire_date">Insurance Expire Date <span style="color: red;">*</span></label>
                            <input type="date" name="insurance_expire_date" class="form-control{{ $errors->has('insurance_expire_date') ? ' is-invalid' : '' }}" value = "{{$bus->busAttribute->insurance_expireDate ?? old('insurance_expire_date')}}" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="fuel_type">Fuel Type <span style="color: red;">*</span></label>
                            <select name="fuel_type" class="form-control{{ $errors->has('fuel_type') ? ' is-invalid' : '' }}" disabled>
                                <option value="diesel"{{ old('fuel_type', $bus->busAttribute->fuel_type) === 'diesel' ? ' selected' : '' }}>Diesel</option>
                                <option value="super_diesel"{{ old('fuel_type', $bus->busAttribute->fuel_type) === 'super_diesel' ? ' selected' : '' }}>Super Diesel</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
