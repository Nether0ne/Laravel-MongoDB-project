<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body class="antialiased bg-dark text-white">
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="/games" class="nav-link px-2 text-white">Games</a></li>
                    <li><a href="/categories" class="nav-link px-2 text-white">Categories</a></li>
                    <li><a href="/users" class="nav-link px-2 text-white">Users</a></li>
                    @if(Auth::check())
                        <li><a href="/user/{{\Illuminate\Support\Facades\Auth::id()}}" class="nav-link px-2 text-white">My profile</a></li>
                        <li><a href="/library" class="nav-link px-2 text-white">My games</a></li>
                        <li class="nav-link px-2 text-white">Balance: {{\Illuminate\Support\Facades\Auth::user()->balance}} UAH</li>
                    @endif
                </ul>

                <div class="text-end">
                    @if(!Auth::check())
                        <a href="/login" class="btn btn-outline-light me-2" role="button">Login</a>
                    @else
                        <a href="/logout" class="btn btn-outline-light me-2" role="button">Logout</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        @yield("main_content")
    </div>
    <footer class="pt-3 mt-4 text-muted">
        <div class="container text-center">
            © 2021
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
