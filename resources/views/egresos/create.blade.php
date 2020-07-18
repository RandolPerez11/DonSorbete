@extends('layouts.app')

@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align='center'><FONT FACE="Cooper Black" align='center'>Egresos</FONT></div>
            <div class="card-body">
                @csrf
                <div class="form-group row">
                  <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></label>
                  <div class="col-md-6">
                    <select class="col-md-12 col-form-label text-md-right" name="sucursal" id='sucursal'>
                        <?php foreach ($sucursales as $sucursal): ?>
                            <option value='{{ $sucursal->name }}'>{{ $sucursal->name }}</option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Concepto</FONT></label>
                  <div class="col-md-6">
                    <input type="text" id="producto"  class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="precio" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Precio</FONT></label>
                  <div class="col-md-6">
                    <input type="text" id="precio"  class="form-control" pattern="^\d*.?\d*$">
                  </div>
                </div>
                  <input id="int" class="form-control" type="hidden" > <br>
                <div class="form-group row mb-0" aling='center'>
                    <div class="col-md-6 offset-md-4" aling='center'>
                        <button id="adicionar2" class="btn btn-success" type="button" aling='center'>Agregar</button>
                    </div>
                </div>
                <br>
                {!! Form::open(['route'=>['egre.store'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="enca" value="{{ Auth::user()->name }}">
                    <table  id="mytable2" class="table table-bordered table-hover ">
                      <tr>
                        <th><FONT FACE="Cooper Black" align='center'>Concepto</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Precio</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Eliminar</FONT></th>
                      </tr>
                    </table>
                    <div class="form-group row mb-0" align='center'>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrar Egresos') }}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
