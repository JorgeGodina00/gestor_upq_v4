@extends('layouts.plantilla_ptc')
@section('title', 'Página de Contenido')


@section('content')
<link rel="stylesheet" href="{{ asset('cashboard.css') }}">
    <div class="container mt-5">
        <center>
            <h1>Convocatorias Abiertas</h1>
            <div class="alert alert-primary" role="alert">
                <i class="uil alert"></i>
                Antes de Ingresar a cualquier Convocatoria, verifica que los datos en mi perfil esten actualizados.
              </div>
            <div>
            <div class="container">
                
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h4>CIPPA</h4>
                        </div>
                        <div class="card-body">
                          <button>Ingresar</button>
                        </div>
                      </div>
                    </div>
<br>
                    <div class="col-md-6">
                          <div class="card">
                            <div class="card-header">
                              <h4>Estadias</h4>
                            </div>
                            <div class="card-body">
                              <button>Ingresar</button>
                            </div>
                    </div>
<br>
                    <div class="col-md-6">
                            <div class="card">
                              <div class="card-header">
                                <h4>Estimulos</h4>
                              </div>
                              <div class="card-body">
                                <button>Ingresar</button>
                              </div>
                    </div>
                
            </div>
            
            <br>
        </center>
            
        
    </div>
    <footer class="footer bg-dark text-white text-center py-3 height = 100%">
        <div class="container">
            <p>&copy; 2024 UPQ. Todos los derechos reservados.</p>
            
        </div>
    </footer>
@endsection