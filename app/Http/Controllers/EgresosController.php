<?php

namespace App\Http\Controllers;

use App\Egresos;
use App\Sucursal;
use App\Configuracion;
use Illuminate\Http\Request;

class EgresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Egresos = Egresos::all();

        return view ('egresos.index', compact('Egresos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $sucursales = Sucursal::get();
        return view ('egresos.create',compact('sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $config = Egresos::all();
        $sucursales = $request['sucursales'];
        $productos = $request['productos'];
        $precios = $request['precio'];
        $hoy=date("Y-m-d");
        if ($productos!=null) {
          for ($i=0; $i < count($productos) ; $i++) {
              Egresos::create([
                  'sucursal'=>$sucursales[$i],
                  'producto'=>$productos[$i],
                  'precio'=>$precios[$i],
                  'usuario'=>$request['enca'],
                  'fecha'=>$hoy,
              ]);
          }

          return redirect()->route('egre.index', compact('config'))
          ->with('success', 'Egresos Registradas');
        }else {
          return redirect()->route('egre.create')
          ->with('error', 'No hay nuingun egreso agregado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function show(Egresos $egresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function edit(Egresos $egresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egresos $egresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egresos $egresos)
    {
        //
        $egresos = Egresos::find($egresos->id);
        $egresos->delete();

        return redirect()->route('egre.index', $egresos)
        ->with('success', 'Egreso Eliminado');
    }
}
