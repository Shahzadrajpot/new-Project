<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .register-card {
            max-width: 480px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow register-card">
            <div class="card-body p-4">

                <h3 class="text-center mb-4 fw-bold">Create Account</h3>
                {{-- Success Message --}}
                @include('partials.alerts')
                @yield('content')

                {{-- Validation Error Messages --}}

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/registerUser') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>




                    <!-- Submit -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Register
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center mt-3">
                        Already have an account?
                        <a href="{{ URL::to('/login') }}">Login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
