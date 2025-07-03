@extends('layouts.auth')

@section('title', 'Login')

@section('head')
<style>
    body {
        background: #232323 !important;
    }
    .btn-netflix {
        background: #e50914 !important;
        color: #fff !important;
        font-weight: 700;
        font-size: 1.1rem;
        border: none;
        border-radius: 2rem;
        padding: 10px;
        box-shadow: 0 2px 8px rgba(20,20,20,0.12);
        transition: background 0.2s;
    }
    .btn-netflix:hover, .btn-netflix:focus {
        background: #b0060f !important;
        color: #fff !important;
    }
</style>
@endsection

@section('content')
<div class="login-container" style="max-width:400px;width:100%;margin:0 auto;background:rgba(30,30,30,0.98);padding:36px 32px 28px 32px;border-radius:1.2rem;box-shadow:0 8px 32px 0 rgba(20,20,20,0.37);">
    <h3 class="text-center mb-4 fw-bold" style="color:#e50914;letter-spacing:1px;">LOGIN</h3>
    @if ($errors->any())
        <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3 position-relative">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus autocomplete="username">
            <i class="bi bi-person-fill position-absolute" style="left:12px;top:50%;transform:translateY(-50%);color:#bbb;"></i>
        </div>
        <div class="mb-3 position-relative">
            <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
            <i class="bi bi-lock-fill position-absolute" style="left:12px;top:50%;transform:translateY(-50%);color:#bbb;"></i>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3" style="font-size:14px;">
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" style="color:#bbb;">Remember me</label>
            </div>
            <a href="/reset-password" style="color:#bbb;text-decoration:underline;">Forgot Password?</a>
        </div>
        <button class="btn btn-netflix w-100" type="submit">Login</button>
    </form>
    <div class="text-center mt-3">
        <a href="/register" style="color:#bbb;text-decoration:underline;">Belum punya akun? Register</a>
    </div>
</div>
@endsection
