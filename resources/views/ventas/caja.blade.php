@extends('layouts.app')

@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align='center';><h4><FONT FACE="Cooper Black" align='center'>{{ __('Cierre de Caja de la Sucursal ').$sucursal }}</FONT></h4></div>
            <div class="card-body">
                @csrf
                <div class=" row">
                    <label class="col-md-6 col-form-label text-md-right">{{ __('Total de Ventas:') }}</label>
                    <div class="col-auto">
                        <label class="col-auto col-form-label text-md-right">{{ __('$').$venta }}</label>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-6 col-form-label text-md-right">{{ __('+ Caja Inicial:') }}</label>
                    <div class="col-auto">
                        <label class="col-auto col-form-label text-md-right">{{ __('$').$caja }}</label>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-6 col-form-label text-md-right"><u>{{ __('- Gastos del Día:') }}</u></label>
                    <div class="col-auto">
                        <label class="col-auto col-form-label text-md-right"><u>{{ __('$').$tEgresos }}</u></label>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-6 col-form-label text-md-right">{{ __('Total en Caja:') }}</label>
                    <div class="col-auto">
                        <label class="col-auto col-form-label text-md-right">{{ __('$').$ganancia }}</label>
                    </div>
                </div>
                <div class="form-group row mb-0" align='center'>
                    
                </div>
                
                {!! Form::open(['route'=>['vent.cierreCaja'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="sucursal" value="{{$sucursal}}">
                    <div class="form-group row mb-0" align='center'>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <FONT FACE="Cooper Black" align='center'>{{ __('Cerrar Caja') }}</FONT>
                            </button>
                            <a  href="{{ route('vent.index') }}"
                                    class="btn btn-sm btn-danger">
                                        Cancelar
                            </a>
                        </div>
                    </div>
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection
