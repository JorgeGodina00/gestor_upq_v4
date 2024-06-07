@extends('layouts.plantilla_ptc')
@section('content')
<div class="container mt-5">
    <center>
        <h1>Subir Documentos de Investigación</h1>
        <div class="row">
           
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Subir Archivo</label>
                                <input type="file" class="form-control" id="" name="file">
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
