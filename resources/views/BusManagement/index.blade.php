@extends('layouts.app')

@section('content')
    <style>
       /* CSS file */

        .table th {
            font-size: 12px; /* Adjust the font size as needed */
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
                            <a href="{{route('bus.create')}}" class="btn btn-success">Create New Bus</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-success text-white">List of Buses</div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if($buses->count() > 0)
                                        <div class="card-body">
                                            <!-- Display a table with a list of buses -->
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Bus Number</th>
                                                        <th>Manufacturer</th>
                                                        <th>Seating Capacity</th>
                                                        <th>AC</th>
                                                        <th>Insuarance Expire Date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($buses as $bus)
                                                        <tr>
                                                            <td>{{ $bus->id }}</td>
                                                            <td>{{ $bus->bus_number }}</td>
                                                            <td>{{ $bus->busAttribute->manufacturer }}</td>
                                                            <td>{{ $bus->busAttribute->seating_capacity }}</td>
                                                            <td>
                                                                @if($bus->busAttribute->ac == 1)
                                                                    AC
                                                                @else
                                                                    Non AC
                                                                @endif
                                                            </td>

                                                            <td>{{ $bus->busAttribute->insurance_expireDate }}</td>
                                                            <td>
                                                             
                                                                <label class="switch">
                                                                    <input type="checkbox" id="busStatus{{ $bus->id }}"  @if($bus->status == \App\Models\Bus::ACTIVE_BUS) checked @endif>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <!-- Action buttons -->
                                                                <div class="btn-group">
                                                                    <a href="{{ route('bus.show', $bus->id) }}" class="btn btn-primary btn-sm icon-button">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('bus.edit', $bus->id) }}" class="btn btn-warning btn-sm icon-button">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('bus.delete', $bus->id) }}" class="btn btn-danger btn-sm icon-button delete-button" id="delete">
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
                                                @if($buses->count() > 0){{ $buses->links('pagination') }}@endif
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
       
        const checkboxId = $(this).attr('id');
        const newStatus = this.checked ? 1 : 0;
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: 'bus/update-bus-status', 
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: JSON.stringify({ newStatus, busId: checkboxId.replace('busStatus', '') }),
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
