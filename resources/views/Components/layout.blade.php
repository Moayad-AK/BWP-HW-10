<!DOCTYPE html>
<html lang="en" class="mw-100 mh-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/Bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="mw-100 mh-100">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Online Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><x-nav-link href="{{ route('products.index') }}"
                            :active="request()->is('products')">Home</x-nav-link></li>
                    <li class="nav-item"><x-nav-link href="{{ route('about') }}" :active="request()->is('about')">About</x-nav-link>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li> --}}
                </ul>
                <div class="d-flex justify-content-end">
                        <a class="btn btn-outline-dark" href="/cartitems">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            {{-- $cartItemsCount --}}
                            {{-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> --}}
                        </a>
                    @guest
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item">
                                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            </li>
                        </ul>
                    @endguest
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ $userName }}</a>
                                <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                    <li class="nav-item ">
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button class="btn btn-outline-dark">Log Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    {{ $slot }}
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Website 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    {{-- <script src="js/scripts.js"></script> --}}
</body>

</html>
