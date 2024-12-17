<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Las direcciones IP de proxies confiables.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies = '*'; // Puedes especificar las IPs de proxies si las conoces

    /**
     * Los encabezados que deben ser usados para detectar proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
