@extends('layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-4">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md border border-gray-100">

        {{-- Header --}}
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                Create an Account
            </h2>
            <p class="text-gray-500 text-sm">
                Fill in your details to get started
            </p>
        </div>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <div class="flex items-center text-red-700 mb-1">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">Please fix the following:</span>
                </div>
                <ul class="text-sm text-red-600 pl-6 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            {{-- NAME FIELD --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Nama Lengkap
                </label>
                <input type="text" name="name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

            {{-- EMAIL FIELD --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium text-gray-700">
                    Email Address
                </label>
                <input type="email" name="email"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                       placeholder="contoh@email.com"
                       required>
            </div>

            {{-- PASSWORD FIELD --}}
            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">
                    Password
                </label>
                <input type="password" name="password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                       placeholder="Minimal 8 karakter"
                       required>
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Daftar
            </button>
        </form>

        {{-- LOGIN LINK --}}
        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
            <p class="text-gray-600 text-sm">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                   class="text-green-600 font-medium hover:text-green-800 hover:underline transition ml-1">
                    Login di sini
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
