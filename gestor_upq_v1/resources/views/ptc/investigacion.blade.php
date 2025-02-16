@extends('layouts.plantilla_profesor')

@section('content')
    <h1 class="text-center">Bienvenido al panel de Investigación</h1>
    <p class="text-center">Desde aquí podrás gestionar los archivos de investigación en la plataforma.</p>

    <div class="card" style="width: 50%; margin: 0 auto; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
        <h2 class="text-center">Cargar Documento de Investigación</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('profesor.documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category" value="IN">
            
            <div class="form-group">
                <label for="period">Período Escolar</label>
                <select id="period" name="period" class="form-control" required>
                    <option value="ene-abr">Enero-Abril</option>
                    <option value="may-ago">Mayo-Agosto</option>
                    <option value="sep-dic">Septiembre-Diciembre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory">Subcategoría</label>
                <select id="subcategory" name="subcategory" class="form-control" required>
                    <option value="EAC">Encuentros académicos</option>
                    <option value="MEX">Memoria en extenso (arbitrada)</option>
                    <option value="ALO">Artículo con circulación local o nacional</option>
                    <option value="AAN">Artículo arbitrado (ISSN) con circulación nacional</option>
                    <option value="AAI">Artículo arbitrado (ISSN) con circulación internacional</option>
                    <option value="ITE">Informe técnico</option>
                    <option value="LIB">Libro</option>
                    <option value="CCL">Capítulo de libro</option>
                    <option value="EPO">Ensayo publicado (ISSN)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="file">Archivo (PDF)</label>
                <input type="file" id="file" name="file" class="form-control-file" accept=".pdf" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Subir Documento</button>
            </div>
        </form>
    </div>
@endsection
