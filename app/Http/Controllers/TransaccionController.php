<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\Libro;
use App\Models\Cliente;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::all();
        return view('transaccion.index', compact('transacciones'));
    }





    public function create()
    {
        $libros = Libro::where('disponible', true)->get();
        $clientes = Cliente::all();
        return view('transaccion.create', compact('libros', 'clientes'));
    }





    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'cliente_id' => 'required|exists:clientes,id',
            'estado' => 'required|in:rechazado,prestado,devuelto',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo'
        ]);

        $transaccion = Transaccion::create($request->all());

        // Si el estado es 'prestado', marcar el libro como no disponible
        if ($transaccion->estado === 'prestado') {
            $libro = Libro::find($transaccion->libro_id);
            $libro->update(['disponible' => false]);
        }

        return redirect()->route('transaccion.index')->with('success', 'Transacción creada exitosamente.');
    }





    public function show($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        return view('transaccion.show', compact('transaccion'));
    }





    public function edit($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $libros = Libro::all();
        $clientes = Cliente::all();
        return view('transaccion.edit', compact('transaccion', 'libros', 'clientes'));
    }






    public function update(Request $request, $id)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'cliente_id' => 'required|exists:clientes,id',
            'estado' => 'required|in:rechazado,prestado,devuelto',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo'
        ]);

        $transaccion = Transaccion::findOrFail($id);
        $transaccion->update($request->all());

        // Ajustar la disponibilidad del libro según el estado
        $libro = Libro::find($transaccion->libro_id);

        if ($transaccion->estado === 'prestado') {
            $libro->update(['disponible' => false]);
        } elseif ($transaccion->estado === 'devuelto') {
            $libro->update(['disponible' => true]);
        } elseif ($transaccion->estado === 'rechazado') {
            $libro->update(['disponible' => true]);
        }

        return redirect()->route('transaccion.index')->with('success', 'Transacción actualizada correctamente.');
    }





        public function destroy($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $estado = $transaccion->estado;
        $libro = Libro::find($transaccion->libro_id);

        $transaccion->delete();

        if ($estado === 'prestado') {
            $libro->update(['disponible' => true]);
        }

        return redirect()->route('transacciones.index')->with('success', 'Préstamo eliminado correctamente.');
    }

}
