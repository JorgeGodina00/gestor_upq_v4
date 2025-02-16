@extends('layouts.plantilla_admin')
@section('content')
    <h1>Editar Usuario</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Rol:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="profesor" {{ $user->role == 'profesor' ? 'selected' : '' }}>Profesor</option>
                <option value="lector" {{ $user->role == 'lector' ? 'selected' : '' }}>Lector</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Contraseña (dejar en blanco si no se desea cambiar):</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
    </form>

    <a href="{{ route('admin.usuarios') }}" class="btn btn-secondary mt-3">Volver a la lista de usuarios</a>
@endsection