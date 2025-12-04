@extends('layout.app')

@section('content')
<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">

    <div class="text-center text-md-center mb-4 mt-md-0">
        <h1 class="mb-0 h3">Sign in to our platform</h1>
    </div>

    {{-- VALIDATION ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- LOGIN FORM --}}
    <form action="{{ route('login.process') }}" method="POST" class="mt-4">
        @csrf

        {{-- EMAIL --}}
        <div class="form-group mb-4">
            <label for="email">Your Email</label>
            <div class="input-group">
                <span class="input-group-text">
                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                </span>

                <input type="email"
                       id="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="example@company.com"
                       value="{{ old('email') }}"
                       required autofocus>
            </div>
        </div>

        {{-- PASSWORD --}}
        <div class="form-group mb-4">
            <label for="password">Your Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </span>

                <input type="password"
                       id="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password"
                       required>
            </div>
        </div>

        {{-- REMEMBER --}}
        <div class="d-flex justify-content-between align-items-top mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="d-grid">
            <button type="submit" class="btn btn-gray-800">Sign in</button>
        </div>
    </form>

    {{-- REGISTER LINK --}}
    <div class="d-flex justify-content-center align-items-center mt-4">
        <span class="fw-normal">
            Not registered?
            <a href="{{ route('register.form') }}" class="fw-bold">Create account</a>
        </span>
    </div>

</div>
@endsection
