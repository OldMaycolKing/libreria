<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Editar Autor</h1>
        <form action="{{ route('autor.update', $autor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Autor</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $autor->nombre) }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="biografia" class="form-label">Biografía</label>
                <textarea name="biografia" id="biografia" class="form-control" rows="5">{{ old('biografia', $autor->biografia) }}</textarea>
                @error('biografia')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Autor</button>
            <a href="{{ route('autor.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
