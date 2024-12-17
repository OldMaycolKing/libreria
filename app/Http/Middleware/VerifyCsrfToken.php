<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Las URIs que están exentas de la verificación CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
