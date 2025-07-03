@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="register-container" style="max-width:400px;width:100%;margin:0 auto;background:rgba(30,30,30,0.98);padding:36px 32px 28px 32px;border-radius:1.2rem;box-shadow:0 8px 32px 0 rgba(20,20,20,0.37);">
    <h3 class="text-center mb-4 fw-bold" style="color:#e50914;letter-spacing:1px;">REGISTER</h3>
    @if ($errors->any())
        <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="/register">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nama" required autofocus autocomplete="name">
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="username">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required autocomplete="new-password">
        </div>
        <button class="btn btn-netflix w-100" style="border-radius:2rem;padding:10px;font-weight:600;letter-spacing:1px;font-size:1.1rem;">Register</button>
    </form>
    <div class="text-center mt-3">
        <a href="/login" style="color:#bbb;text-decoration:underline;">Sudah punya akun? Login</a>
    </div>
</div>
@endsection
