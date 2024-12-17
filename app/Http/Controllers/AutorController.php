<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autor.index', compact('autores'));
    }


    
    public function create()
    {
        return view('autor.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'biografia' => 'nullable|string'
        ]);

        Autor::create($request->all());

        return redirect()->route('autor.index')->with('success', 'Autor creado exitosamente.');
    }




    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.show', compact('autor'));
    }




    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.edit', compact('autor'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'biografia' => 'nullable|string'
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($request->all());

        return redirect()->route('autor.index')->with('success', 'Autor actualizado correctamente.');
    }



    
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return redirect()->route('autor.index')->with('success', 'Autor eliminado correctamente.');
    }
}

