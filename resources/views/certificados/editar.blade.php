@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Editar certificado
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('actualizarCertificado')}}">
                        @csrf
               
                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="id" value="{{$c->id}}">
                    <!-- nombres -->
                    <div class="form-group">
                        <label for="numeroEmision">Número de Emisión</label>
                        <input type="text" class="form-control{{ $errors->has('numeroEmision') ? ' is-invalid' : '' }}" id="numeroEmision" placeholder="Ingrese Número de Emisión" value="{{$c->numeroEmision}}" required="" name="numeroEmision">
                         @if ($errors->has('numeroEmision'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('numeroEmision') }}</strong>
                            </span>
                        @endif
                    </div>


                    <!-- apellidos -->
                    <div class="form-group">
                        <label for="cliente">Nombres y apllidos de cliente</label>
                        <input type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }}" id="cliente" placeholder="Ingrese Nombres y apllidos de cliente" value="{{$c->cliente}}" required="" name="cliente">
                         @if ($errors->has('cliente'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cliente') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    
                    <button class="btn btn-outline-dark btn-lg" type="submit">Actualizar certificado</button>
                    <a href="{{route('certificados')}}" class="btn btn-outline-primary btn-lg">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
       
    </div>
</div>



<script>
	$('#menu_certificados').addClass('active');
</script>
@endsection