@extends('layouts.plantilla_admin')
@section('content')
    <h1>Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">Crear Nuevo Usuario</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Navegación de la paginación -->
    <div class="mt-3">
        {{ $usuarios->links() }} <!-- Esto generará las flechas de navegación -->
    </div>
@endsection
