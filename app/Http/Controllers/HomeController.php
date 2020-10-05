<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Grado;
use App\Seccion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $secciones=Seccion::all();
        $niveles=Nivel::all();
        $grados=Grado::all();
        // dd($niveles);
        return view('bienvenido',compact('secciones','niveles','grados'));
    }
}
