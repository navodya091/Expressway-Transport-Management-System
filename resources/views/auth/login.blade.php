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
        <img src="{{ asset('images/logo.jpg') }}" alt="Company Logo" class="logo">
        <h1 class="company-name">Expressway Transportation Management</h1>
        <p class="description">We provide efficient transportation solutions for your needs.</p>
    </div>
    
    <div style="max-width: 400px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;">
        <h1>Login</h1>
        
        @if ($errors->any())
            <div style="background-color: #ffcccc; padding: 10px; border-radius: 4px; margin-top: 20px;">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" style="margin-top: 20px;">
            @csrf
            <div style="margin-bottom: 20px;">
                <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <input type="password" name="password" id="password" placeholder="Password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div>
                <button type="submit" style="width: 100%; padding: 10px; background-color: #007BFF; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
