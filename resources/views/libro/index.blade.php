<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Listado de Libros</h1>
        <a href="{{ route('libro.create') }}" class="btn btn-primary mb-3">Agregar Libro</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($libros->isEmpty())
            <p>No hay libros registrados.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Disponible</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                        <tr>
                            <td>{{ $libro->id }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->autor->nombre }}</td>
                            <td>{{ $libro->disponible ? 'Sí' : 'No' }}</td>
                            <td>
                                <a href="{{ route('libro.show', $libro->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('libro.edit', $libro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('libro.destroy', $libro->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('¿Estás seguro de eliminar este libro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Paginación (Opcional) -->
            {{ $libros->links() }}
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
