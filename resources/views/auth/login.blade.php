<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
        .card-header {
            background-color: #f8f8f8;
            color: #3A1555;
            text-align: center;
        }
        .card-header img {
            width: 100px; /* Adjust logo size */
            height: auto;
        }
        .btn-success {
            background-color: #4B1B6D;
            border-color: #4B1B6D;
        }
        .btn-success:hover {
            background-color: #3a1555;
            border-color: #3a1555;
        }
        .form-label {
            color: #4B1B6D;
            font-weight: bold;
        }
        .text-decoration-none {
            color: #4B1B6D;
        }
        .text-decoration-none:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body style="background-color: #9b64c2">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <!-- Logo -->
                        <img src="{{ asset('templates/images/logo.png') }}" alt="Logo" class="bg-light">  <!-- Replace with your logo path -->
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('userlogin') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="{{ url('userregister') }}" class="text-decoration-none">Don't have an account? Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
