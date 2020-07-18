@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  align='center'><FONT FACE="Cooper Black" align='center'>Registrar</FONT></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Nombre</FONT></label>
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
                            <label for="email" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Correo</FONT></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Contraseña</FONT></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Confimar Contraseña</FONT></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="suvursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></label>
                          <div class="col-md-6">
                            <select class="col-md-12 col-form-label text-md-right" name="sucursal">
                                <?php foreach ($sucursales as $sucursal): ?>
                                    <option value='{{ $sucursal->name }}'>{{ $sucursal->name }}</option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Tipo de Usuario</FONT></label>

                            <div class="col-md-6">
                                  <input type="radio" name="rol" value="1" required>Administrador
                                  <br><br>
                                  <input type="radio" name="rol" value="2" required>Empleado
                            </div>
                            <div class="form-group row mb-0" align='center'>
                                <div class="col-md-0 offset-md-0">
                                    <button type="submit" class="btn btn-primary">
                                        <FONT FACE="Cooper Black" align='center'>Registrar</FONT>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
