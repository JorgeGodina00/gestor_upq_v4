<!doctype html>
<html lang="en">
<head>
    
    <title>UPQ Intranet</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon" />

</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{asset('assets/logo.png')}}"
                                            style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">UPQ Intranet</h4>
                                    </div>

                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        <center><p>Ingresar Correo y Contraseña</p></center>
                                        <br>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Correo de Usuario</label>
                                            <input type="email" id="form2Example11" class="form-control" placeholder="Correo Electronico" name="email"/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Contraseña de Usuario</label>
                                            <input type="password" id="form2Example22" class="form-control" name="password"/>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Iniciar Sesion</button>
                                            <br>
                                           
                                        </div>         
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="img-container">
                                    <img src="{{asset('assets/GALERIA_1.png')}}" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 UPQ. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>

    <script>
        // Redirigir si el usuario es secretariacademica@upq.mx
        @auth
        const userEmail = "{{ auth()->user()->email }}";
        if (userEmail === 'secretariacademica@upq.mx') {
            window.location.replace("{{ route('secretaria.index') }}");
        }
        @endauth
    </script>
</body>
</html>
