<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    protected $fillable = [
        'libro_id',
        'cliente_id',
        'estado',
        'fecha_prestamo',
        'fecha_devolucion'
    ];

    // Relación con libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id', 'id');
    }

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}
