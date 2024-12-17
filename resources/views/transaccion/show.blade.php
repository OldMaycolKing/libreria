<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Transacción</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Detalle de Transacción</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Transacción ID: {{ $transaccion->id }}</h5>
                <p class="card-text"><strong>Libro:</strong> {{ $transaccion->libro->titulo }}</p>
                <p class="card-text"><strong>Cliente:</strong> {{ $transaccion->cliente->nombre }}</p>
                <p class="card-text"><strong>Estado:</strong> {{ ucfirst($transaccion->estado) }}</p>
                <p class="card-text"><strong>Fecha de Préstamo:</strong> {{ $transaccion->fecha_prestamo }}</p>
                <p class="card-text"><strong>Fecha de Devolución:</strong> {{ $transaccion->fecha_devolucion ?? 'N/A' }}</p>
                <a href="{{ route('transaccion.index') }}" class="btn btn-primary">Volver al listado</a>
                <a href="{{ route('transaccion.edit', $transaccion->id) }}" class="btn btn-warning">Editar Transacción</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
