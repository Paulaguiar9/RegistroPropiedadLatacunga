@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    <a href="{{route('home')}}" class="btn btn-dark">Atras</a>
                    Listado libros
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="reportePrestamo">
                          <thead>
                            <tr>
                              <th scope="col">Tipo</th>
                              <th scope="col">Anio</th>
                              <th scope="col">Partida inicio</th>
                              <th scope="col">Foja Inicio</th>
                              <th scope="col">Fecha de partida de inicio</th>
                              <th scope="col">Partida fin</th>
                              <th scope="col">Foja fin</th>
                              <th scope="col">Fecha de partida fin</th>
                              <th scope="col">Observacion</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($libros as $libro)
                            <tr>
                              <th scope="row">{{$libro->tipo}}</th>
                              <th>{{$libro->anio}}</th>
                              <td>{{$libro->partidaInicio}}</td>
                              <td>{{$libro->fojaInicio}}</td>
                              <td>{{$libro->fechaPartidaInicio}}</td>
                              <td>{{$libro->partidaFin}}</td>
                              <td>{{$libro->fojaFin}}</td>
                              <td>{{$libro->fechaPartidaFin}}</td>
                              <td>{{$libro->observacion}}</td>
                          
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

<script>
  $('#menu_inicio').addClass('active');
  $('#reportePrestamo').DataTable();

</script>
@endsection