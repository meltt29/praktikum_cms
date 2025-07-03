<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - FILMKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #141414;
            color: #fff;
            min-height: 100vh;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .reset-container {
            max-width: 400px;
            width: 100%;
            margin: 48px auto;
            background: rgba(30,30,30,0.98);
            padding: 36px 32px 28px 32px;
            border-radius: 1.2rem;
            box-shadow: 0 8px 32px 0 rgba(20,20,20,0.37);
        }
        .reset-container h3 {
            text-align: center;
            margin-bottom: 28px;
            color: #e50914;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .reset-container .form-control {
            background-color: #222;
            border: 1.5px solid #333;
            color: #fff;
            border-radius: 0.7rem;
            font-size: 1rem;
        }
        .reset-container .form-control::placeholder {
            color: #bbb;
        }
        .reset-container .form-control:focus {
            background-color: #181818;
            border-color: #e50914;
            color: #fff;
            box-shadow: none;
        }
        .reset-container .btn-netflix {
            width: 100%;
            border-radius: 2rem;
            padding: 10px;
            background-color: #e50914;
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
            border: none;
            font-size: 1.1rem;
            margin-top: 10px;
        }
        .reset-container .btn-netflix:hover {
            background: #b0060f;
            color: #fff;
        }
        .reset-container .alert {
            border-radius: 0.7rem;
            font-size: 1rem;
            margin-bottom: 18px;
        }
        .reset-container a {
            color: #bbb;
            text-decoration: underline;
        }
        .reset-container a:hover {
            color: #e50914;
        }
    </style>
</head>
<body>
<div class="reset-container">
    <h3>RESET PASSWORD</h3>
    @if ($errors->any())
        <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="username">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password Baru" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru" required autocomplete="new-password">
        </div>
        <button class="btn btn-netflix">Reset Password</button>
    </form>
    <div class="text-center mt-3">
        <a href="/login">Kembali ke Login</a>
    </div>
</div>
</body>
</html> 