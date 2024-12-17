<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Mostrar una lista de los libros.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $libros = Libro::with('autor')->paginate(10); // Paginación y carga de autores
        return view('libro.index', compact('libros'));
    }

    /**
     * Mostrar el formulario para crear un nuevo libro.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $autores = Autor::all();
        return view('libro.create', compact('autores'));
    }

    /**
     * Almacenar un nuevo libro en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|integer|exists:autores,id',
            'disponible' => 'required|boolean',
        ]);

        Libro::create($request->all());

        return redirect()->route('libro.index')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Mostrar un libro específico.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\View\View
     */
    public function show(Libro $libro)
    {
        return view('libro.show', compact('libro'));
    }

    /**
     * Mostrar el formulario para editar un libro existente.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\View\View
     */
    public function edit(Libro $libro)
    {
        $autores = Autor::all();
        return view('libro.edit', compact('libro', 'autores'));
    }

    /**
     * Actualizar un libro existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|integer|exists:autores,id',
            'disponible' => 'required|boolean',
        ]);

        $libro->update($request->all());

        return redirect()->route('libro.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Eliminar un libro de la base de datos.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libro.index')->with('success', 'Libro eliminado correctamente.');
    }
}
