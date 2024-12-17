<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Biblioteca</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1 class="mb-4">Bienvenido a la Biblioteca</h1>
        <div class="row">
            <!-- Gestión de Préstamos -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Gestión de Préstamos
                    </div>
                    <div class="card-body">
                        <a href="{{ route('transaccion.index') }}" class="btn btn-primary">Administrar Préstamos</a>
                    </div>
                </div>
            </div>
            <!-- Listados y Detalles -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Listados y Detalles
                    </div>
                    <div class="card-body">
                        <a href="{{ route('autor.index') }}" class="btn btn-secondary mb-2">Gestionar Autores</a>
                        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Gestionar Clientes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
