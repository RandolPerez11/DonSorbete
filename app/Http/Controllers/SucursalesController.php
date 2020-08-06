<?php

namespace App\Http\Controllers;

use Alert;
use App\caja;
use App\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $busqueda=$request->input('search');
        $users = Sucursal::search($busqueda)->paginate(10);
        //dd($users);
        return view ('sucursal.index', compact('users','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('sucursal.create');
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
        $user = Sucursal::create($request->all());
        caja::create([
            'sucursal'=>$request[name],
            'inicio'=>0,
        ]);
        return redirect()->route('sucur.index', $user)
        ->with('success', 'Sucursal guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        //
        $user = Sucursal::find($user);
        $user->delete();
        return redirect()->route('sucur.index', $user)
        ->with('success', 'Sucursal Eliminado');
    }
}
