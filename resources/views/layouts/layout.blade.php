<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,300;1,500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('./css/main.css')}}">
    <title>Propio Mercado - @yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-main shadow-sm">
            <div class="container">
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    Propio Mercado
                </a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/admin/index" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <ul class="menu-ul">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a>
                                        </li>
                                    </ul>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <header>
        <!-- Logo -->
        <nav class="navbar navbar-light bg-main">
            <div class="container p-4">
                <a class="navbar-brand m-auto" href="#">
                    <img src="{{ asset('images/logoNew.png') }}" width="120" alt="" loading="lazy">
                </a>
            </div>
        </nav>
    </header>
    <section class="container-fluid content">
        <!-- Menu Principal-->
        <!-- Categorías -->
        <div class="row justify-content-center bg-menu">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    <a href="/" class="mx-3 pb-3 link-category d-block d-md-inline category txt-white-menu">Home</a>
                    <a href="/products" class="mx-3 pb-3 link-category d-block d-md-inline category txt-white-menu">Productos</a>

                    <li class="nav-item dropdown mx-3 pb-3 link-category d-block d-md-inline">
                        <a id="navbarDropdown" class="dropdown-toggle txt-white-menu" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categorías
                        </a>

                        <div class="dropdown-menu bg-menu" aria-labelledby="navbarDropdown">
                            <ul class="menu-ul">
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('products.category', $category->name) }}"
                                        class="mx-3 pb-3 link-category d-block d-md-inline txt-white-menu dropdown-item">{{ $category->name }}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </li>

                </nav>
            </div>
        </div>
        <!-- Fin Menu Principal-->


        <!-- Contenido -->
        <main>
            @yield('contenido')  @section('contenido')
        </section>
        </main>
        <!-- Contenido fin -->

        <!-- footer -->
        @extends('layouts.footer')
        <!-- footer fin -->

        <div class="social">
            <ul>
              <li><a href="https://www.instagram.com/propiomercado/" target="_blank" class="icon-instagram"><img src="{{asset('./images/instagram.png')}}" alt="logo instagram"></a></li>
              <br>
              <li><a href="https://api.whatsapp.com/send?phone=541150174517&text=%C2%A1Hola%20somos%20Propio%20Mercado!%20%C2%BFEn%20qu%C3%A9%20podemos%20ayudarte?" target="_blank" class="icon-instagram"><img src="{{asset('./images/whatsapp.png')}}" alt="logo whatsapp"></a></li>
              <br>
              <li><a href="https://www.rappi.com.ar/tiendas/167409-propio-mercado-cte" target="_blank" class="icon-instagram"><img src="{{asset('./images/rappi-logo.png')}}" alt="logo Rappi"></a></li>
            </ul>
          </div>
    </body>

    </html>
