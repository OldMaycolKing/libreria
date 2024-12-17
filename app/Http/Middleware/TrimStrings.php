<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Los atributos que deben ser recortados.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
