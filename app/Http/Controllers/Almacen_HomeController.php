<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Almacen_HomeController extends Controller
{
    public function index()
    {
        return view('almacen.inicio');
    }

    public function landing()
    {
        return view('landing');
    }
}
