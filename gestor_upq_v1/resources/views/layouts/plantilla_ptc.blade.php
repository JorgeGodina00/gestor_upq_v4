<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/plantilla.js') }}"></script>
    <title>Gestor UPQ</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{ asset('assets/logo.png') }}">
            </div>
            <span class="logo_name">Gestor UPQ</span>
        </div>
        <br>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="/dashboard">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Inicio</span>
                </a></li>
                <li><a href="/perfil">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Perfil</span>   
                </a></li>                
                <li><a href="/tutoria">
                    <i class="uil uil-graduation-cap"></i>
                    <span class="link-name">Tutoría</span>
                </a></li>
                <li><a href="/docencia">
                    <i class="uil uil-book-open"></i>
                    <span class="link-name">Docencia</span>
                </a></li>
                <li><a href="/investigacion">
                    <i class="uil uil-notes"></i>
                    <span class="link-name">Investigación</span>
                </a></li>
                <li><a href="/gestion">
                    <i class="uil uil-flask"></i>
                    <span class="link-name">Gestión</span>
                </a></li>
                <li><a href="/biblioteca">
                    <i class="uil uil-book-alt"></i>
                    <span class="link-name">Biblioteca</span>
                </a></li>
            </ul>
            <ul class="user-data">
                <li>
                    <div class="user">
                        <span>Nombre: {{ Auth::user()->name }}</span><br>
                        <span>Rol: {{ Auth::user()->role }}</span><br>
                        <span>Fecha Actual: {{ now()->format('Y-m-d') }}</span><br>
                        <span>Hora Actual: {{ now()->format('H:i:s') }}</span>
                    </div>
                </li>
            </ul> 
            <ul class="logout-mode">
                @auth
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Salir</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <footer class="footer bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p>&copy; 2024 UPQ. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Aquí puedes añadir otros scripts si los necesitas -->
</body>
</html>
