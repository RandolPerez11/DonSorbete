@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align='center'><FONT FACE="Cooper Black" align='center'>Registrar Sucursal</FONT></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sucur.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" name="name" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Nombre de la Sucursal</FONT></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dire" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Dirección</FONT></label>
                            <div class="col-md-6">
                                <input id="dire" type="text" class="form-control" name="direccion" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Teléfono</FONT></label>
                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control" name="telefono" pattern="[0-9]{10}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" align='center'>
                                <button type="submit" class="btn btn-primary">
                                    <FONT FACE="Cooper Black" align='center'>Registrar</FONT>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
