
	<a class="btn-link" data-toggle="collapse" href="#collapseUser-{{$u->id}}" role="button" aria-expanded="false" aria-controls="collapseUser-{{$u->id}}">
		{{$u->nombres}} {{$u->apellidos}}
	</a>
	<div class="collapse" id="collapseUser-{{$u->id}}">
	  <div class="card card-body">
	    

	    <table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Email</th>
		      <th scope="col">Perfil</th>
		      <th scope="col">Cédula</th>
		      <th scope="col">Teléfono</th>
		      <th scope="col">Dirección</th>
		      <th scope="col">Sexo</th>
		      <th scope="col">Edad</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">{{$u->email}}</th>
		      <td>{{$u->perfil}}</td>
		      <td>{{$u->cedula}}</td>
		      <td>{{$u->telefono}}</td>
		      <td>{{$u->direccion}}</td>
		      <td>{{$u->sexo}}</td>
		      <td>{{$u->edad}}</td>
		    </tr>
		    
		  </tbody>
		</table>


	  </div>
	</div>