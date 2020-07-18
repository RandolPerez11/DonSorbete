<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use App\Roles;
use App\Sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        //TODO:
        //
        $busqueda=$request->input('search');
        $users = User::search($busqueda)->paginate(10);
        //dd($users);
    return view ('users.index', compact('users','busqueda'));
        //TODO:
    }



    public function show(User $user)
    {
        $datos = DatosAlumno::all();
        foreach ($datos as $key => $value) {
          if ($value->user_id==$user->id) {
          $datos=$value;
          }
        }
        return view('alumnos.show', compact('user','datos'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sucursales = Sucursal::get();
        return view ('users.create',compact('sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request['name']);
        $user = User::create($request->all());
        $us=DB::table('users')->where('name',$request['name'])->pluck('id');
        $rol= new Roles();
            $rol->role_id=$request['rol'];
            $rol->user_id=$us[0];
            $rol->save();
        return redirect()->route('users.index', $user)
        ->with('success', 'Usuario guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        //dd($user);


        $roles = Role::get();
        $sucursales = Sucursal::get();
        return view('users.edit', compact('user', 'roles','sucursales'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index', $user->id)
        ->with('success', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //eliminar un alumno
        //dd($user->id);
        $user = User::find($user->id);
        $user->delete();

        $rol = Roles::find($user->id);
        //$rol->delete();

        return redirect()->route('users.index', $user)
        ->with('success', 'Usuario Eliminado');
    }
}
