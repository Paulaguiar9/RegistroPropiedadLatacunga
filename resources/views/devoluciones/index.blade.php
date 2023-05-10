@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-dark mt-2">
                <div class="card-header bg-transparent border-dark">
                    Listado de devoluciones
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
	$('#menu_devoluciones').addClass('active');
</script>
@endsection