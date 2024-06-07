@extends('layouts.plantilla_ptc')

@section('content')
<div class="container mt-5">
    <center>
        <h1>Subir Documentos de Docencia</h1>
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
                            <input type="hidden" id="category" name="category" value="docencia">
                            <div class="form-group mb-3">
                                <label for="subcategory">Subcategoría</label>
                                <select class="form-control @error('subcategory') is-invalid @enderror" id="subcategory" name="subcategory">
                                    <option value="">Selecciona una subcategoría</option>
                                    <option value="actualizacion_curricular_disciplinar">Actualización curricular disciplinar</option>
                                    <option value="actualizacion_didactica_pedagogica">Actualización didáctica-pedagógica</option>
                                    <option value="actualizacion_en_lenguas_extranjeras">Actualización en lenguas extranjeras</option>
                                    <option value="certificacion_de_ingles_avanzado">Certificación de inglés avanzado</option>
                                    <option value="programa_de_trabajo">Programa de trabajo</option>
                                    <option value="reconocimiento_interno">Reconocimiento interno</option>
                                    <option value="evaluacion_docente">Evaluación docente</option>
                                    <option value="evaluacion_a_titulo_de_competencia">Evaluación a título de competencia</option>
                                    <option value="clase_frente_a_grupo_en_la_universidad">Clase frente a grupo en la Universidad</option>
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
<footer class="footer bg-dark text-white text-center py-3 height-100%">
    <div class="container">
        <p>&copy; 2024 UPQ. Todos los derechos reservados.</p>
    </div>
</footer>
@endsection
