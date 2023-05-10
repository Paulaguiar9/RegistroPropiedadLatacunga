<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
    <title>Certificados</title>
  <body >
    
    @if($ditribuciones->count()>0)
    <h1>Fecha: {{$fecha}}</h1>

   <form action="{{route('guardarReporteDistribucion')}}" method="post">
      @csrf
      <input type="hidden" name="fecha" value="{{$fecha}}">
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
  		    @foreach($ditribuciones as $d)
  		    @php($i++)
  		    <tr>
  		      <th scope="row">
               <input type="hidden" value="{{$d->id}}" name="idD[]">
            {{$i}}</th>
  		      <td>{{$d->certificado->numeroEmision}}</td>
  		      <td>{{$d->certificado->cliente}}</td>
                <td>
                    @if($d->estado==1)
                    <p>Enviado</p>
                    @endif
                    @if($d->estado==2)
                    <p>Aprobado</p>
                    @endif
                    @if($d->estado==3)
                    <p>REprobado</p>
                    @endif
                </td>
                <th>
                    {{$d->usuario->nombres}} {{$d->usuario->apellidos}}
                </th>
  		    </tr>
  		    @endforeach

  		  </tbody>
  		</table>
      </div>
      <button type="submit" id="btnguardar" class="btn btn-primary btn-lg">Guardar consulta a PDF</button>
  </form>

   <button class="btn btn-info mt-1 btn-lg" id="btnimprmir" onclick="ok();">Imprimir consulta</button>

    <script>
    
        function ok(argument) {
            
            window.print();
        }

        var beforePrint = function () {
           $('#btnguardar, #btnimprmir').hide();
        };

        var afterPrint = function () {
            $('#btnguardar, #btnimprmir').show();

        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');

            mediaQueryList.addListener(function (mql) {
                //alert($(mediaQueryList).html());
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        // window.onafterprint = afterPrint;
        
    </script>

    
    @else
    <p>No existe distribuciones en esa fecha.</p>
    @endif

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>