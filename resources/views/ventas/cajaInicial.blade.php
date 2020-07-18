@extends('layouts.app')
@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"  align='center'><h4><FONT FACE="Cooper Black" align='center'>{{ __('Caja Inicial') }}</FONT></h4></div>
            <div class="card-body">
                {!! Form::open(['route'=>['vent.cajaInicial'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                    @can('users.index')
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
                    @else
                      <input type="hidden" name="sucursal" value="{{ Auth::user()->sucursal }}">
                    @endcan
                    <div class="form-group row">
                        <label for="_1" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>{{ __('Caja Inicial: ') }}</FONT></label>
                        <div class="col-md-6">
                            <input id="_1" type="number" class="form-control" placeholder="0" name="_1">
                        </div>
                    </div>
                    <div class="form-group row mb-0" align='center'>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <FONT FACE="Cooper Black" align='center'>{{ __('Registrar') }}</FONT>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
