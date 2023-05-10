<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
        <script src="{{asset('admin/js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <!-- datatable -->
        <link rel="stylesheet" href="{{asset('admin/dist/DataTables/datatables.min.css')}}">
        <script src="{{asset('admin/dist/DataTables/datatables.min.js')}}"></script>

        
        <!-- alert -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

        <style>
            .anyClass {
              height:650px;

              overflow-y: scroll;
            }
        </style>
        <title>Sistema de Gestión Documental</title>


        <script>
            (function ($, DataTable) {

        // Datatable global configuration
        $.extend(true, DataTable.defaults, {
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

    })(jQuery, jQuery.fn.dataTable);



    
        </script>
    </head>
    <body>



     @guest
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
     @else
        <aside class="side-nav-box">
            <a class="logo-box" href="{{route('home')}}">
                <img class="logo" src="{{asset('img/logo.jpeg')}}" alt="Logo">
                <div class="title">Registro de la Propiedad</div>
            </a>

            <!-- menu -->
                @include('layouts.menu')
            <!-- end menu -->

        </aside>

        <div class="top-bar-box colored">
            <div class="container">
                <div class="top-bar">
                    <div class="page-info">Sistema de gestión documental</div>
                    <div class="top-side-box">

                        <!-- notificaciones -->
                          
                        <!-- end notificaciones -->

                        <div class="side-layout-toggle">
                            <i class="icon mdi mdi-apps" aria-hidden="true"></i> 
                            <div class="text">Side Content</div>
                        </div>
                    </div>
                    <div class="mobile-nav-toggle"> <i class="icon mdi mdi-menu" aria-hidden="true"></i> Menu </div>


                    <div class="user-profile">
                        <img class="user-image" src="{{asset('img/man.svg')}}" alt="Generic placeholder image">
                        <div class="info">
                            <div class="user-name">
                                {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
                            </div>
                            <div class="user-info">
                                {{ Auth::user()->perfil }}
                            </div>
                        </div>

                        <div class="user-profile-content">
                      
                            <a href="javascript:;"> <i class="icon mdi mdi-textbox-password" aria-hidden="true"></i> Perfil </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                <i class="icon mdi mdi-logout-variant" aria-hidden="true"></i> Salir 
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <div class="content-wrapper">

            @if ($errors->any())
                <div class="container ">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show border-danger mt-2" role="alert" >
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>
                              <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </strong>
                            </div>
                        </div> 
                    </div>
                </div>
                @endif

                @foreach (['success', 'warning', 'info', 'danger'] as $msg)
                    @if(Session::has($msg))
                    
                    <div class="container mt-2">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="alert alert-{{ $msg }} alert-dismissible fade show mt-2" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>{{ Session::get($msg) }}</strong>
                                  
                                </div> 
                            </div>                            
                        </div>
                    </div>


                    @endif
                @endforeach


             @yield('content')
        </div>
     @endguest

<script>
    $('table').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip();
    });


      function eliminar (argument) {
          swal({
              title: "¿Estás seguro?",
              text: "Tu no podrás recuperar esta información.",
              type: "error",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "¡Sí, bórralo!",
              cancelButtonText:"Cancelar",
              closeOnConfirm: false
            },
            function(){
              window.location.href=$(argument).data("url");
            });
        }

    
</script>

        
    </body>

</html>