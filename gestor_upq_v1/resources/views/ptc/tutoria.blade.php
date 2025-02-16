@extends('layouts.plantilla_ptc')
@section('content')
<div class="container mt-5">
    <center>
        <h1>Subir Documentos de Tutoría</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Documento de asignación de tutoría grupal por parte de OE o documento "Distribución de horas por contrato"</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file_grupal">Subir Archivo</label>
                                <input type="file" class="form-control" id="file_grupal" name="file_grupal">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{" class="btn btn-secondary">Bajar Archivo</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Evidencia de tutoría individual validada por alumnos o "Distribución de horas por contrato"</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file_individual">Subir Archivo</label>
                                <input type="file" class="form-control" id="file_individual" name="file_individual">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="" class="btn btn-secondary">Bajar Archivo</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
@endsection
