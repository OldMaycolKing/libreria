<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Transacciones</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Listado de Transacciones</h1>
        <a href="{{ route('transaccion.create') }}" class="btn btn-primary mb-3">Agregar Transacción</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($transacciones->isEmpty())
            <p>No hay transacciones registradas.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transacciones as $transaccion)
                        <tr>
                            <td>{{ $transaccion->id }}</td>
                            <td>{{ $transaccion->libro->titulo }}</td>
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
            {{ $transacciones->links() }}
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>