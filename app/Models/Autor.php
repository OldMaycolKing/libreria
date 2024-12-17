<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    protected $fillable = [
        'nombre',
        'biografia'
    ];

    // Relación con libros: un autor tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class, 'autor_id', 'id');
    }
}
