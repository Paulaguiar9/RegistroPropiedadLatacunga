@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Prerstamo de libros
                </div>

                <div class="card-body">





                <form action="{{route('procesarPrestamo')}}" method="post" id="realizarReserva">
                            @csrf
                


                    


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usuariosModal">
                      Selecione usuario
                    </button>

                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="usuariosModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LISTADO DE USUARIOS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                            <div class="table-responsive">
                                {!! $pdt->html()->table(['id' => 'pdt']) !!}
                            </div>
                            {!! $pdt->html()->scripts() !!} 

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    

                    <div class="table-responsive mt-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Email</th>
                               <th scope="col">Nombres Apellidos</th>
                              <th scope="col">Cédula</th>
                             
                            </tr>
                          </thead>
                          <tbody id="detalleUsuario">

                          </tbody>
                        </table>
                    </div>

                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#librosModal">
                      Selecione libros
                    </button>

                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="librosModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LISTADO DE LIBROS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="table-responsive">
                                  {!! $udt->html()->table(['id' => 'udt']) !!} 
                              </div>
                               {!! $udt->html()->scripts() !!}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    

                    <div class="table-responsive mt-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Tipo</th>
                              <th scope="col">Número tomo</th>
                              <th scope="col">Año</th>
                              <th scope="col">Partida de inicio</th>
                              <th scope="col">Observación</th>
                            </tr>
                          </thead>
                          <tbody id="detalleLibro">
                          </tbody>
                    </table>
                   </div>




                    <button class="btn btn-info btn-block" type="submit">Realizar prestamo</button>
                </form>



                </div>
            </div>
        </div>

        
    </div>
</div>



<script>
	$('#menu_libros_prestamo').addClass('active');


  
    function prestar(argument) {
       var id=$(argument).data('i');
       var tipo=$(argument).data('t');
       var numeroTomo=$(argument).data('n');
       var anio=$(argument).data('a');
       var partidaInicio=$(argument).data('p');

       var filaex=$('#fila-'+id);
       if (filaex.length) {
        
        swal("Información!", "Libro ya agregado!", "info");

       }else{
        var fila='<tr id="fila-'+id+'">'+
                    '<td><input name="idsLibros[]" required="" type="hidden" value="'+id+'" />'+tipo+'</td>'+
                    '<td>'+numeroTomo+'</td>'+
                    '<td>'+anio+'</td>'+
                    '<td>'+partidaInicio+'</td>'+
                    '<td><textarea class="form-control" placeholder="Ingrese observación" name="observacion[]"></textarea></td>'+
                '</tr>';



        $('#detalleLibro').append(fila); 
       }

       

    }



    function selecionar(argument) {
         $('#detalleUsuario').html('');
        var id=$(argument).data('id');
        var email=$(argument).data('email');
        var cedula=$(argument).data('cedula');
        var nombres=$(argument).data('nombres');
        var apellidos=$(argument).data('apellidos');

        var fila='<tr>'+
                      '<th scope="row"><input type="hidden" name="idUser" value="'+id+'" />'+email+'</th>'+
                      '<td>'+nombres+" "+apellidos+'</td>'+
                      '<td>'+cedula+'</td>'+
                      
                    '</tr>';

        $('#detalleUsuario').append(fila);

    }


 



var askConfirmation = true;
$("#realizarReserva").submit(function(e){
    if(askConfirmation){
        e.preventDefault(); // dont submit the form, ask for confirmation first.
        



         swal({
              title: "Confirmación?",
              text: "Está seguro de realizar prestamo de libro!",
              type: "info",
              showCancelButton: true,
              confirmButtonClass: "btn-success",
              confirmButtonText: "Si, realizar prestamo!",
              closeOnConfirm: false
            },
            function(){
                askConfirmation = false; // done asking confirmation, now submit the form
                $('#realizarReserva').submit();
            });
        



    }
});



</script>
@endsection