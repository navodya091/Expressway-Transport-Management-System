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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-success text-white">List of Trips</div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if($trips->count() > 0)
                                        <div class="card-body">
                                            <!-- Display a table with a list of trips -->
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Route</th>
                                                        <th>Bus Number</th>
                                                        <th>departure_time</th>
                                                        <th>arrival_time</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($trips as $trip)
                                                        <tr>
                                                            <td>{{ $trip->id }}</td>
                                                            <td>{{ $trip->route_id }}</td>
                                                            <td>{{ isset($trip->bus) ? $trip->bus->bus_number : '' }}</td>
                                                            <td>{{ $trip->departure_time }}</td>
                                                            <td>{{ $trip->arrival_time }}</td>
                                                            <td>
                                                              
                                                                <label class="switch">
                                                                    <input type="checkbox" id="tripStatus{{ $trip->id }}"  @if($trip->status == \App\Models\Trip::ACTIVE_TRIP) checked @endif>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <!-- Action buttons -->
                                                                <div class="btn-group">
                                                                    <a href="{{ route('trip.show', $trip->id) }}" class="btn btn-primary btn-sm icon-button">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('trip.edit', $trip->id) }}" class="btn btn-warning btn-sm icon-button">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('trip.delete', $trip->id) }}" class="btn btn-danger btn-sm icon-button delete-button" id="delete">
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
                                                @if($trips->count() > 0){{ $trips->links('pagination') }}@endif
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
            url: 'trip/update-trip-status', // Adjust the URL to match your trip
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: JSON.stringify({ newStatus, tripId: checkboxId.replace('tripStatus', '') }),
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
