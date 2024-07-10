@extends('layouts.plantilla_ptc')

@section('content')
<div class="container mt-5">
    <center>
        <h1>Subir Documentos de Investigación</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Subir Documento</h4>
                    </div>
                    <div class="card-body">
                        <!-- Alerta para subida exitosa -->
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- Alerta para error en subida -->
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Campo oculto para la categoría -->
                            <input type="hidden" id="category" name="category" value="investigacion">
                            <div class="form-group mb-3">
                                <label for="subcategory">Subcategoría</label>
                                <select class="form-control @error('subcategory') is-invalid @enderror" id="subcategory" name="subcategory">
                                    <option value="">Selecciona una subcategoría</option>
                                    <option value="encuentros_academicos">Encuentros académicos</option>
                                    <option value="articulos_informes_libros">Artículos o informes técnicos o libros o capítulos de libro o memorias donde se participen como investigador(a) de UPQ</option>
                                    <option value="direccion_individualizada_licenciatura">Dirección individualizada licenciatura</option>
                                    <option value="codireccion_individualizada_licenciatura">Co-dirección individualizada licenciatura</option>
                                    <option value="redes_academicas_colaboracion">Redes académicas de colaboración</option>
                                    <option value="participacion_cuerpos_academicos">Participación en cuerpos académicos</option>
                                    <option value="participacion_cursos_extension">Participación en cursos de extensión académica</option>
                                    <option value="reconocimiento_local_estudiantes">Reconocimiento local a estudiantes con dirección del profesor</option>
                                    <option value="reconocimiento_nacional_estudiantes">Reconocimiento nacional a estudiantes con dirección del profesor</option>
                                    <option value="reconocimiento_internacional_estudiantes">Reconocimiento internacional a estudiantes con dirección del profesor</option>
                                    <option value="proyectos_investigacion">Proyectos de investigación</option>
                                    <option value="modelo_gestion_academica">Modelo de gestión académica-administrativa</option>
                                    <option value="material_didactico_asignatura">Material didáctico para asignatura de licenciatura o maestría</option>
                                    <option value="obra_artistica">Obra artística</option>
                                    <option value="modelo_diseno_industrial">Modelo de diseño industrial</option>
                                    <option value="modelo_utilidad_prototipo">Modelo de utilidad o prototipo</option>
                                    <option value="patente">Patente</option>
                                </select>
                                @error('subcategory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="evidence">Evidencia</label>
                                <input type="file" class="form-control @error('evidence') is-invalid @enderror" id="evidence" name="evidence" required>
                                @error('evidence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
@endsection
