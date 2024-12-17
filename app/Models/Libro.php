<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    protected $fillable = [
        'titulo',
        'autor_id',
        'disponible'
    ];

    // Relación con autor: un libro pertenece a un autor
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }
}
