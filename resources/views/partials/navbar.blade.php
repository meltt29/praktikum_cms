<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold" style="cursor:default;font-size:1.7rem;letter-spacing:1px;text-transform:uppercase;color:#fff;text-shadow:0 2px 8px #000,0 1px 0 #e50914;user-select:none;">
            FILM<span style="color:#e50914;">KU</span>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('films.index') }}" style="font-size:1.25rem;">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center">
                @auth
                    <li class="nav-item">
                        <span class="nav-link text-light" style="font-size:1.25rem;">Hai, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:1.25rem;">
                            <i class="bi bi-gear"></i> Pengaturan
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('background.edit') }}"><i class="bi bi-image"></i> Upload Background</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white" style="text-decoration: none; font-size:1.25rem;">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="font-size:1.25rem;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register" style="font-size:1.25rem;">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- Bootstrap Icons CDN for moon icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
