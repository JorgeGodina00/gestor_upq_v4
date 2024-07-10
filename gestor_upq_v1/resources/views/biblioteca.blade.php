@extends('layouts.plantilla_ptc')
@section('title', 'Página de Contenido')

@section('content')
<div class="container mt-5">
    <center>
        <h1>Biblioteca de Documentos</h1>
        
        <!-- Formulario de búsqueda -->
        <form method="GET" action="">
            <div class="form-row align-items-center mb-3">
                <div class="col-auto">
                    <label class="sr-only" for="clave_profesor">Clave Profesor</label>
                    <input type="text" class="form-control" id="clave_profesor" name="clave_profesor" placeholder="Clave Profesor">
                </div>
                <div class="col-auto">
                    <label class="sr-only" for "clave_categoria">Categoría</label>
                    <input type="text" class="form-control" id="clave_categoria" name="clave_categoria" placeholder="Categoría">
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="clave_subcategoria">Subcategoría</label>
                    <input type="text" class="form-control" id="clave_subcategoria" name="clave_subcategoria" placeholder="Subcategoría">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Documento</th>
                        <th>Clave Profesor</th>
                        <th>Periodo</th>
                        <th>Clave Categoría</th>
                        <th>Clave Subcategoría</th>
                        <th>Consecutivo</th>
                        <th>Nombre Archivo</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Modificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentos as $documento)
                    <tr>
                        <td>{{ $documento->id_documento }}</td>
                        <td>{{ $documento->clave_profesor }}</td>
                        <td>{{ $documento->periodo }}</td>
                        <td>{{ $documento->clave_categoria }}</td>
                        <td>{{ $documento->clave_subcategoria }}</td>
                        <td>{{ $documento->consecutivo }}</td>
                        <td>{{ $documento->nombre_archivo }}</td>
                        <td>{{ $documento->fecha_creacion }}</td>
                        <td>{{ $documento->fecha_modificacion }}</td>
                        <td>
                            <!-- Botón de actualizar -->
                            <a href="#" class="btn btn-primary btn-sm">Actualizar</a>

                            <!-- Botón de descargar archivo -->
                            <a href="{{ asset($documento->ubicacion_archivo) }}" class="btn btn-success btn-sm" download>Descargar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </center>
</div>
<br>
<br>
<br>
@endsection
