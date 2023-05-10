    
 <div class="side-nav">
    <div class="title">Menu</div>
    <div class="main-menu">

        <ul>
            <li id="menu_inicio">
                <a href="{{route('home')}}" class="menu-item">
                    <i class="fas fa-home"></i>
                    <div class="title">Inicio</div>
                </a>
            </li>

            @if(Auth::user()->perfil=="Admin")
            <li id="menu_usuarios">
                <a href="{{route('usuarios')}}" class="menu-item">
                    <i class="fas fa-users"></i>
                    <div class="title">Usuarios</div>
                </a>
            </li>
             @endif

            @if(Auth::user()->perfil=="Digitalizador" || Auth::user()->perfil=="Admin")
            <li id="menu_libros">
                <a href="{{route('libros')}}" class="menu-item">
                    <i class="fas fa-book"></i>
                    <div class="title">Libros</div>
                </a>
            </li>
            @endif
            


            @if(Auth::user()->perfil=="Prestamista" || Auth::user()->perfil=="Admin")
            <li id="menu_libros_prestamo">
                <a href="{{route('prestamosLibros')}}" class="menu-item">
                    <i class="fas fa-book-reader"></i>
                    <div class="title">Nuevo Prestamos de Libros</div>
                </a>
            </li>

            <li id="menu_libros_listado_prestamo_libros">
                <a href="{{route('listadoPrestamo')}}" class="menu-item">
                    <i class="fas fa-bible"></i>
                    <div class="title">Listado Prestamos de Libros</div>
                </a>
            </li>

            <li id="menu_devoluciones">
                <a href="{{route('devoluciones')}}" class="menu-item">
                    <i class="fas fa-book-dead"></i>
                    <div class="title">Devoluciones</div>
                </a>
            </li>

            

            @endif

            
            

            @if(Auth::user()->perfil=="Ingreso de certificados" || Auth::user()->perfil=="Admin")
            

            <li id="menu_certificados">
                <a href="{{route('certificados')}}" class="menu-item">
                    <i class="fas fa-file-word"></i>
                    <div class="title">Certicados</div>
                </a>
            </li>

            

            @endif
                


            @if(Auth::user()->perfil=="Distribuidor de Certificados" || Auth::user()->perfil=="Admin")
            

            <li id="menu_distrubuir_certificados">
                <a href="{{route('distribuirCertificados')}}" class="menu-item">
                    <i class="fas fa-file-word"></i>
                    <div class="title">Distribuir Certicados</div>
                </a>
            </li>

            


            @endif
            

            @if(Auth::user()->perfil=="Distribuidor de Certificados" || Auth::user()->perfil=="Admin" || Auth::user()->perfil=="Certificadores")
                
                <li id="menu_mi_distrubucion">
                    <a href="{{route('miDistribucion')}}" class="menu-item">
                        <i class="fas fa-file-word"></i>
                        <div class="title">Mis distribuciones</div>
                    </a>
                </li>

                <li id="menu_mi_distrubucion_pdf">
                    <a href="{{route('reportesDistribucion')}}" class="menu-item">
                        <i class="fas fa-file-pdf"></i>
                        <div class="title">Reportes mis distribuciones</div>
                    </a>
                </li>

                

            @endif
        


            @if(Auth::user()->perfil=="Consultor")
            

            <li id="menu_consultas_certificados">
                <a href="{{route('consultasCertificados')}}" class="menu-item">
                    <i class="fas fa-file-word"></i>
                    <div class="title">Consultar certicados</div>
                </a>
            </li>

            


            @endif

            

            @if(Auth::user()->perfil=="Ingreso de certificados" || Auth::user()->perfil=="Admin")
            

            <li id="menu_certificados_reportes">
                <a href="{{route('reportesCertificados')}}" class="menu-item">
                    <i class="fas fa-file-pdf"></i>
                    <div class="title">Reportes Certicados</div>
                </a>
            </li>

            

            @endif

            
        </ul>

    </div>
</div>