@extends('layouts.app')

@section('content')
  @include('alertas.alerta')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  align='center'>{{ __('Editar') }}</div>
                <div class="card-body">
                  {!! Form::model($user,['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre: ') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo:') }}</label>

                      <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email ?? old('email') }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña: ') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control"  name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="suvursal" class="col-md-4 col-form-label text-md-right">{{ __('Sucursal: ') }}</label>
                      <div class="col-md-6">
                        <select class="col-md-12 col-form-label text-md-right" name="sucursal">
                            <?php foreach ($sucursales as $sucursal): ?>
                                <option value='{{ $sucursal->name }}'>{{ $sucursal->name }}</option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>


                        <br>
                        <h3>Lista de roles</h3>
                        <div class="form-group">
                          <ul class="list-unstyled">
                            @foreach ($roles as $role)
                              <li>
                                <label>
                                  {{ Form::checkbox('roles[]', $role->id, null) }}
                                  {{ $role->name }}
                                  <em>({{ $role->description ?: 'Sin descripcion' }})</em>
                                </label>
                              </li>
                            @endforeach
                          </ul>
                        </div>

                        <div class="form-group row mb-0" align='center'>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
