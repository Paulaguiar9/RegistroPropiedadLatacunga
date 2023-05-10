@extends('layouts.app')

@section('content')
<div class="report-box-1 mmt-lg-70 pt-70 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="fw-100 fw-lg-120 mb-40 mt-lg-95 mb-lg-55 mx-auto mx-sm-0"></div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 font-weight-normal fadeInDown animated">
                <div class="d-flex justify-content-center justify-content-md-end justify-content-lg-center pr-md-50 pr-lg-0">
                    <i class="fas fa-users d-none d-sm-block text-size-55 mr-16 lh-83 text-white"></i>
                    <div class="text-center text-sm-right">
                        <div class="text-white text-size-32 text-size-sm-38 text-size-lg-42">{{App\User::count()}}</div>
                        <div class="text-warning text-size-13 lh-14 ml-12 ml-sm-0">USUARIOS</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mt-20 mt-sm-0 font-weight-normal fadeInDown animated">
                <div class="d-flex justify-content-center justify-content-md-end justify-content-lg-center pr-md-50 pr-lg-0">
                    
                    <i class="fas fa-book d-none d-sm-block text-size-55 mr-16 lh-83 text-white"></i>
                    <div class="text-center text-sm-right">
                        <div class="text-white text-size-32 text-size-sm-38 text-size-lg-42">{{App\Libro::count()}}</div>
                        <div class="text-warning text-size-13 lh-14 ml-12 ml-sm-0">Libros</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mt-20 mt-lg-0 font-weight-normal fadeInDown animated">
                <div class="d-flex justify-content-center justify-content-md-end justify-content-lg-center pr-md-50 pr-lg-0">
                    
                    <i class="fas fa-file-word d-none d-sm-block text-size-55 mr-16 lh-83 text-white"></i>
                    <div class="text-center text-sm-right">
                        <div class="text-white text-size-32 text-size-sm-38 text-size-lg-42">{{App\Certificado::count()}}</div>
                        <div class="text-warning text-size-13 lh-14 ml-12 ml-sm-0">Certificados</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mt-20 mt-lg-0 font-weight-normal fadeInDown animated">
                <div class="d-flex justify-content-center justify-content-md-end justify-content-lg-center pr-md-50 pr-lg-0">
                    <i class="icon mdi mdi-arrange-send-backward d-none d-sm-block text-size-55 mr-16 lh-83 text-white" aria-hidden="true"></i> 
                    <div class="text-center text-sm-right">
                        <div class="text-white text-size-32 text-size-sm-38 text-size-lg-42">{{App\Prestamo::count()}}</div>
                        <div class="text-warning text-size-13 lh-14 ml-12 ml-sm-0">Prestamos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">


    <div class="col-md-12">
        <div class="card border-info mt-2">
          <div class="card-header">
            <h2>Buscar libro por Año,Número de partida</h2>
            <form action="{{route('buscarTomoLibroAnioPartidaInicio')}}" method="get">
              <div class="row">
                <div class="col">
                    
                    <label for="">Selecione libros</label>
                   <select class="form-control" id="tipo" name="tipo" required="">
                        <option value="PROPIEDADES">PROPIEDADES</option>
                        <option value="HIPOTECAS">HIPOTECAS</option>
                        <option value="SENTENCIAS">SENTENCIAS</option>
                        <option value="PROPIEDAD HORIZONTAL">PROPIEDAD HORIZONTAL</option>
                        <option value="DEMANDAS">DEMANDAS</option>
                        <option value="PROHIBICIONES">PROHIBICIONES</option>
                        <option value="EMBARGOS">EMBARGOS</option>
                        <option value="ACLARATORIAS">ACLARATORIAS</option>
                        <option value="RESOLUCIONES">RESOLUCIONES</option>
                        <option value="SERVIDUMBRES">SERVIDUMBRES</option>
                        <option value="EXPROPIACIONES">EXPROPIACIONES</option>


                    </select>

                </div>
                <div class="col">
                    <label for="">Año</label>
                  <input type="number" class="form-control" name="anio" required="" placeholder="Ingrese año">
                </div>

                <div class="col">
                    <label for="">Partida Inicio</label>
                  <input type="text" class="form-control" name="partida_inicio" required="" placeholder="Ingrese partida de inicio">
                </div>



                <div class="col">
                    <button class="btn btn-info mt-4">Buscar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>


    
    @if(Auth::user()->perfil=="Admin")
    <!-- prestamos -->
    <div class="col-md-12">
        <div class="card border-danger mt-2">
          <div class="card-header">
            <h2>Buscar distribuciones por usuario</h2>
            <form action="{{route('buscarDistribucionesUsuario')}}" method="get">
              <div class="row">
                <div class="col">
                    
                    <label for="">Selecione usuario</label>
                    <select name="usuario" id="" class="form-control">
                        @foreach($users as $u)
                        <option value="{{$u->id}}"> {{$u->nombres}} {{$u->apellidos}} - {{$u->cedula}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col">
                    <label for="">Fecha</label>
                  <input type="date" class="form-control" name="fecha" required="">
                </div>
                <div class="col">
                    <button class="btn btn-danger mt-4">Buscar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    @endif




    
    @if(Auth::user()->perfil=="Prestamista" || Auth::user()->perfil=="Admin")
    <!-- prestamos -->
    <div class="col-md-12">
        <div class="card border-info mt-2">
          <div class="card-header">
            <h2>Buscar listado de prestamos en rango de fechas</h2>
            <form action="{{route('prestamosReporte')}}" method="get">
              <div class="row">
                <div class="col">
                    <label for="">Fecha inicio</label>
                  <input type="date" class="form-control" name="fi" required="" >
                </div>
                <div class="col">
                    <label for="">Fecha final</label>
                  <input type="date" class="form-control" name="ff" required="">
                </div>
                <div class="col">
                    <button class="btn btn-info mt-4">Procesar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    @endif

    
    @if(Auth::user()->perfil=="Admin")
    <!-- devoluciuones -->
    <div class="col-md-12">
        <div class="card border-success mt-2">
          <div class="card-header">
            <h2>Buscar listado de devoluciones en rango de fechas</h2>
            <form action="{{route('devolucionesReporte')}}" method="get">
              <div class="row">
                <div class="col">
                    <label for="">Fecha inicio</label>
                  <input type="date" class="form-control" name="fi" required="" >
                </div>
                <div class="col">
                    <label for="">Fecha final</label>
                  <input type="date" class="form-control" name="ff" required="">
                </div>
                <div class="col">
                    <button class="btn btn-success mt-4">Procesar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    
    <!-- distribuciones -->

     <div class="col-md-12">
        <div class="card border-dark mt-2">
          <div class="card-header">
            <h2>Buscar listado de distribuciones de certificados en rango de fechas</h2>
            <form action="{{route('distribucionReporte')}}" method="get">
              <div class="row">
                <div class="col">
                    <label for="">Fecha inicio</label>
                  <input type="date" class="form-control" name="fi" required="" >
                </div>
                <div class="col">
                    <label for="">Fecha final</label>
                  <input type="date" class="form-control" name="ff" required="">
                </div>
                <div class="col">
                    <button class="btn btn-dark mt-4">Procesar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    @endif




    <!-- libros -->

    <div class="col-md-12">

        <div class="card mt-2 border-info">
          <div class="card-body">
            <h5 class="card-title">Listado de Libros</h5>
            
            <div class="table-responsive">
                {!! $dataTable->table() !!}
            </div>
            
          </div>
        </div>
    </div>




</div>

{!! $dataTable->scripts() !!}

<script>
    
    $('#menu_inicio').addClass('active');
</script>
@endsection
