@extends('layouts.app')

@section('content')
    <style>
        /* CSS file */

        .table th {
            font-size: 12px; 
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
                            <a href="{{ route('user.create') }}" class="btn btn-success">Create New User</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-success text-white">List of Users</div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if($users->count() > 0)
                                        <div class="card-body">
                                            <!-- Display a table with a list of users -->
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Phone</th>
                                                        <th>NIC</th>
                                                        <th>User Type</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->first_name }}</td>
                                                            <td>{{ $user->last_name }}</td>
                                                            <td>{{ $user->phone }}</td>
                                                            <td>{{ $user->nic }}</td>
                                                            <td>{{ $user->userType->user_type }}</td>
                                                            <td>
                                                                <!-- Toggle button for user status -->
                                                                <label class="switch">
                                                                    <input type="checkbox" id="userStatus{{ $user->id }}" @if($user->status == \App\Models\User::ACTIVE_USER) checked @endif>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <!-- Action buttons (You can link to user view, edit, and delete pages) -->
                                                                <a href="" class="btn btn-primary">View</a>
                                                                <a href="" class="btn btn-warning">Edit</a>
                                                                <!-- You can add a button for deleting users -->
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                <!-- Pagination links -->
                                                {{ $users->links('pagination') }}
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
                url: 'user/update-user-status', // Adjust the URL to match your route
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: JSON.stringify({ newStatus, userId: checkboxId.replace('userStatus', '') }),
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
