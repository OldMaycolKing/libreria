<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostrar la vista de inicio.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}
