<?php

namespace App\Http\Controllers;

use Alert;
use App\Dia;
use App\User;
use App\caja;
use App\Ventas;
use App\Salidas;
use App\Egresos;
use App\Sucursal;
use App\Promociones;
use App\Configuracion;
use Mike42\Escpos\Printer;
use Illuminate\Http\Request;
use Mike42\Escpos\EscposImage;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class VentasController extends Controller
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
        $promo = Promociones::all();
        //dd($config);
        return view ('ventas.venta', compact('config','promo'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $sucursales = Sucursal::all();
        $config = Configuracion::all();
        $productos = $request['productos'];
        $pro = $request['promos'];
        $pre = $request['precios'];
        $hoy=date("Y-m-d");
        $total=0;
        if ($productos!=null) {
          for ($i=0; $i < count($productos) ; $i++) {
              $sucu=DB::table('users')->where('name', $request['enca'])->pluck('sucursal');
              Dia::create([
                  'producto'=>$productos[$i],
                  'precio'=>$pre[$i],
                  'promocion'=>$pro[$i],
                  'usuario'=>$request['enca'],
                  'sucursal'=>$sucu[0],
                  'fecha'=>$hoy,
              ]);
              $total += $pre[$i];
          }
          #----------------------------------------------------------------------
          $sucu=DB::table('users')->where('name', $request['enca'])->pluck('sucursal');
          $nombreImpresora = "Sorbete 3";
          $connector = new WindowsPrintConnector($nombreImpresora);
          $impresora = new Printer($connector);
          $impresora->setJustification(Printer::JUSTIFY_CENTER);
          $impresora->setTextSize(2, 2);
          $tux = EscposImage::load("img/logoT.png");
          $impresora->bitImageColumnFormat($tux);
          $impresora->setTextSize(1, 1);
          $impresora->text("Dependiente: ".$request['enca']."\n");
          $impresora->text(date("Y-m-d H:i:s") . "\n");
          $impresora->setJustification(Printer::JUSTIFY_LEFT);
          $impresora->text("Producto                  ");
          $impresora->text("Precio\n \n");
          for ($i=0; $i < count($productos) ; $i++) {
              $impresora->setJustification(Printer::JUSTIFY_LEFT);
              $impresora->text($productos[$i]."\n");
              $impresora->setJustification(Printer::JUSTIFY_RIGHT);
              $impresora->text("$".$pre[$i]."\n");
          }
          $impresora->setJustification(Printer::JUSTIFY_RIGHT);
          $impresora->text("--------\n");
          $impresora->text("TOTAL: $". $total ."\n");
          $impresora->text("Su Pago: $". $request["paga"] ."\n");
          $c=$request["paga"]-$total;
          $impresora->text("Cambio: $". $c ."\n");
          $impresora->setJustification(Printer::JUSTIFY_CENTER);
          foreach ($sucursales as $sucur) {
            if ($sucur->name == $sucu[0]) {
                $impresora->text($sucur->name."\n".$sucur->direccion."\n".$sucur->telefono."\n");
            }
          }
          $impresora->setJustification(Printer::JUSTIFY_CENTER);
          $impresora->text("Gracias por su preferencia");
          $impresora->feed(5);
          $impresora->close();
          #---------------------------------------------------------------------
          return redirect()->route('vent.index', compact('config'))
          ->with('success', 'Venta Finalizada');
        }else {
          return redirect()->route('vent.index', compact('config'))
          ->with('error', 'No hay nuingun producto');
        }
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
        dd($request['product']);
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

     public function buscarCierre()
     {
       $sucursales = Sucursal::get();
       return view ('ventas.buscarCierre',compact('sucursales'));
     }


    public function cierre(Request $request)
    {
        //
        $sucursal=$request['sucursal'];
        $existe = Caja::all();
        $ventasDia = Dia::all();
        $egresos = Egresos::all();
        $caja = 0;
        foreach ($existe as $exist) {
          if ($exist->sucursal == $request['sucursal']) {
              $caja += $exist->Inicio;
          }
        }
        $venta = 0;
        foreach ($ventasDia as $ventas) {
          if ($ventas->sucursal == $request['sucursal']) {
            $venta += $ventas->precio;
          }
        }
        $tEgresos = 0;
        foreach ($egresos as $egreso) {
          if ($egreso->sucursal == $request['sucursal']) {
                $tEgresos += $egreso->precio;
          }
        }
        $totalcaja = $venta + $caja;
        $ganancia = $totalcaja - $tEgresos;
        return view ('ventas.caja', compact('caja','ganancia','totalcaja','venta','sucursal','tEgresos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function CajaI()
    {
        $sucursales = Sucursal::get();
        return view ('ventas.cajaInicial',compact('sucursales'));
    }
    public function cajaInicial(Request $request)
    {
        $hay=DB::table('caja')->where('sucursal',$request['sucursal'])->pluck('id');
        if ($request['_1'] != null) {
            $caja=$request['_1'];
        }else {
          $caja=0;
        }
        $apro = caja::find($hay[0]);
        $apro->inicio = $caja;
        $apro->save();

        $config = Configuracion::all();
        return redirect()->route('vent.index', compact('config'))
        ->with('success', 'Caja Inicial Registrada');
    }
    public function cierreCaja(Request $request)
    {
        $ventasDia = Dia::all();
        foreach ($ventasDia as $ventas) {
          if ($ventas->sucursal == $request['sucursal']) {
              $fin = new Ventas();
              $fin->producto = $ventas->producto;
              $fin->precio = $ventas->precio;
              $fin->promocion = $ventas->Promocion;
              $fin->usuario = $ventas->usuario;
              $fin->sucursal = $ventas->sucursal;
              $fin->fecha = $ventas->fecha;
              $fin->save();
          }
        }

        $salidasDia = Egresos::all();
        foreach ($salidasDia as $salidas) {
          if ($salidas->sucursal == $request['sucursal']) {
              $fin = new Salidas();
              $fin->sucursal = $salidas->sucursal;
              $fin->producto = $salidas->producto;
              $fin->precio = $salidas->precio;
              $fin->usuario = $salidas->usuario;
              $fin->fecha = $salidas->fecha;
              $fin->save();
          }
        }

        $idventas=DB::table('dia')->where('sucursal',$request['sucursal'])->pluck('id');
        #dd($idventas);
        for ($i=0; $i <count($idventas) ; $i++) {
          $sucur= Dia::where('id',$idventas[$i])->first();
          $sucur->delete();
        }

        $idsalidas=DB::table('egresos')->where('sucursal',$request['sucursal'])->pluck('id');
        //dd($idsalidas);
        for ($i=0; $i <count($idsalidas) ; $i++) {
          $sucur= Egresos::where('id',$idsalidas[$i])->first();
          $sucur->delete();
        }
        $hay=DB::table('caja')->where('sucursal',$request['sucursal'])->pluck('id');
        $apro = caja::find($hay[0]);
        $apro->inicio = 0;
        $apro->save();

        $config = Configuracion::all();

        return redirect()->route('vent.index', compact('config'))
        ->with('success', 'Cierre de Caja Completado');
    }
}
