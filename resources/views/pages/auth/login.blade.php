<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="min-vh-100 d-flex justify-content-center align-items-center p-3">
    <div class="bg-white shadow border rounded p-4 p-lg-5 w-100" style="max-width: 450px;">

        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="h3 mb-0">Sign in to our platform</h1>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login.process') }}" method="POST" class="mt-4">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="form-label">Your Email</label>
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="example@company.com"
                       value="{{ old('email') }}"
                       required
                       autofocus>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="form-label">Your Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password"
                       required>
            </div>

            <!-- Remember Me -->
            <div class="mb-4 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <!-- Submit Button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-dark">Sign in</button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="text-center">
            <span class="fw-normal">
                Not registered?
                <a href="{{ route('register.form') }}" class="fw-bold">Create account</a>
            </span>
        </div>

    </div>
</div>

<!-- Bootstrap JS CDN (optional, untuk komponen interaktif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
