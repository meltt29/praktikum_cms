@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        background: linear-gradient(135deg,rgb(41, 67, 198), #8ca6db);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        max-width: 400px;
        margin: 80px auto;
        background: rgba(255, 255, 255, 0.1);
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(8px);
        color: white;
    }

    .login-container h3 {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-container .form-control {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        color: #fff;
    }

    .login-container .form-control::placeholder {
        color: #e0e0e0;
    }

    .login-container .form-control:focus {
        background-color: rgba(255, 255, 255, 0.3);
        border-color: #ddd;
        box-shadow: none;
    }

    .login-container .btn-primary {
        width: 100%;
        border-radius: 25px;
        padding: 10px;
        background-color: #3346a8;
        border: none;
    }

    .icon-input {
        position: relative;
    }

    .icon-input i {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        color: #ccc;
    }

    .icon-input input {
        padding-left: 35px;
    }

    .remember-me {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        margin-top: 10px;
        color: #ddd;
    }
</style>

<div class="login-container">
    <h3>Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3 icon-input">
            <i class="bi bi-person-fill"></i>
            <input type="email" name="email" class="form-control" placeholder="Email ID" required>
        </div>

        <div class="mb-3 icon-input">
            <i class="bi bi-lock-fill"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="remember-me mb-3">
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <a href="#" style="color: #ccc;">Forgot Password?</a>
        </div>

        <button class="btn btn-primary">LOGIN</button>
    </form>
</div>
@endsection
