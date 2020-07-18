@extends('layouts.app')

@section('content')
@include('alertas.alerta')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h4  align='center'><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></h4>
                    @can ('users.create')
                      <a style="background-color:#6AA7FC; border:#6AA7FC; text-align: right;"  align='right' href="{{ route('sucur.create') }}"
                      class="btn btn-success my-2 my-sm-0">
                        <FONT FACE="Cooper Black" align='center'>Crear</FONT>
                      </a>
                    @endcan
                    <nav class="navbar navbar-light bg-light float-right">
                   <form class="form-inline" action="{{ route('sucur.index')}}" method='get'>
                     <input value="{{isset($busqueda)?$busqueda:'' }}" name="search" class="form-control mr-sm-2" type="search" placeholder="Nombre" aria-label="Search">
                               <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                         </form>
                     </nav>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th ><FONT FACE="Cooper Black" align='center'>Nombre</FONT></th>
                        <th ><FONT FACE="Cooper Black" align='center'>Dirección</FONT></th>
                        <th ><FONT FACE="Cooper Black" align='center'>Teléfono</FONT></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->direccion }}</td>
                          <td>{{ $user->telefono }}</td>
                          <td width="10px">
                            @can ('users.destroy')
                            <a class="btn btn-danger" href="{{ route('sucur.destroy',$user->id) }}"
                                onclick="return confirm('¿Seguro que deseas eliminar la sucursal: {{$user->name}}?')">
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
