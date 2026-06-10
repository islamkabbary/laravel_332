<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Clone - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('style')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">amaz<span>on</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex flex-grow-1 mx-lg-4 my-2 my-lg-0 search-group">
                    <input class="form-control" type="search" placeholder="Search Amazon">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">
                            <div style="line-height: 1.2;">
                                <small style="font-size: 11px;">Hello, Sign in</small><br>
                                <span style="font-weight: 700;">Account & Lists</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <div style="line-height: 1.2;">
                                <small style="font-size: 11px;">Returns</small><br>
                                <span style="font-weight: 700;">& Orders</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link cart-icon" href="cart.html">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-badge">3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="text-center py-4">
        <div class="mb-2">
            <a href="#" class="mx-2">Conditions of Use</a>
            <a href="#" class="mx-2">Privacy Notice</a>
            <a href="#" class="mx-2">Help</a>
        </div>
        <p>&copy; 1996-2026, Amazon.com, Inc. or its affiliates</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('script')
</body>

</html>
