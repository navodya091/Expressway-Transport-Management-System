<!DOCTYPE html>
<html>
<head>
    <title>Expressway Transportation Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #fff;
            margin: 20px auto;
            display: block;
        }
        .company-name {
            font-size: 24px;
            margin: 20px 0;
        }
        .description {
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto;
        }
        .contact-details {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            margin: 20px;
        }
        .contact-details h2 {
            font-size: 24px;
            margin: 0;
        }
        .contact-info {
            font-size: 16px;
        }
        .text-end {
            text-align: right; /* Align content to the right */
            margin-right: 20px; /* Add some right margin for spacing */
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="text-end"> <!-- Add the new div for right alignment -->
            @if(Auth::check()) <!-- Check if user is authenticated -->
                <a href="" class="btn btn-danger">Logout</a>
            @else
                <a href="" class="btn btn-primary">Login</a>
            @endif
        </div>
        <img src="{{ asset('images/logo.jpg') }}" alt="Company Logo" class="logo">
        <h1 class="company-name">Expressway Transportation Management</h1>
        <p class="description">We provide efficient transportation solutions for your needs.</p>
    </div>
    
    <div class="contact-details">
        <h2>Contact Details</h2>
        <p class="contact-info">Address: 123 Main Street, City, Country</p>
        <p class="contact-info">Phone: (123) 456-7890</p>
        <p class="contact-info">Email: info@expresswaytransportation.com</p>
    </div>
</body>
</html>
