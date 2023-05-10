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
    

    <p>Fecha ingresada: {{$reporte->fecha}}</p>
    <p>Fecha guardada: {{$reporte->created_at}}</p>

    <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Número de emisión</th>
              <th scope="col">Cliente</th>
            </tr>
          </thead>
          <tbody>
            @php($i=0)
            @foreach($reporte->itemsReporte as $c)
            @php($i++)
            <tr>
              <th scope="row">
              
              {{$i}}</th>
              <td>{{$c->certificado->numeroEmision}}</td>
              <td>{{$c->certificado->cliente}}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </div>


  </body>
</html>