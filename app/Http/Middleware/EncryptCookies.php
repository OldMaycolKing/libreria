<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Illuminate\Cookie\CookieJar;

class EncryptCookies extends Middleware
{
    /**
     * Las cookies que no deben ser cifradas.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
