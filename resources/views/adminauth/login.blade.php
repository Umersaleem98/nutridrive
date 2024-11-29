<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styling */
        body {
            background-color: #f8f9fa; /* Light background for contrast */
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #4B1B6D;
            border-color: #4B1B6D;
        }
        .btn-primary:hover {
            background-color: #3a1555;
            border-color: #3a1555;
        }
        .form-label {
            color: #4B1B6D;
            font-weight: bold;
        }
        .login-logo img {
            width: 80px;
            height: auto;
        }
        .card-title {
            color: #4B1B6D;
            font-weight: bold;
        }
        a {
            color: #4B1B6D;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body style="background-color: #9b64c2">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <!-- Logo Section -->
            <div class="text-center login-logo mb-3">
                <img src="{{ asset('templates/images/logo.png') }}" alt="Logo">
            </div>
            <!-- Form Title -->
            <h3 class="text-center card-title mb-4">Admin Dashboard Login</h3>
            <!-- Login Form -->
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>

                <!-- Register Link -->
                <div class="text-center mt-3">
                    {{-- <small>Don't have an account? <a href="{{ url('register') }}">Register</a></small> --}}
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
