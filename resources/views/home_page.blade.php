@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('images/logo.jpg') }}" alt="Company Logo" class="logo" style="max-width: 250px; max-height: 250px;">
                                        <h2 class="company-name">Expressway Transportation Management</h2>
                                        <p class="contact-info">Address: 123 Main Street, City, Country</p>
                                        <p class="contact-info">Phone: (123) 456-7890</p>
                                        <p class="contact-info">Email: info@expresswaytransportation.com</p>
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
