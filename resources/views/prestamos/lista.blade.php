@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
     
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Listado de prestamos
                </div>

                <div class="card-body">
                     <div class="table-responsive">
                        {!! $dataTable->table() !!}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('devolverPrestamo')}}" method="post">
        @csrf
          <div class="modal-body">
            <p><strong>Está seguro de realizar devolución de libro.</strong></p>
            <input type="hidden" name="idPrestamo" id="idPrestamo">
            <div class="form-group">
                <textarea class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcionx"></textarea>
            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Si realizar devolucion</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
    </form>


    </div>
  </div>
</div>





{!! $dataTable->scripts() !!}

<script>
	$('#menu_libros_listado_prestamo_libros').addClass('active');


    function devolver (argument) {
        var id=$(argument).data('id');
        $('#idPrestamo').val(id);
        $('#exampleModal').modal('show');
    }


    $('#exampleModal').on('hidden.bs.modal', function (e) {
       $('#idPrestamo').val("");
       $('#descripcionx').val("");
    });


</script>
@endsection