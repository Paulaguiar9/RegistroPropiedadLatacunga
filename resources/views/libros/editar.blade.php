@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Actualizar libro
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('actualizarLibro')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="accion" value="editar">
                        <input type="hidden" name="id" value="{{$l->id}}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tipo">Selecione Libro</label>
                            <select class="form-control" id="tipo" name="tipo" required="">
                                <option value="PROPIEDADES" {{$l->tipo=='PROPIEDADES'?'selected':''}}>PROPIEDADES</option>
                                <option value="HIPOTECAS" {{$l->tipo=='HIPOTECAS'?'selected':''}}>HIPOTECAS</option>
                                <option value="SENTENCIAS" {{$l->tipo=='SENTENCIAS'?'selected':''}}>SENTENCIAS</option>
                                <option value="PROPIEDAD HORIZONTAL" {{$l->tipo=='PROPIEDAD HORIZONTAL'?'selected':''}}>PROPIEDAD HORIZONTAL</option>
                                <option value="DEMANDAS" {{$l->tipo=='DEMANDAS'?'selected':''}}>DEMANDAS</option>
                                <option value="PROHIBICIONES" {{$l->tipo=='PROHIBICIONES'?'selected':''}}>PROHIBICIONES</option>
                                <option value="EMBARGOS" {{$l->tipo=='EMBARGOS'?'selected':''}}>EMBARGOS</option>
                                <option value="ACLARATORIAS" {{$l->tipo=='ACLARATORIAS'?'selected':''}}>ACLARATORIAS</option>
                                <option value="RESOLUCIONES" {{$l->tipo=='RESOLUCIONES'?'selected':''}}>RESOLUCIONES</option>
                                <option value="SERVIDUMBRES" {{$l->tipo=='SERVIDUMBRES'?'selected':''}}>SERVIDUMBRES</option>
                                <option value="EXPROPIACIONES" {{$l->tipo=='EXPROPIACIONES'?'selected':''}}>EXPROPIACIONES</option>

                            </select>
                        </div>
                        

                        <div class="col-md-6">
                            <label for="numeroTomo">Número de Tomo</label>
                            <input type="number" class="form-control{{ $errors->has('numeroTomo') ? ' is-invalid' : '' }}" id="numeroTomo" name="numeroTomo" placeholder="Ingrese número de tomo" value="{{$l->numeroTomo}}" >
                             @if ($errors->has('numeroTomo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('numeroTomo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- nombres -->
                    <div class="form-group">
                       <label for="anio">Años</label>
                        <input type="number" class="form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" id="anio" name="anio" placeholder="Ingrese año" value="{{$l->anio}}" >
                         @if ($errors->has('anio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('anio') }}</strong>
                            </span>
                        @endif
                    </div>


                    <!-- apellidos -->
                    <div class="form-group">
                        <label for="partidaInicio">Partida de Inicio</label>
                        <input type="number" class="form-control{{ $errors->has('partidaInicio') ? ' is-invalid' : '' }}" id="partidaInicio" name="partidaInicio" placeholder="Ingrese partida de inicio" value="{{$l->partidaInicio}}" >
                         @if ($errors->has('partidaInicio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('partidaInicio') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <div class="form-group row">
                        <div class="col-md-6">
                           <label for="fojaInicio">Foja de Inicio</label>
                            <input type="number" class="form-control{{ $errors->has('fojaInicio') ? ' is-invalid' : '' }}" id="fojaInicio" name="fojaInicio" placeholder="Ingrese foja de inicio" value="{{$l->fojaInicio}}" >
                             @if ($errors->has('fojaInicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fojaInicio') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="fechaPartidaInicio">Fecha partida de inicio</label>
                            <input type="date" class="form-control{{ $errors->has('fechaPartidaInicio') ? ' is-invalid' : '' }}" id="fechaPartidaInicio" name="fechaPartidaInicio" placeholder="Ingrese Fecha partida de inicio" value="{{ Carbon\Carbon::parse($l->fechaPartidaInicio)->format('Y-m-d') }}" >
                             @if ($errors->has('fechaPartidaInicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fechaPartidaInicio') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <div class="col-md-6">
                           <label for="partidaFin">Partida Fin</label>
                            <input type="number" class="form-control{{ $errors->has('partidaFin') ? ' is-invalid' : '' }}" id="partidaFin" name="partidaFin" placeholder="Ingrese Partida Fin" value="{{$l->partidaFin}}" >
                             @if ($errors->has('partidaFin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('partidaFin') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                           <label for="fojaFin">Foja fin</label>
                            <input type="number" class="form-control{{ $errors->has('fojaFin') ? ' is-invalid' : '' }}" id="fojaFin" name="fojaFin" placeholder="Ingrese Foja fin" value="{{$l->fojaFin}}" >
                             @if ($errors->has('fojaFin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fojaFin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        
                        <div class="col-md-12">
                             <label for="fechaPartidaFin">Fecha partida fin</label>
                            <input type="date" class="form-control{{ $errors->has('fechaPartidaFin') ? ' is-invalid' : '' }}" id="fechaPartidaFin" name="fechaPartidaFin" placeholder="Fecha partida fin" value="{{ Carbon\Carbon::parse($l->fechaPartidaFin)->format('Y-m-d') }}" >
                             @if ($errors->has('fechaPartidaFin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fechaPartidaFin') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>

                    <!-- direcion -->
                    <div class="form-group">
                        <label for="observacion">Observación</label>
                        <textarea class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" id="observacion" name="observacion" placeholder="Ingrese Observación">{{$l->observacion}}</textarea>
                         @if ($errors->has('observacion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('observacion') }}</strong>
                            </span>
                        @endif
                       
                    </div>
                    

                    @if($l->archivo)
                    <a href="{{asset('img/libros').'/'.$l->archivo}}">ver archivo</a>
                    @endif
                     <div class="form-group">
                        <label for="archivo">Archivo</label>
                        <input type="file" name="archivo" accept="application/pdf">
                    </div>
                    
                    <button class="btn btn-outline-dark btn-lg" type="submit">Actualizar Libro</button>
                    <a href="{{route('libros')}}" class="btn btn-outline-primary btn-lg">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
       
    </div>
</div>

<script>
	$('#menu_libros').addClass('active');
</script>
@endsection