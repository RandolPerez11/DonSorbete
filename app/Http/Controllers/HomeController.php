<?php

namespace App\Http\Controllers;

use App\Promociones;
use App\Configuracion;
use Illuminate\Http\Request;

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
        $config = Configuracion::all();
        $promo = Promociones::all();
        //dd($config);
        return view ('ventas.venta', compact('config','promo'));
    }
}
