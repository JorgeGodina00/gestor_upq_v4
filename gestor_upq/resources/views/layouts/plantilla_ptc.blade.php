<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('css/plantilla.css')}}">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/plantilla.js') }}"></script>
    <title> Gestor UPQ</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{asset('assets/logo.png')}}">
            </div>

            <span class="logo_name">Gestor UPQ</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                
                <li><a href="/tutoria">
                    <i class="uil uil-graduation-cap"></i>
                    <span class="link-name">Tutoria</span>
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
            </ul>
            <ul class="user-data">
                <div class="user">
                    Nombre:
                    <br> 
                    Rol:
                    <br> 
                    Fecha Actual: 
                    <br> 
                    <div class="bar-progress">
                        <h1>Progreso General del Perfil</h1>
                        <progress value="50" max="100"></progress>
                        
                    </div>
                </div>
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