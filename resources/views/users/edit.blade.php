@extends('layouts.app')

@section('content')
  @include('alertas.alerta')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align='center'><FONT FACE="Cooper Black" align='center'>Editar</FONT></div>
                <div class="card-body">
                  {!! Form::model($user,['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Nombre</FONT></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Correo</FONT></label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Contraseña</FONT></label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control"  name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="sucursal" class="col-md-4 col-form-label text-md-right" ><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></label>
                      <div class="col-md-6">
                        <select class="col-md-12 col-form-label text-md-right" name="sucursal" id="sucursal">
                            <?php foreach ($sucursales as $sucursal): ?>
                                <option value='{{ $sucursal->name }}'>{{ $sucursal->name }}</option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>


                        <br>
                        <h3 align='center'><FONT FACE="Cooper Black" align='center'>Tipo de Usuario</FONT></h3>
                        <div class="form-group">
                          <ul class="list-unstyled">
                            @foreach ($roles as $role)
                              @if($role->name != 'Sin Acceso al Sistema')
                                  <li>
                                    @php
                                      $rol=DB::table('role_user')->where('user_id',$user->id)->pluck('role_id');
                                    @endphp
                                    @if($role->id == $rol[0])
                                      <input type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->id}}" checked>
                                    @else
                                      <input type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->id}}">
                                    @endif
                                    <label for="{{$role->id}}" class="col-lg-auto col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>{{ $role->name}}</FONT>
                                      <em>({{ $role->description ?: 'Sin descripcion' }})</em>
                                    </label>
                                  </li>
                              @endif
                            @endforeach
                          </ul>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" align='center'>
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
