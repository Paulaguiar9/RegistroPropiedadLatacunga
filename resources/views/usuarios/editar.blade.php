@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Crear nuevo usuario
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('actualizarUsuario')}}">
                        @csrf
                         <input type="hidden" name="accion" value="editar">
                        <input type="hidden" name="id" value="{{$u->id}}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="perfil">Selecione perfil</label>
                            <select class="form-control" id="perfil" name="perfil" required="">
                               
                               <option value="Digitalizador" {{$u->perfil=='Digitalizador'?'selected':''}} >Digitalizador</option>
                                <option value="Prestamista" {{$u->perfil=='Prestamista'?'selected':''}} >Prestamista</option>
                                <option value="Certificadores" {{$u->perfil=='Certificadores'?'selected':''}} >Certificadores</option>
                                <option value="Distribuidor de Certificados" {{$u->perfil=='Distribuidor de Certificados'?'selected':''}} >Distribuidor de Certificados</option>
                                <option value="Consultor" {{$u->perfil=='Consultor'?'selected':''}} >Consultor</option>
                                <option value="Ingreso de certificados" {{$u->perfil=='Ingreso de certificados'?'selected':''}} >Ingreso de certificados</option>

                                
                            </select>
                        </div>
                        

                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Ingrese email" value="{{$u->email}}" >
                             @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- nombres -->
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" id="nombres" placeholder="Ingrese nombres" value="{{$u->nombres}}" required="" name="nombres">
                         @if ($errors->has('nombres'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombres') }}</strong>
                            </span>
                        @endif
                    </div>


                    <!-- apellidos -->
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" id="apellidos" placeholder="Ingrese apellidos" value="{{$u->apellidos}}" required="" name="apellidos">
                         @if ($errors->has('apellidos'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('apellidos') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <!-- cedula -->
                            <label for="cedula">Cédula</label>
                            <input type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" id="cedula" placeholder="Ingrese cedula" value="{{$u->cedula}}" required="" name="cedula">
                             @if ($errors->has('cedula'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <!-- Télefono -->
                            <label for="telefono">Teléfono/Celular</label>
                            <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" id="telefono" placeholder="Ingrese teléfono" value="{{$u->telefono}}" name="telefono">
                             @if ($errors->has('cedula'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <div class="col-md-6">
                            <!-- Sexo -->
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo" required="">
                                <option value="1" {{$u->sexo==true?'selected':''}}>Hombre</option>
                                <option value="0" {{$u->sexo==false?'selected':''}}>Mujer</option>
                            </select>
                             @if ($errors->has('sexo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <!-- estado -->
                           <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required="">
                                <option value="1" {{$u->estado==true?'selected':''}}>Activo</option>
                                <option value="0" {{$u->estado==false?'selected':''}}>Inactivo</option>
                            </select>
                             @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                   

                    <!-- direcion -->
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" id="direccion" name="direccion" placeholder="Ingrese dirección">{{$u->direccion}}</textarea>
                         @if ($errors->has('direccion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <button class="btn btn-outline-dark btn-lg" type="submit">Actualizar usuario</button>
                    <a href="{{route('usuarios')}}" class="btn btn-outline-primary btn-lg">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>

<script>
	$('#menu_usuarios').addClass('active');
</script>
@endsection