<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Distribuciones</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="window.print()">

  <div class="card-body">
       @if($dis->count()>0)
       <p><strong>{{$dis->count()}}</strong> Distribuciones encontrados</p>
         <div class="table-responsive">

                  <table class="table table-bordered" id="reportePrestamo">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">N° de emisión</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php($i=0)
                      @foreach($dis as $d)
                      @php($i++)
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>
                          {{$d->usuario->nombres}} {{$d->usuario->apellidos}}
                        </td>
                        <td>
                          {{$d->certificado->cliente}}
                        </td>
                        <td>{{$d->certificado->numeroEmision}}</td>
                        <td>
                        {{$d->created_at}}
                        </td>
                        <td>
                          @if($d->estado==1)
                          <span class="badge badge-info">Enviado</span>
                          @endif

                          @if($d->estado==2)
                          <span class="badge badge-success">Aprobado</span>
                          @endif

                          @if($d->estado==3)
                          <span class="badge badge-danger">Reprobado</span>
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
  
</body>
</html>