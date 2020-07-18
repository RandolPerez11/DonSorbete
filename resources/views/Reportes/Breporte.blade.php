@extends('layouts.app')

@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align='center'><FONT FACE="Cooper Black" align='center'>Reporte</FONT></div>

            <div class="card-body">
                @csrf
                {!! Form::open(['route'=>['config.repor'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group row">
                      <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></label>
                      <div class="col-md-6">
                        <select class="col-md-7 col-form-label text-md-right" name="sucursal">
                            <?php foreach ($sucursales as $sucursal): ?>
                                <option value='{{ $sucursal->name }}'>{{ $sucursal->name }}</option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Tipo de Reporte</FONT></label>
                      <div class="col-md-6">
                        <input type="radio" name="rol" value="1" required>Ingresos
                        <br>
                        <input type="radio" name="rol" value="2" required>Egresos
                        <br>
                        <input type="radio" name="rol" value="3" required>Ingresos/Egresos
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Fecha Inicial</FONT></label>
                      <div class="col-md-6">
                        <input type="date" class="col-md-6 col-form-label text-md-right" name="fi" value="" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Fecha Final</FONT></label>
                      <div class="col-md-6">
                        <input type="date" class="col-md-6 col-form-label text-md-right" name="ff" value="" required>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4" align='center'>
                            <button type="submit" class="btn btn-primary">
                                <FONT FACE="Cooper Black" align='center'>Generar</FONT>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
