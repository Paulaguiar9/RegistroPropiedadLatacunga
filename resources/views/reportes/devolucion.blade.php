@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    <a href="{{route('home')}}" class="btn btn-dark">Atras</a>
                    Listado devoluciones
                </div>

                <div class="card-body">
                     @if($dev->count()>0)
                     <p><strong>{{$dev->count()}}</strong> Devoluciones encontrados</p>
                       <div class="table-responsive">

                                <table class="table table-bordered" id="reportePrestamo">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Usuario</th>
                                      <th scope="col">Libro</th>
                                      <th scope="col">Observación</th>
                                      <th scope="col">Fecha</th>
                                      <th scope="col">Estado</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    @php($i=0)
                                    @foreach($dev as $d)
                                    @php($i++)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                      <td>
                                        @include('usuarios.info', ['p'=>$d->prestamo])
                                      </td>
                                      <td>
                                        @include('libros.info', ['p'=>$d->prestamo])
                                      </td>
                                      <td>{{$d->observacion}}</td>
                                      <td>
                                        {{$d->created_at}} <small>{{$d->created_at->diffForHumans()}}</small>
                                      </td>
                                      <td>
                                        @if($d->prestamo->estado)
                                        <span class="badge badge-success">Prestado</span>
                                        @else
                                        <span class="badge badge-warning">Devuelto</span>
                                        @endif
                                      </td>
                                    </tr>
                                    @endforeach

                                  </tbody>
                                </table>



                        </div>
                      @else
                        <div class="alert alert-warning" role="alert">
                          <strong>No existe prestamos en este rango de fechas!</strong>
                        </div>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $('#menu_inicio').addClass('active');
  $('#reportePrestamo').DataTable();
</script>
@endsection