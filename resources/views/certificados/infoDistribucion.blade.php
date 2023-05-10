@if($c->distribuciones->count()>0)
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Usuario</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    @foreach($c->distribuciones as $d)
    <tr>
      <th scope="row">{{$d->usuario->nombres}} {{$d->usuario->apellidos}}</th>
      <td>
      	@if($d->estado==1)
      	<span class="badge badge-primary">Enviado</span>
      	@endif
      	@if($d->estado==2)
      	<span class="badge badge-success">Aprobado</span>
      	@endif
      	@if($d->estado==3)
      		<span class="badge badge-danger">Reprobado</span>
      	@endif
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@else
<small>Sin distribuir aún</small>
@endif