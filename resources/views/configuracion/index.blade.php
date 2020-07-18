@extends('layouts.app')

@section('content')
@include('alertas.alerta')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align='center'><FONT FACE="Cooper Black" align='center'>Configuración</FONT></div>

            <div class="card-body">

                <div class="tab" align='center'>
                  <button class="tablinks" onclick="openCity(event, 'Img')"><FONT FACE="Cooper Black" align='center'>Imagenes</FONT></button>
                  <button class="tablinks" onclick="openCity(event, 'Pre')"><FONT FACE="Cooper Black" align='center'>Precios</FONT></button>
                  <button class="tablinks" onclick="openCity(event, 'Pro')"><FONT FACE="Cooper Black" align='center'>Activar Promociones</FONT></button>
                  <button class="tablinks" onclick="openCity(event, 'MPro')"><FONT FACE="Cooper Black" align='center'>Modificar Promociones</FONT></button>
                </div>
                @csrf

                <div id="Img" class="tabcontent">
                  {!! Form::open(['route'=>['config.create'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Mini</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalmini" class="input-value"></div>
                              <label for="file_mini"></label>
                              <input id="file_mini" class="upload" name="mini" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Chico</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalchico" class="input-value"></div>
                              <label for="file_chico"></label>
                              <input id="file_chico" class="upload" name="chico" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Mediano</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalmediano" class="input-value"></div>
                              <label for="file_mediano"></label>
                              <input id="file_mediano" class="upload" name="mediano" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Grande</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalgrande" class="input-value"></div>
                              <label for="file_grande"></label>
                              <input id="file_grande" class="upload" name="grande" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Medio Litro</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalml" class="input-value"></div>
                              <label for="file_ml"></label>
                              <input id="file_ml" class="upload" name="ml" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Litro</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvall" class="input-value"></div>
                              <label for="file_l"></label>
                              <input id="file_l" class="upload" name="l" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cono Sencillo</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalcs" class="input-value"></div>
                              <label for="file_cs"></label>
                              <input id="file_cs" class="upload" name="cs" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cono Doble</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalcd" class="input-value"></div>
                              <label for="file_cd"></label>
                              <input id="file_cd" class="upload" name="cd" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cazuela Sencilla</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalcas" class="input-value"></div>
                              <label for="file_cas"></label>
                              <input id="file_cas" class="upload" name="cas" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cazuela Doble</FONT></label>
                        <div class="col-md-6">
                          <div class="input__row uploader">
                              <div id="inputvalcad" class="input-value"></div>
                              <label for="file_cad"></label>
                              <input id="file_cad" class="upload" name="cad" type="file" accept="image/png, .jpeg, .jpg, image/gif">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4" align='center'>
                              <button type="submit" class="btn btn-primary">
                                  <FONT FACE="Cooper Black" align='center'>Guardar</FONT>
                              </button>
                          </div>
                      </div>
                  {!! Form::close() !!}
                </div>

                <div id="Pre" class="tabcontent">
                  {!! Form::open(['route'=>['config.store'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Mini</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','mini')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" min="1" name="mini">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Chico</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','chico')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="chico">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Mediano</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','Mediano')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="mediano">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Grande</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','grande')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="grande">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Medio Litro</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','medio litro')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="ml">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Litro</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','litro')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="l">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cono Sencillo</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','cono sencillo')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="cs">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cono Doble</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','cono doble')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="cd">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cazuela Sencilla</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','cazuela sencilla')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="cas">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="sucursal" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>Cazuela Doble</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('configuracion')->where('name','cazuela doble')->pluck('precio');
                          @endphp
                          <input  type="number" class="form-control" placeholder="{{ $pre[0] }}" name="cad">
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4" align='center'>
                              <button type="submit" class="btn btn-primary">
                                  <FONT FACE="Cooper Black" align='center'>Guardar</FONT>
                              </button>
                          </div>
                      </div>
                  {!! Form::close() !!}
                </div>

                <div id="Pro" class="tabcontent">
                  <div class="row justify-content-center">
                      {!! Form::open(['route'=>['config.promo'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                      <?php foreach ($Promos as $conf): ?>
                        <?php if ($conf->activo == 1): ?>
                          <div class="form-group row">
                            <input type="checkbox" name="{{ $conf->producto }}" id="{{$conf->producto}}" value="1" checked>
                            <label for="{{$conf->producto}}" class="col-auto col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>{{ $conf->producto." ".$conf->promo}}</FONT></label>
                          </div>
                        <?php else: ?>
                          <div class="form-group row">
                            <input type="checkbox" name="{{ $conf->producto }}" id="{{$conf->producto}}" value="1">
                            <label for="{{$conf->producto}}" class="col-auto col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>{{ $conf->producto." ".$conf->promo}}</FONT></label>
                          </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-2" align='center'>
                                  <button type="submit" class="btn btn-primary">
                                      <FONT FACE="Cooper Black" align='center'>Guardar</FONT>
                                  </button>
                              </div>
                          </div>
                      {!! Form::close() !!}
                  </div>
                </div>

                <div id="MPro" class="tabcontent">
                  {!! Form::open(['route'=>['config.promo2'], 'method'=>'POST', "files"=>"true", 'enctype'=>'multipart/form-data']) !!}
                  <?php foreach ($Promos as $conf): ?>

                      <div class="form-group row">
                        <label for="{{$conf->producto}}" class="col-md-4 col-form-label text-md-right"><FONT FACE="Cooper Black" align='center'>{{ $conf->producto}}</FONT></label>
                        <div class="col-md-6">
                          @php
                            $pre=DB::table('promocion')->where('producto',$conf->producto)->pluck('promo');
                          @endphp
                          <input  type="text" class="form-control" placeholder="{{ $pre[0] }}" pattern="[1-9][x][1-9]" name="{{$conf->producto}}">
                        </div>
                      </div>
                    <?php endforeach; ?>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4" align='center'>
                              <button type="submit" class="btn btn-primary">
                                  <FONT FACE="Cooper Black" align='center'>Guardar</FONT>
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
