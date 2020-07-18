<?php

namespace App\Http\Controllers;

use App\User;
use App\Ventas;
use App\Salidas;
use App\Egresos;
use App\Sucursal;
use App\Promociones;
use App\Configuracion;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $config = Configuracion::all();
        $Promos = Promociones::all();

        return view ('configuracion.index', compact('config','Promos'));
    }


    public function promocion(Request $request)
    {
        //
        $Promos = Promociones::all();
        foreach ($Promos as $promo) {
          if (isset($_POST[$promo->producto]) && $_POST[$promo->producto] == '1') {
            $id=DB::table('promocion')->where('producto',$promo->producto)->pluck('id');
            $guardar= Promociones::find($id[0]);
            $guardar->activo=1;
            $guardar->save();
          }else {
            $id=DB::table('promocion')->where('producto',$promo->producto)->pluck('id');
            $guardar= Promociones::find($id[0]);
            $guardar->activo=0;
            $guardar->save();
          }
        }
        $config = Configuracion::all();
        return redirect()->route('config.index', compact('config'))
        ->with('success', 'Promociones Activadas');
    }

    public function promocion2(Request $request)
    {
        $Promos = Promociones::all();
        foreach ($Promos as $promo) {
          if ($request[$promo->producto] != null) {
            $id=DB::table('promocion')->where('producto',$promo->producto)->pluck('id');
            $guardar= Promociones::find($id[0]);
            $guardar->promo=$request[$promo->producto];
            $guardar->save();
          }
        }
        $config = Configuracion::all();
        return redirect()->route('config.index', compact('config'))
        ->with('success', 'Promociones Guardadas');
    }

    public function Breporte()
    {
        //
        $sucursales = Sucursal::get();
        return view ('Reportes.Breporte', compact('sucursales'));
    }

    public function reporte(Request $request)
    {
        $alumnosxGrupo=Ventas::all();
        $data=[];
        $alumnosxGrupo2=Salidas::all();
        $total=0;
        switch ($request['rol']) {
          case "1":
                foreach ($alumnosxGrupo as $num => $alumno){
                  if ($alumno->fecha >= $request['fi'] && $alumno->fecha <= $request['ff'] && $alumno->sucursal = $request['sucursal']) {
                    $data[]=[
                      'Tipo' => 'Ingresos',
                      'Producto'=>$alumno->producto,
                      'Precio'=>$alumno->precio,
                      'Promoción'=>$alumno->promocion,
                      'Empleado'=>$alumno->usuario,
                      'Fecha'=>$alumno->fecha,
                      'Total'=>""
                    ];
                    $total += $alumno->precio;
                  }
                }
                $data[]=[
                  'Tipo' => 'Total de Ingresos',
                  'Producto'=>"",
                  'Precio'=>"",
                  'Promoción'=>"",
                  'Empleado'=>"",
                  'Fecha'=>"",
                  'Total'=>$total
                ];
                break;
          case '2':
                $total=0;
                foreach ($alumnosxGrupo2 as $num => $alumno){
                  if ($alumno->fecha >= $request['fi'] && $alumno->fecha <= $request['ff'] && $alumno->sucursal = $request['sucursal']) {
                    $data[]=[
                      'Tipo' => 'Egresos',
                      'Producto'=>$alumno->producto,
                      'Precio'=>$alumno->precio,
                      'Promocion'=>"",
                      'Empleado'=>"",
                      'Fecha'=>$alumno->fecha,
                      'Total'=>""
                    ];
                    $total += $alumno->precio;
                  }
                }

                $data[]=[
                  'Tipo' => 'Total de Egresos',
                  'Producto'=>"",
                  'Precio'=>"",
                  'Promoción'=>"",
                  'Empleado'=>"",
                  'Fecha'=>"",
                  'Total'=>$total
                ];
                break;

          case '3':
                $totalI=0;
                foreach ($alumnosxGrupo as $num => $alumno){
                  if ($alumno->fecha >= $request['fi'] && $alumno->fecha <= $request['ff'] && $alumno->sucursal = $request['sucursal']) {
                    $data[]=[
                      'Tipo' => 'Ingresos',
                      'Producto'=>$alumno->producto,
                      'Precio'=>$alumno->precio,
                      'Promoción'=>$alumno->promocion,
                      'Empleado'=>$alumno->usuario,
                      'Fecha'=>$alumno->fecha,
                      'Totla'=>""
                    ];
                    $totalI += $alumno->precio;
                  }
                }
                $data[]=[
                  'Tipo' => 'Total de Ingresos',
                  'Producto'=>"",
                  'Precio'=>"",
                  'Promoción'=>"",
                  'Empleado'=>"",
                  'Fecha'=>"",
                  'Total'=>$totalI
                ];
                $total=0;
                foreach ($alumnosxGrupo2 as $num => $alumno){
                  if ($alumno->fecha >= $request['fi'] && $alumno->fecha <= $request['ff'] && $alumno->sucursal = $request['sucursal']) {
                    $data[]=[
                      'Tipo' => 'Egresos',
                      'Producto'=>$alumno->producto,
                      'Precio'=>$alumno->precio,
                      'Promocion'=>"",
                      'Empleado'=>$alumno->usuario,
                      'Fecha'=>$alumno->fecha,
                      'Total'=>""
                    ];
                    $total += $alumno->precio;
                  }
                }

                $data[]=[
                  'Tipo' => 'Total de Egresos',
                  'Producto'=>"",
                  'Precio'=>"",
                  'Promoción'=>"",
                  'Empleado'=>"",
                  'Fecha'=>"",
                  'Total'=>$total
                ];
                $T=$totalI-$total;
                $data[]=[
                  'Tipo' => '',
                  'Producto'=>"",
                  'Precio'=>"",
                  'Promoción'=>"",
                  'Empleado'=>"",
                  'Fecha'=>"",
                  'Total'=>""
                ];
                $data[]=[
                  'Tipo' => 'Ganancias',
                  'Producto'=>"",
                  'Precio'=>"",
                  'Promoción'=>"",
                  'Empleado'=>"",
                  'Fecha'=>"",
                  'Total'=>$T
                ];
                break;
        }
        //dd($data);
        return Excel::download(new UsersExport($data), 'Reporte de '.$request['fi'].' a '.$request['ff'].'.xlsx');
        $sucursales = Sucursal::get();
        return view ('Reportes.Breporte', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if ($request['mini']!=null) {
          $file=$request->file('mini');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','mini')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['chico']!=null) {
          $file=$request->file('chico');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','chico')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['mediano']!=null) {
          $file=$request->file('mediano');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','mediano')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['grande']!=null) {
          $file=$request->file('grande');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','grande')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['ml']!=null) {
          $file=$request->file('ml');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','medio litro')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['l']!=null) {
          $file=$request->file('l');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','litro')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['cs']!=null) {
          $file=$request->file('cs');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','cono sencillo')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['cd']!=null) {
          $file=$request->file('cd');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','cono doble')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['cas']!=null) {
          $file=$request->file('cas');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','cazuela sencilla')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        if ($request['cad']!=null) {
          $file=$request->file('cad');
          $name=$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $id=DB::table('configuracion')->where('name','cazuela doble')->pluck('id');
          $guardar= Configuracion::find($id[0]);
          $guardar->url='img/'.$name;
          $guardar->save();
        }
        $config = Configuracion::all();
        return redirect()->route('config.index', compact('config'))
        ->with('success', 'Imagenes Guardadas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request['mini']!=null) {
        $id=DB::table('configuracion')->where('name','mini')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['mini'];
        $guardar->save();
      }
      if ($request['chico']!=null) {
        $id=DB::table('configuracion')->where('name','chico')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['chico'];
        $guardar->save();
      }
      if ($request['mediano']!=null) {
        $id=DB::table('configuracion')->where('name','mediano')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['mediano'];
        $guardar->save();
      }
      if ($request['grande']!=null) {
        $id=DB::table('configuracion')->where('name','grande')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['grande'];
        $guardar->save();
      }
      if ($request['ml']!=null) {
        $id=DB::table('configuracion')->where('name','medio litro')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['ml'];
        $guardar->save();
      }
      if ($request['l']!=null) {
        $id=DB::table('configuracion')->where('name','litro')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['l'];
        $guardar->save();
      }
      if ($request['cs']!=null) {
        $id=DB::table('configuracion')->where('name','cono sencillo')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['cs'];
        $guardar->save();
      }
      if ($request['cd']!=null) {
        $id=DB::table('configuracion')->where('name','cono doble')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['cd'];
        $guardar->save();
      }
      if ($request['cas']!=null) {
        $id=DB::table('configuracion')->where('name','cazuela sencilla')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['cas'];
        $guardar->save();
      }
      if ($request['cad']!=null) {
        $id=DB::table('configuracion')->where('name','cazuela doble')->pluck('id');
        $guardar= Configuracion::find($id[0]);
        $guardar->precio=$request['cad'];
        $guardar->save();
      }
      $config = Configuracion::all();
      return redirect()->route('config.index', compact('config'))
      ->with('success', 'Precios Guardadas');
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
    public function destroy(User $user)
    {

    }
}
