@extends('layouts.plantilla_ptc')
@section('content')
<div class="container mt-5">
    <center>
        <h1>Subir Documentos</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Documentos</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="cv">Curriculum Vitae (CV):</label>
                                <input type="file" class="form-control" id="cv" name="cv">
                            </div>
                            <div class="form-group">
                                <label for="nombramiento">Nombramiento Oficial en la Universidad:</label>
                                <input type="file" class="form-control" id="nombramiento" name="nombramiento">
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título Máximo Grado Obtenido:</label>
                                <input type="file" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula Profesional Máximo Grado Obtenido:</label>
                                <input type="file" class="form-control" id="cedula" name="cedula">
                            </div>
                            <div class="form-group">
                                <label for="identificacion">Identificación Oficial:</label>
                                <input type="file" class="form-control" id="identificacion" name="identificacion">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Subir Documentos</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Actualizar/Bajar Documentos</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Curriculum Vitae (CV)
                                <a href="" class="btn btn-success btn-sm">Bajar</a>
                                <a href="" class="btn btn-warning btn-sm">Actualizar</a>
                            </li>
                            <li class="list-group-item">
                                Nombramiento Oficial en la Universidad
                                <a href="" class="btn btn-success btn-sm">Bajar</a>
                                <a href="" class="btn btn-warning btn-sm">Actualizar</a>
                            </li>
                            <li class="list-group-item">
                                Título Máximo Grado Obtenido
                                <a href="" class="btn btn-success btn-sm">Bajar</a>
                                <a href="" class="btn btn-warning btn-sm">Actualizar</a>
                            </li>
                            <li class="list-group-item">
                                Cédula Profesional Máximo Grado Obtenido
                                <a href="" class="btn btn-success btn-sm">Bajar</a>
                                <a href="" class="btn btn-warning btn-sm">Actualizar</a>
                            </li>
                            <li class="list-group-item">
                                Identificación Oficial
                                <a href="" class="btn btn-success btn-sm">Bajar</a>
                                <a href="" class="btn btn-warning btn-sm">Actualizar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="footer bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 UPQ. Todos los derechos reservados.</p>
    </div>
  </footer>
@endsection