<?php

namespace App\Http\Controllers\WebApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('webapp.inicio');
    }
}
