@extends('layouts.app')
@section('content')
@include('alertas.alerta')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <h4 align='center'><FONT FACE="Cooper Black" align='center'>Egresos del día</FONT></h4>
                    @can ('users.create')
                      <a style="background-color:#6AA7FC; border:#6AA7FC;" href="{{ route('egre.create') }}"
                      class="btn btn-success my-2 my-sm-0">
                        <FONT FACE="Cooper Black" align='center'>Crear</FONT>
                      </a>
                    @endcan
                  </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th><FONT FACE="Cooper Black" align='center'>Concepto</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Precio</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Empleado</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Sucursal</FONT></th>
                        <th colspan="3">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Egresos as $egresos)
                        <tr>
                          <td>{{ $egresos->producto}}</td>
                          <td>{{ $egresos->precio }}</td>
                          <td>{{ $egresos->usuario }}</td>
                          <td>{{ $egresos->sucursal }}</td>
                          <td width="10px">
                            @can ('users.destroy')
                            <a class="btn btn-danger" href="{{ route('egre.destroy',$egresos->id) }}"
                                onclick="return confirm('¿Seguro que deseas eliminarlo?')">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
