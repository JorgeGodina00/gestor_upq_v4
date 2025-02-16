@extends('layouts.plantilla_admin')
@section('content')
<div class="container">
    <h1>Crear Nuevo Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.usuarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label> <!-- Nuevo campo de confirmación -->
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" name="role" id="role" required>
                <option value="admin">Administrador</option>
                <option value="ptc">Profesor</option>
                <option value="lector">Lector</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
        <a href="{{ route('admin.usuarios') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection