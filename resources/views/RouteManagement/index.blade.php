@extends('layouts.app')

@section('content')
    <style>
       /* CSS file */

        .table th {
            font-size: 12px; /* Adjust the font size as needed */
        }

        .create-button {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="create-button">
                            <a href="{{route('route.create')}}" class="btn btn-success">Create New Route</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-success text-white">List of Routes</div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if($routes->count() > 0)
                                        <div class="card-body">
                                            <!-- Display a table with a list of routes -->
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Route Number</th>
                                                        <th>Description</th>
                                                        <th>Start Outbound</th>
                                                        <th>End Outbound</th>
                                                        <th>Start Inbound</th>
                                                        <th>End Inbound</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($routes as $route)
                                                        <tr>
                                                            <td>{{ $route->id }}</td>
                                                            <td>{{ $route->route_number }}</td>
                                                            <td>{{ $route->description }}</td>
                                                            <td>{{ $route->startOutboundCity->city_name}}</td>
                                                            <td>{{ $route->endOutboundCity->city_name}}</td>
                                                            <td>{{ $route->startInboundCity->city_name}}</td>
                                                            <td>{{ $route->endInboundCity->city_name}}</td>
                                                            <td>
                                                                <!-- Toggle button for status -->
                                                                <label class="switch">
                                                                    <input type="checkbox" id="routeStatus{{ $route->id }}"  @if($route->status == \App\Models\Route::ACTIVE_ROUTE) checked @endif>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <!-- Action buttons -->
                                                                <a href="#" class="btn btn-primary">View</a>
                                                                <a href="{{route('route.edit',$route->id)}}" class="btn btn-warning">Edit</a>
                                                                <a href="{{route('trip.create',$route->id)}}" class="btn btn-danger">Add Trip</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                <!-- Pagination links -->
                                                @if($routes->count() > 0){{ $routes->links('pagination') }}@endif
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
<script>
    $(document).ready(function() {
    // Attach a change event handler to the checkbox
    $('input[type="checkbox"]').on('change', function() {
        // Get the ID of the clicked checkbox
        const checkboxId = $(this).attr('id');
        const newStatus = this.checked ? 1 : 0;
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: 'route/update-route-status', // Adjust the URL to match your route
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: JSON.stringify({ newStatus, routeId: checkboxId.replace('routeStatus', '') }),
            contentType: 'application/json',
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    // Display a SweetAlert2 success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.success,
                    });
                    // You can update the UI elements or take other actions on success
                } else {
                    // Display a SweetAlert2 error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error,
                    });
                    // You can show an error message or handle the error in the UI
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
