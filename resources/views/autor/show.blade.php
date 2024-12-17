<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Autor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Detalle de Autor</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $autor->nombre }}</h5>
                <p class="card-text">{{ $autor->biografia }}</p>
                <a href="{{ route('autor.index') }}" class="btn btn-primary">Volver al listado</a>
                <a href="{{ route('autor.edit', $autor->id) }}" class="btn btn-warning">Editar Autor</a>
            </div>
        </div>

        <h2>Libros Escritos</h2>
        @if($autor->libros->isEmpty())
            <p>No hay libros registrados para este autor.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Disponible</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($autor->libros as $libro)
                        <tr>
                            <td>{{ $libro->id }}</td>
                            <td>{{ $libro->titulo }}</td>
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
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

