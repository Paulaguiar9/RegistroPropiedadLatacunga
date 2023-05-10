@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    <a href="{{route('distribuirCertificados')}}" class="btn btn-dark">Atras</a>
                </div>

                <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                            Lista de usuarios
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Usuario</th>
                                          <th scope="col">Distribuir</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($usuarios as $u)
                                        <tr>
                                          <th scope="row">
                                              @include('certificados.infousuario',['u'=>$u])
                                          </th>
                                          <td>
                                              <a href="{{route('asignarCertificado',['idUser'=>$u->id,'idCert'=>$idCert])}}" class="btn btn-info">Distribuir</a>
                                          </td>
                                          
                                        </tr>
                                        @endforeach
                                        
                                      </tbody>
                                    </table>
                                </div>
                         </div>
                         <div class="col-md-6">
                            Certificados aplicados a usuarios
                                <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">N° de emisión</th>
                                          <th scope="col">Cliente</th>
                                          <th scope="col">Usuario</th>
                                          <th scope="col">Estado</th>
                                          <th scope="col">Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        

                                        @foreach($distribuciones as $d)
                                        <tr>
                                          <th scope="row">
                                             {{$d->certificado->numeroEmision}}
                                          </th>
                                          <td>{{$d->certificado->cliente}}</td>
                                          <td>
                                              {{$d->usuario->nombres}} {{$d->usuario->apellidos}}
                                          </td>
                                          <td>
                                              @if($d->estado==1)
                                                <span class="badge badge-warning">Enviado</span>
                                                
                                              @endif

                                              @if($d->estado==2)
                                                <span class="badge badge-success">Aprobado</span>
                                              @endif

                                              @if($d->estado==3)
                                                <span class="badge badge-danger">Reprobado</span>
                                              @endif


                                          </td>

                                          <td>
                                              @if($d->estado==1)
                                                <button class="btn btn-danger btn-lg" data-url="{{route('eliminarDistribucionCertificadoUsuario',['id'=>$d->id])}}" onclick="eliminar(this);">Eliminar</button>
                                              @endif

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
        </div>
    </div>
</div>

<script>
	$('#menu_distrubuir_certificados').addClass('active');
</script>
@endsection