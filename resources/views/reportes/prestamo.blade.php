@extends('layouts.app')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script>
  Highcharts.setOptions({
    lang: {
        loading: 'Cargando...',
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        exportButtonTitle: "Exportar",
        printButtonTitle: "Importar",
        rangeSelectorFrom: "Desde",
        rangeSelectorTo: "Hasta",
        rangeSelectorZoom: "Período",
        downloadPNG: 'Descargar imagen PNG',
        downloadJPEG: 'Descargar imagen JPEG',
        downloadPDF: 'Descargar imagen PDF',
        downloadSVG: 'Descargar imagen SVG',
        printChart: 'Imprimir',
        resetZoom: 'Reiniciar zoom',
        resetZoomTitle: 'Reiniciar zoom',
        thousandsSep: ",",
        decimalPoint: '.'
    }
});
</script>

<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    <a href="{{route('home')}}" class="btn btn-dark">Atras</a>
                    Listado prestamos de <strong>{{$fi}} </strong> hasta <strong>{{$ff}} </strong>
                </div>

                <div class="card-body">
                     @if($p->count()>0)
                     <p><strong>{{$p->count()}}</strong> Prestamos encontrados</p>
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
                                    @foreach($p as $pr)
                                    @php($i++)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                      <td>
                                        @include('usuarios.info', ['p'=>$pr])
                                      </td>
                                      <td>
                                        @include('libros.info', ['p'=>$pr])
                                      </td>
                                      <td>{{$pr->observacion}}</td>
                                      <td>
                                        {{$pr->created_at}} <small>{{$pr->created_at->diffForHumans()}}</small>
                                      </td>
                                      <td>
                                        @if($pr->estado)
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


<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>



<script>
  $('#menu_inicio').addClass('active');
  $('#reportePrestamo').DataTable();


  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Libro mas prestado'
    },
    subtitle: {
        text: '------'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidades (prestados)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Cantidades veces: <b>{point.y} prestadas</b>'
    },
    series: [{
        name: 'Population',
        data: [

        @foreach($libro_max as $lx)
          ['{{$lx->libroXid($lx->libro_id)}}', parseFloat('{{$lx->total}}')],

        @endforeach
            
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


</script>
@endsection