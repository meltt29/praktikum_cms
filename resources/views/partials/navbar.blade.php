<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('films.index') }}">Manajemen Film</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('films.index') }}">Film</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Genre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sutradara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Aktor</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <span class="nav-link text-light">Hai, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white" style="text-decoration: none;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
