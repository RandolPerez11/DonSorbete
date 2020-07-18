@extends('layouts.app')
@section('content')
@include('alertas.alerta')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <h4 align='center'><FONT FACE="Cooper Black" align='center'>Usuarios</FONT></h4>
                    @can ('users.create')
                      <a style="background-color:#6AA7FC; border:#6AA7FC;" href="{{ route('users.create') }}"
                      class="btn btn-success my-2 my-sm-0">
                        <FONT FACE="Cooper Black" align='center'>Crear</FONT>
                      </a>
                    @endcan
                    <nav class="navbar navbar-light bg-light float-right">
                   <form class="form-inline" action="{{ route('users.index')}}" method='get'>
                     <input value="{{isset($busqueda)?$busqueda:'' }}" name="search" class="form-control mr-sm-2" type="search" placeholder="Nombre" aria-label="Search">
                               <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                         </form>
                     </nav>
                  </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th><FONT FACE="Cooper Black" align='center'>Nombre</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Correo</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></th>
                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->sucursal }}</td>
                          <td width="10px">
                            @can ('users.edit')
                              <a style="background-color:orange; border:orange;" href="{{ route('users.edit', $user->id ) }}"
                              class="btn btn-sm btn-success">
                                Editar/Permisos
                              </a>
                            @endcan
                          </td>
                          <td width="10px">
                            @can ('users.destroy')
                            <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}"
                                onclick="return confirm('¿Seguro que deseas eliminar a {{$user->name}}?')">
                                <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                </span>
                                Eliminar
                            </a>
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $users->render() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
