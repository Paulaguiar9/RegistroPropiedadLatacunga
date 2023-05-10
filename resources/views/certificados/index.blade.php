@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Crear nuevo certificado
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('guardarCertificado')}}">
                        @csrf
               
                    <input type="hidden" name="accion" value="nuevo">
                    <!-- nombres -->
                    <div class="form-group">
                        <label for="numeroEmision">Número de Emisión</label>
                        <input type="text" class="form-control{{ $errors->has('numeroEmision') ? ' is-invalid' : '' }}" id="numeroEmision" placeholder="Ingrese Número de Emisión" value="{{old('numeroEmision')}}" required="" name="numeroEmision">
                         @if ($errors->has('numeroEmision'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('numeroEmision') }}</strong>
                            </span>
                        @endif
                    </div>


                    <!-- apellidos -->
                    <div class="form-group">
                        <label for="cliente">Nombres y apllidos de cliente</label>
                        <input type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }}" id="cliente" placeholder="Ingrese Nombres y apllidos de cliente" value="{{old('cliente')}}" required="" name="cliente">
                         @if ($errors->has('cliente'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cliente') }}</strong>
                            </span>
                        @endif
                    </div>
                    

                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" id="fecha" value="{{old('fecha')}}" required="" name="fecha">
                         @if ($errors->has('fecha'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fecha') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
                    <button class="btn btn-outline-dark btn-lg" type="submit">Ingresar nuevo certificado</button>

                    </form>
                </div>

            </div>


            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Imprimir certificados por fecha
                </div>

                <div class="card-body">
                    <form method="get" action="{{route('imprimirCertificadoHoy')}}">
                        
                        <label for="">Ingrese fecha</label>
                        <input type="date" name="fi" required="" class="form-control">
                        <br>
                        <button class="btn btn-outline-dark btn-lg" type="submit">Imprimir</button>
                    </form>
                </div>
                
            </div>


        </div>
        <div class="col-md-7">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Listado de certicados
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
	$('#menu_certificados').addClass('active');
</script>
@endsection