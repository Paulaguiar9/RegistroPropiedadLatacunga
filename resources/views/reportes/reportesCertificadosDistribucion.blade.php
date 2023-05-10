@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    
                    Consulta reportes de certificados
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
{!! $dataTable->scripts() !!}
<script>
  $('#menu_mi_distrubucion_pdf').addClass('active');
</script>
@endsection