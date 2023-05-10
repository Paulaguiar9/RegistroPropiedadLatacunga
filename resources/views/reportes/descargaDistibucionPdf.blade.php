<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
    <title>Reporte Certificados</title>
  <body>
    
    <p>Registro de la propiedad</p>
    <p>Fecha ingresada: {{$reporte->fecha}}</p>
    <p>Fecha guardada: {{$reporte->created_at}}</p>

    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Número de Tomo</th>
            <th scope="col">Cliente</th>
                <th scope="col">Estado</th>
                <th scope="col">Usuario</th>
          </tr>
        </thead>
        <tbody>
          @php($i=0)
          @foreach($reporte->itemsReporte as $d)
          @php($i++)
          <tr>
            <th scope="row">
               <input type="hidden" value="{{$d->id}}" name="idD[]">
            {{$i}}</th>
            <td>{{$d->distribucion->certificado->numeroEmision}}</td>
            <td>{{$d->distribucion->certificado->cliente}}</td>
                <td>
                    @if($d->distribucion->estado==1)
                    <p>Enviado</p>
                    @endif
                    @if($d->distribucion->estado==2)
                    <p>Aprobado</p>
                    @endif
                    @if($d->distribucion->estado==3)
                    <p>REprobado</p>
                    @endif
                </td>
                <th>
                    {{$d->distribucion->usuario->nombres}} {{$d->distribucion->usuario->apellidos}}
                </th>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>


  </body>
</html>