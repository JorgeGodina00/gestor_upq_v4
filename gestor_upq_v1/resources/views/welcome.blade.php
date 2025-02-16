<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPQ | Gestor</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #681f1f !important;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-brand img {
            max-height: 40px; /* Ajusta el tamaño máximo del logo */
            margin-right: 10px; /* Añade un espacio entre el logo y el texto */
        }
        .logo_name {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .jumbotron {
            background-color: #051a30;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }
        .section {
            padding: 50px 0;
        }
        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .section-content {
            font-size: 18px;
        }
        /* Estilos de ejemplo para dispositivos móviles */
        @media (max-width: 768px) {
            .jumbotron {
                padding: 50px 0;
            }
        }
        /* Estilos para el botón de inicio de sesión */
        .btn-login {
            background-color: #ff5535;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #ff3300;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/logo.png')}}" alt="Logo UPQ">
                <span class="logo_name">Gestor UPQ</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/investigacion" class="nav-link">
                            <i class="uil uil-question-circle"></i> Contacto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            <i class="uil uil-signin"></i> Iniciar Sesión
                        </a>
                    </li>
                    <!-- Agrega más enlaces según sea necesario -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Encabezado con jumbotron -->
    <div class="jumbotron">
        <h1 class="display-4">Bienvenido al Gestor UPQ</h1>
        <p class="lead">Por favor, inicie sesión para continuar</p>
        <!-- Botón de inicio de sesión -->
        <a href="/login" class="btn btn-login">Iniciar Sesión<i class="uil uil-signin"></i></a>
    </div>
    <!-- Imagen centrada y original -->
    <div class="text-center">
        <img src="{{asset('assets/UPQ.jpeg')}}" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">
    </div>
    <br>
    <!-- Pie de página -->
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 UPQ. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
