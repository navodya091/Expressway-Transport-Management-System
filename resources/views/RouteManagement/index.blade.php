@extends('layouts.app')

@section('content')
    <style>
       /* CSS file */

        .table th {
            font-size: 12px; 
        }
        
        .icon-button {
            margin-right: 10px;
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
                                                            <td>{{ isset($route->startOutboundCity) ? $route->startOutboundCity->city_name : ''}}</td>
                                                            <td>{{ isset($route->endOutboundCity) ? $route->endOutboundCity->city_name : ''}}</td>
                                                            <td>{{ isset($route->startInboundCity) ? $route->startInboundCity->city_name : ''}}</td>
                                                            <td>{{ isset($route->endInboundCity) ? $route->endInboundCity->city_name : ''}}</td>
                                                            <td>
                                                               
                                                                <label class="switch">
                                                                    <input type="checkbox" id="routeStatus{{ $route->id }}"  @if($route->status == \App\Models\Route::ACTIVE_ROUTE) checked @endif>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                            <div class="btn-group">
                                                                <a href="{{ route('route.show', $route->id) }}" class="btn btn-primary btn-sm icon-button">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('route.edit', $route->id) }}" class="btn btn-warning btn-sm icon-button">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="{{ route('trip.create', $route->id) }}" class="btn btn-success btn-sm icon-button">
                                                                    <i class="fas fa-plus"></i>
                                                                </a>
                                                                <a href="{{ route('route.delete', $route->id) }}" id="delete" class="btn btn-danger btn-sm icon-button delete-button">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>

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
 
    $('input[type="checkbox"]').on('change', function() {
        // Get the ID of the clicked checkbox
        const checkboxId = $(this).attr('id');
        const newStatus = this.checked ? 1 : 0;
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: 'route/update-route-status', 
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
                   
                } else {
                    // Display a SweetAlert2 error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error,
                    });
                    
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});

</script>
