@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">Dashboard</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">  
                                <div class="card mb-3">
                                    <div class="card-header bg-success text-white">Total Buses</div>
                                        <div class="card-body">
                                            <h3 class="text-center">{{$data['buses']}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-header bg-warning text-white">Total Data Entry Users</div>
                                    <div class="card-body">
                                        <h3 class="text-center">{{$data['data_entry_users']}}</h3> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-header bg-danger text-white">Total Drivers</div>
                                    <div class="card-body">
                                        <h3 class="text-center">{{$data['drivers']}}</h3> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
