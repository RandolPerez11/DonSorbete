@extends('layouts.app')

@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align='center'><FONT FACE="Cooper Black" align='center'>Cierre de Caja</FONT></div>

            <div class="card-body">
                @csrf
                {!! Form::open(['route'=>['vent.cierre'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group row">
                      <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></label>
                      <div class="col-md-6">
                        <select class="col-md-12 col-form-label text-md-right" name="sucursal">
                            <?php foreach ($sucursales as $sucursal): ?>
                                <option value='{{ $sucursal->name }}'>{{ $sucursal->name }}</option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4" align='center'>
                            <button type="submit" class="btn btn-primary">
                                <FONT FACE="Cooper Black" align='center'>Buscar</FONT>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
