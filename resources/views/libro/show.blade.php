<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Libro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Detalle de Libro</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $libro->titulo }}</h5>
                <p class="card-text"><strong>Autor:</strong> {{ $libro->autor->nombre }}</p>
                <p class="card-text"><strong>Disponible:</strong> {{ $libro->disponible ? 'Sí' : 'No' }}</p>
                <a href="{{ route('libro.index') }}" class="btn btn-primary">Volver al listado</a>
                <a href="{{ route('libro.edit', $libro->id) }}" class="btn btn-warning">Editar Libro</a>
            </div>
        </div>

        <h2>Transacciones del Libro</h2>
        @if($libro->transacciones->isEmpty())
            <p>No hay transacciones registradas para este libro.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($libro->transacciones as $transaccion)
                        <tr>
                            <td>{{ $transaccion->id }}</td>
                            <td>{{ $transaccion->cliente->nombre }}</td>
                            <td>{{ ucfirst($transaccion->estado) }}</td>
                            <td>{{ $transaccion->fecha_prestamo }}</td>
                            <td>{{ $transaccion->fecha_devolucion ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('transaccion.show', $transaccion->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('transaccion.edit', $transaccion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('transaccion.destroy', $transaccion->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('¿Estás seguro de eliminar esta transacción?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Paginación (Opcional) -->
            {{ $libro->transacciones->links() }}
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
