<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Determina si se debe permitir el acceso durante el modo de mantenimiento.
     *
     * @return bool
     */
    protected function shouldPassThrough()
    {
        return false;
    }
}
