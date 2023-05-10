
	<a class="btn-link" data-toggle="collapse" href="#collapseUser-{{$p->id}}" role="button" aria-expanded="false" aria-controls="collapseUser-{{$p->id}}">
		{{$p->usuario->nombres}} {{$p->usuario->apellidos}}
	</a>
	<div class="collapse" id="collapseUser-{{$p->id}}">
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
		      <th scope="row">{{$p->usuario->email}}</th>
		      <td>{{$p->usuario->perfil}}</td>
		      <td>{{$p->usuario->cedula}}</td>
		      <td>{{$p->usuario->telefono}}</td>
		      <td>{{$p->usuario->direccion}}</td>
		      <td>{{$p->usuario->sexo}}</td>
		      <td>{{$p->usuario->edad}}</td>
		    </tr>
		    
		  </tbody>
		</table>


	  </div>
	</div>