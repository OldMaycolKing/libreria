<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    protected $fillable = [
        'nombre',
        'email',
        'telefono'
    ];

    // Un cliente tiene muchas transacciones
    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'cliente_id', 'id');
    }
}
