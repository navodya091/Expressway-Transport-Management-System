@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-info text-white">Bus Information</div>
                                    <div class="card-body"> -->
                                        <!-- Form to add or edit bus information -->
                                        <!-- <form> -->
                                            <!-- Fields for bus attributes, number, etc. -->
                                            <!-- <div class="form-group">
                                                <label for="busNumber">Bus Number</label>
                                                <input type="text" class="form-control" id="busNumber" name="busNumber">
                                            </div> -->
                                            <!-- Add more fields as needed -->

                                            <!-- <button type="submit" class="btn btn-success">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-success text-white">List of Buses</div>
                                    <div class="card-body">
                                        <!-- Display a table with a list of buses -->
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Bus Number</th>
                                                    <!-- Add more columns as needed -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($buses as $bus)
                                                <p>Bus Number: {{ $bus->bus_number }}</p>
                                                <!-- Add more bus attributes here -->
                                            @endforeach
                                            </tbody>
                                        </table>
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
