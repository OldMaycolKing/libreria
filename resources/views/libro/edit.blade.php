<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    @include('partials.navbar')

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1>Editar Libro</h1>
        <form action="{{ route('libro.update', $libro->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Método HTTP PUT para actualización -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Libro</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required>
                @error('titulo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="autor_id" class="form-label">Autor</label>
                <select name="autor_id" id="autor_id" class="form-select" required>
                    <option value="">Selecciona un autor</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" {{ (old('autor_id', $libro->autor_id) == $autor->id) ? 'selected' : '' }}>
                            {{ $autor->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('autor_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="disponible" class="form-label">Disponible</label>
                <select name="disponible" id="disponible" class="form-select" required>
                    <option value="">Selecciona la disponibilidad</option>
                    <option value="1" {{ (old('disponible', $libro->disponible) == '1') ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ (old('disponible', $libro->disponible) == '0') ? 'selected' : '' }}>No</option>
                </select>
                @error('disponible')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
            <a href="{{ route('libro.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
