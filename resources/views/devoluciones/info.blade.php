
  <a class="btn-link" data-toggle="collapse" href="#collapseExample-{{$p->id}}" aria-expanded="false" aria-controls="collapseExample-{{$p->id}}">
    Devolución
  </a>

<div class="collapse" id="collapseExample-{{$p->id}}">
  <div class="card card-body">
   <div class="table-responsive">
   		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Fecha</th>
		      <th scope="col">Observación</th>
		      <th scope="col">Hace</th>
		    </tr>
		  </thead>
		  <tbody>
		    

		    <tr>
		      <th scope="row">{{$p->devolucion->created_at}} </th>
		      <td>{{$p->devolucion->observacion}}</td>
		      <th><small>{{$p->devolucion->created_at->diffForHumans()}}</small></th>
		    </tr>

		  </tbody>
		</table>
   </div>
  </div>
</div>