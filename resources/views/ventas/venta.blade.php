@extends('layouts.app')

@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
              <div class="card-header"  align='center'><h3><FONT FACE="Cooper Black" align='center'>{{ __('Ventas') }}</FONT></h3></div>
              <div class="card-body">
                  @csrf
                  <ul>
                    <?php $i=1; ?>
                    @foreach ($config as $conf)
                        <li>
                          <input type="radio" value="{{$conf->name}}" id="myCheckbox{{$i}}" name="product"/>
                          <label for="myCheckbox{{$i}}"><img src="{{url($conf->url)}}" /></label>
                          <input type="hidden" id="p_{{$conf->name}}" value="{{$conf->precio}}">
                        </li>
                        <?php $i++; ?>
                    @endforeach
                    <h5>Promociones</h5>
                    <hr>
                    <?php $con=0; ?>
                    @foreach ($promo as $p)
                        <?php
                         if ($p->activo == 1): ?>
                          <li>
                              <?php $con=1; ?>
                              <input type="checkbox" name="p" id="{{$p->producto}}" value="{{ $p->producto." ".$p->promo}}">
                              <label for="{{$p->producto}}" class="col-auto col-form-label"><FONT FACE="Cooper Black" align='center'>{{ $p->producto." ".$p->promo}}</FONT></label>
                          </li>
                        <?php endif; ?>

                    @endforeach
                    <?php if ($con==0): ?>
                        <h6>No hay Promociones</h6>
                    <?php endif; ?>
                    <hr>
                  </ul>
                  <input id="int" class="form-control" type="hidden" > <br>
                <div class="form-group row mb-0" aling='center'>
                    <div class="col-md-6 offset-md-4" aling='center'>
                        <button id="adicionar" class="btn btn-success" type="button" aling='center'><FONT FACE="Cooper Black" align='center'>Agregar</FONT></button>
                    </div>
                </div>
                <br>
                {!! Form::open(['route'=>['vent.create'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}

                    <input type="hidden" id="total" name="total" value="0">
                    <input type="hidden" name="enca" value="{{ Auth::user()->name }}">
                    <table  id="mytable" class="table table-bordered table-hover ">
                      <tr>
                        <th><FONT FACE="Cooper Black" align='center'>Productos</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Precio</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Promoción</FONT></th>
                        <th><FONT FACE="Cooper Black" align='center'>Eliminar</FONT></th>
                      </tr>
                    </table>
                    <div class="form-group row mb-0" align='center'>
                        <div class="col-md-6 offset-md-4">
                            <h4><div id="adicionados"></div></h4>
                        </div>
                    </div>
                    <div class="form-group row mb-0" align='center'>
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user-id" aling='center'>
                              <FONT FACE="Cooper Black" align='center'>Finalizar Venta</FONT>
                            </button>
                        </div>
                    </div>

                    <div id="user-id" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" align='center'>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                      <div class="form-group row">
                                          <label class="col-md-4 col-form-label text-md-right" size=4></label>
                                          <h3 align="center"><i><FONT FACE="Cooper Black" align='center'>{{ __('Total: $ ') }}</FONT><span id="spTotalVen"></i></h3>
                                      </div>
                                      <div class="form-group row">
                                          <label for="txt_campo_1" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>{{ __('Su Pago: ') }}</FONT></label>
                                          <div class="col-md-6">
                                              <input type="text" id="txt_campo_1"name="paga" class="form-control monto" placeholder="0" onkeyup="sumar();" pattern="^\d*.?\d*$">
                                              </div>
                                          <label class="col-md-4 col-form-label text-md-right" size=4></label>
                                          <h3 align="center"><i><FONT FACE="Cooper Black" align='center'>{{ __('Cambio: $ ') }}</FONT><span id="spTotal"></i></h3>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><FONT FACE="Cooper Black" align='center'>Cancelar</FONT></button>
                                    <button type="submit" class="btn btn-primary" id='boton' disabled="disabled"><FONT FACE="Cooper Black" align='center'>{{ __('Aceptar') }}</FONT></button>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
              </div>
        </div>
  </div>
</div>
@endsection
