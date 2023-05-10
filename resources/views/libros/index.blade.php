@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Crear nuevo libro
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('guardarLibro')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="accion" value="nuevo">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tipo">Selecione Libro</label>
                            <select class="form-control" id="tipo" name="tipo" required="">
                                <option value="PROPIEDADES">PROPIEDADES</option>
                                <option value="HIPOTECAS">HIPOTECAS</option>
                                <option value="SENTENCIAS">SENTENCIAS</option>
                                <option value="PROPIEDAD HORIZONTAL">PROPIEDAD HORIZONTAL</option>
                                <option value="DEMANDAS">DEMANDAS</option>
                                <option value="PROHIBICIONES">PROHIBICIONES</option>
                                <option value="EMBARGOS">EMBARGOS</option>
                                <option value="ACLARATORIAS">ACLARATORIAS</option>
                                <option value="RESOLUCIONES">RESOLUCIONES</option>
                                <option value="SERVIDUMBRES">SERVIDUMBRES</option>
                                <option value="EXPROPIACIONES">EXPROPIACIONES</option>


                            </select>
                        </div>
                        

                        <div class="col-md-6">
                            <label for="numeroTomo">Número de Tomo</label>
                            <input type="number" class="form-control{{ $errors->has('numeroTomo') ? ' is-invalid' : '' }}" id="numeroTomo" name="numeroTomo" placeholder="Ingrese número de tomo" value="{{old('numeroTomo')}}" >
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
                        <input type="number" class="form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" id="anio" name="anio" placeholder="Ingrese año" value="{{old('anio')}}" >
                         @if ($errors->has('anio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('anio') }}</strong>
                            </span>
                        @endif
                    </div>


                    <!-- apellidos -->
                    <div class="form-group">
                        <label for="partidaInicio">Partida de Inicio</label>
                        <input type="number" class="form-control{{ $errors->has('partidaInicio') ? ' is-invalid' : '' }}" id="partidaInicio" name="partidaInicio" placeholder="Ingrese partida de inicio" value="{{old('partidaInicio')}}" >
                         @if ($errors->has('partidaInicio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('partidaInicio') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <div class="form-group row">
                        <div class="col-md-6">
                           <label for="fojaInicio">Foja de Inicio</label>
                            <input type="number" class="form-control{{ $errors->has('fojaInicio') ? ' is-invalid' : '' }}" id="fojaInicio" name="fojaInicio" placeholder="Ingrese foja de inicio" value="{{old('fojaInicio')}}" >
                             @if ($errors->has('fojaInicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fojaInicio') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="fechaPartidaInicio">Fecha partida de inicio</label>
                            <input type="date" class="form-control{{ $errors->has('fechaPartidaInicio') ? ' is-invalid' : '' }}" id="fechaPartidaInicio" name="fechaPartidaInicio" placeholder="Ingrese Fecha partida de inicio" value="{{old('fechaPartidaInicio')}}" >
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
                            <input type="number" class="form-control{{ $errors->has('partidaFin') ? ' is-invalid' : '' }}" id="partidaFin" name="partidaFin" placeholder="Ingrese Partida Fin" value="{{old('partidaFin')}}" >
                             @if ($errors->has('partidaFin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('partidaFin') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                           <label for="fojaFin">Foja fin</label>
                            <input type="number" class="form-control{{ $errors->has('fojaFin') ? ' is-invalid' : '' }}" id="fojaFin" name="fojaFin" placeholder="Ingrese Foja fin" value="{{old('fojaFin')}}" >
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
                            <input type="date" class="form-control{{ $errors->has('fechaPartidaFin') ? ' is-invalid' : '' }}" id="fechaPartidaFin" name="fechaPartidaFin" placeholder="Fecha partida fin" value="{{old('fechaPartidaFin')}}" >
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
                        <textarea required="" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" id="observacion" name="observacion" placeholder="Ingrese Observación">{{old('observacion')}}</textarea>
                         @if ($errors->has('observacion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('observacion') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="archivo">Archivo</label>
                        <input type="file" name="archivo" accept="application/pdf">
                   </div>
                   <div class="form-group">
                        <label color="red" for="nota">
                        <font color="red">Tamaño Maximo</font> 
                        </label>
                   </div>
                    
                    <button class="btn btn-outline-dark btn-lg" type="submit">Ingresar nuevo Libro</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    <form class="form-inline" action="{{route('export')}}">
                      <label class="" for="inlineFormInput">Exportar lista de libros a Excel por año. </label>
                      <input type="number" required="" name="anio" class="form-control mb-2 mr-sm-2 mb-sm-0">
                      <button type="submit" class="btn btn-primary">Exportar a excel</button>
                    </form>
                    Listado de libros
                </div>

                <div class="card-body">
                     <div class="table-responsive">
                        {!! $dataTable->table() !!}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! $dataTable->scripts() !!}

<script>
	$('#menu_libros').addClass('active');
</script>
@endsection