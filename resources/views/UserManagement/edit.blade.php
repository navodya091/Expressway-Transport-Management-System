@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Edit User</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="first_name">First Name <span style="color: red;">*</span></label>
                            <input type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name', $user->first_name) }}">
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name <span style="color: red;">*</span></label>
                            <input type="text" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name', $user->last_name) }}">
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $user->email) }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone <span style="color: red;">*</span></label>
                            <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone', $user->phone) }}">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nic">NIC <span style="color: red;">*</span></label>
                            <input type="text" name="nic" class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}" value="{{ old('nic', $user->nic) }}">
                            @if ($errors->has('nic'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nic') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="user_type">User Type <span style="color: red;">*</span></label>
                            <select name="user_type" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}">
                                <option value="">Select User Type</option>
                                @foreach ($userTypes as $userType)
                                    <option value="{{ $userType->id }}"{{ old('user_type', $user->user_type_id) === $userType->id ? ' selected' : '' }}>
                                        {{ ucfirst($userType->user_type) }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_type') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
