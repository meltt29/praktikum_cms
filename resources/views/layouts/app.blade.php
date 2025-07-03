<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Filmku')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #141414;
            color: #fff;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }
        .navbar {
            background: transparent !important;
            border-bottom: none !important;
            box-shadow: none !important;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }
        .btn-netflix {
            background: #e50914;
            color: #fff;
            border: none;
        }
        .btn-netflix:hover {
            background: #b0060f;
            color: #fff;
        }
        .card {
            background: #222;
            color: #fff;
            border: none;
        }
        .form-control, .form-select {
            background: #333;
            color: #fff;
            border: 1px solid #444;
        }
        .form-control:focus, .form-select:focus {
            background: #222;
            color: #fff;
        }
        .alert {
            border-radius: 0.5rem;
        }
        .toggle-darkmode {
            cursor: pointer;
            color: #e50914;
            font-size: 1.3rem;
        }
        .navbar .navbar-brand,
        .navbar .nav-link,
        .navbar .dropdown-toggle,
        .navbar .dropdown-item {
            color: #fff !important;
            font-size: 1.15rem;
            font-weight: 600;
            text-shadow: 0 1px 6px rgba(0,0,0,0.7);
            letter-spacing: 0.5px;
        }
        .navbar .nav-link.active, .navbar .nav-link:focus, .navbar .nav-link:hover {
            color: #e50914 !important;
            text-shadow: 0 2px 8px rgba(0,0,0,0.8);
        }
        .navbar .navbar-brand {
            font-size: 1.7rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.8);
            text-transform: uppercase;
        }
        .dropdown-menu {
            background: #fff !important;
            border-radius: 0.5rem;
            min-width: 180px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.15);
        }
        .dropdown-item {
            color: #111 !important;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }
        .dropdown-item:active, .dropdown-item:focus, .dropdown-item:hover {
            background: #e50914 !important;
            color: #fff !important;
        }
        .filter-bar .form-control,
        .filter-bar .form-select {
            background: #222 !important;
            color: #fff !important;
            border: 1px solid #444 !important;
            font-size: 1rem;
        }
        .filter-bar .form-control::placeholder {
            color: #bbb !important;
            opacity: 1;
        }
        .filter-bar .btn-netflix {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .btn-outline-light {
            background: transparent !important;
            color: #fff !important;
            border: 1.5px solid #fff !important;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-outline-light:hover, .btn-outline-light:focus {
            background: #fff !important;
            color: #141414 !important;
            border-color: #fff !important;
        }
        .btn-outline-light[style*="color:#e50914"] {
            border-color: #e50914 !important;
            color: #e50914 !important;
        }
        .btn-outline-light[style*="color:#e50914"]:hover, .btn-outline-light[style*="color:#e50914"]:focus {
            background: #e50914 !important;
            color: #fff !important;
            border-color: #e50914 !important;
        }
        h1, h2, h3, h4, h5, h6, .navbar, .btn, .form-control, .form-select, .dropdown-menu, .card, .alert {
            font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        }
    </style>
    @yield('head')
</head>
<body>
    @include('partials.navbar')
    <div class="container-fluid px-3 py-3">
        <div style="position:fixed;top:24px;left:0;right:0;z-index:1050;display:flex;justify-content:center;pointer-events:none;">
            @if(session('success'))
                <div class="alert alert-success text-center shadow" style="max-width:420px;width:90vw;border-radius:1rem;pointer-events:auto;">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger text-center shadow" style="max-width:420px;width:90vw;border-radius:1rem;pointer-events:auto;">
                    {{ $errors->first() }}
                </div>
            @endif
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
          return new bootstrap.Dropdown(dropdownToggleEl);
        });
        setTimeout(function() {
          document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = 0;
            setTimeout(function() { alert.remove(); }, 500);
          });
        }, 3000);
      });
    </script>
    @yield('scripts')
</body>
</html>
