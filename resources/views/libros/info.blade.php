
	<a class="btn-link" data-toggle="collapse" href="#collapseLibro-{{$p->id}}" role="button" aria-expanded="false" aria-controls="collapseLibro-{{$p->id}}">
		{{$p->libro->tipo}} <small>{{$p->libro->numeroTomo}}</small>
	</a>
	<div class="collapse" id="collapseLibro-{{$p->id}}">
	  <div class="card card-body">
	    

	    <table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Anio</th>
		      <th scope="col">Partida inicio</th>
		      <th scope="col">Foja Inicio</th>
		      <th scope="col">Fecha de partida de inicio</th>
		      <th scope="col">Partida fin</th>
		      <th scope="col">Foja fin</th>
		      <th scope="col">Fecha de partida fin</th>
		      <th scope="col">Observacion</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">{{$p->libro->anio}}</th>
		      <td>{{$p->libro->partidaInicio}}</td>
		      <td>{{$p->libro->fojaInicio}}</td>
		      <td>{{$p->libro->fechaPartidaInicio}}</td>
		      <td>{{$p->libro->partidaFin}}</td>
		      <td>{{$p->libro->fojaFin}}</td>
		      <td>{{$p->libro->fechaPartidaFin}}</td>
		      <td>{{$p->libro->observacion}}</td>
		    </tr>
		    
		  </tbody>
		</table>


	  </div>
	</div>