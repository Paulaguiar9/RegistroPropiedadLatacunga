@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Crear nuevo usuario
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('guardarUsuario')}}">
                        @csrf
                        <input type="hidden" name="accion" value="nuevo">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="perfil">Selecione perfil</label>
                            <select class="form-control" id="perfil" name="perfil" required="">
                                <option value="Digitalizador">Digitalizador</option>
                                <option value="Prestamista">Prestamista</option>
                                <option value="Certificadores">Certificadores</option>
                                <option value="Distribuidor de Certificados">Distribuidor de Certificados</option>
                                <option value="Consultor">Consultor</option>
                                <option value="Ingreso de certificados">Ingreso de certificados</option>
                                
                            </select>
                        </div>
                        

                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Ingrese email" value="{{old('email')}}" required="" >
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
                        <input type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" id="nombres" placeholder="Ingrese nombres" value="{{old('nombres')}}" required="" name="nombres">
                         @if ($errors->has('nombres'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombres') }}</strong>
                            </span>
                        @endif
                    </div>


                    <!-- apellidos -->
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" id="apellidos" placeholder="Ingrese apellidos" value="{{old('apellidos')}}" required="" name="apellidos">
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
                            <input type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" id="cedula" placeholder="Ingrese cedula" value="{{old('cedula')}}" required="" name="cedula">
                             @if ($errors->has('cedula'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <!-- Télefono -->
                            <label for="telefono">Teléfono/Celular</label>
                            <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" id="telefono" placeholder="Ingrese teléfono" value="{{old('telefono')}}" name="telefono">
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
                                <option value="1">Hombre</option>
                                <option value="0">Mujer</option>
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
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                             @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        
                        <div class="col-md-6">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ingrese contraseña">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        

                        <div class="col-md-6">
                            <label for="password-confirm">{{ __('Confirme contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme contraseña">
                        </div>
                    </div>

                    <!-- direcion -->
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" id="direccion" name="direccion" placeholder="Ingrese dirección">{{old('direccion')}}</textarea>
                         @if ($errors->has('direccion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <button class="btn btn-outline-dark btn-lg" type="submit">Ingresar nuevo usuario</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Listado de usarios
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
	$('#menu_usuarios').addClass('active');
</script>
@endsection