<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Learning Platform for Kids</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @stack('css')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Smart Learning</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        @if (Auth::check())
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-outline-primary me-2" href="{{ route('auth.register.view') }}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary" href="{{ route('auth.login.view') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="{{ route('home') }}">Home</a>
                </div>

                <div class="social-links">
                    <a href="#" class="social-link">
                        <img src="https://cdn-icons-png.flaticon.com/512/3128/3128304.png" alt="Facebook"
                            width="24" height="24" />
                    </a>
                    <a href="#" class="social-link">
                        <img src="https://cdn-icons-png.flaticon.com/512/3128/3128310.png" alt="Twitter"
                            width="24" height="24" />
                    </a>
                </div>

                <p>© {{ date('Y') }} Smart Learning - All rights reserved</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/animations.js') }}"></script>
    @stack('js')
</body>
</html>
