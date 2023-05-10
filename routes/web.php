<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sin-permisos', 'HomeController@error')->name('error');


//buscar tomo de libro por anio y partida de inicio
Route::get('/libro-tomo-anio-p-inicio', 'HomeController@buscarTomoLibroAnioPartidaInicio')->name('buscarTomoLibroAnioPartidaInicio');

// usarios
Route::get('/usuarios', 'Usuarios@index')->name('usuarios');
Route::post('/guardar-usuario', 'Usuarios@guardar')->name('guardarUsuario');
Route::get('/usuarios-editar/{id}', 'Usuarios@editar')->name('editarUser');
Route::get('/usuarios-eliminar/{id}', 'Usuarios@eliminar')->name('eliminarUser');
Route::post('/actualizar-usuario', 'Usuarios@actualizar')->name('actualizarUsuario');

// libros
Route::get('/libros', 'Libros@index')->name('libros');
Route::post('/guardar-libros', 'Libros@guardar')->name('guardarLibro');
Route::get('/libros-editar/{id}', 'Libros@editar')->name('editarLibro');
Route::post('/guardar-actualizar', 'Libros@actualizar')->name('actualizarLibro');
Route::get('/libros-eliminar/{id}', 'Libros@eliminar')->name('eliminarLibro');

// expor
Route::get('/e', 'Libros@export')->name('export');

// prestamos
Route::get('/prestamos-libros', 'Prestamos@index')->name('prestamosLibros');
Route::post('/guardar-prestamo', 'Prestamos@guardar')->name('procesarPrestamo');
Route::get('/listado-prestamos', 'Prestamos@listado')->name('listadoPrestamo');
Route::post('/devolver-prestamo', 'Prestamos@devolver')->name('devolverPrestamo');


// devoluciones
Route::get('/devoluciones', 'Devoluciones@index')->name('devoluciones');


// certificados
Route::get('/certificados', 'Certificados@index')->name('certificados');
Route::post('/guardarCertificado', 'Certificados@guardar')->name('guardarCertificado');
Route::get('/distribuir-certificados', 'Certificados@distribuir')->name('distribuirCertificados');
Route::get('/distribuir-certificados-usuarios/{id}', 'Certificados@distribuirUser')->name('usuariosDistrucucionCertificado');
Route::get('/asignarCertificado/{idUser}/{idCert}', 'Certificados@asignar')->name('asignarCertificado');
Route::get('/mis-distribuciones', 'Certificados@miDistribucion')->name('miDistribucion');
Route::get('/mis-distribuciones-a-r/{id}/{es}', 'Certificados@aprobarDistribucion')->name('aprobarDistribucion');

Route::get('/certificados-editar/{id}', 'Certificados@editar')->name('editarCertificado');
Route::post('/actualizarCertificado', 'Certificados@actualizar')->name('actualizarCertificado');
Route::get('/certificados-eliminar/{id}', 'Certificados@eliminar')->name('eliminarCertificado');
Route::get('/imprimir-certificados-hoy', 'Certificados@imprimirCertificadoHoy')->name('imprimirCertificadoHoy');



// distribucion

Route::get('/certificados-eliminar-dis-cer-user/{id}', 'Certificados@eliminarDistribucionCertificadoUsuario')->name('eliminarDistribucionCertificadoUsuario');
Route::get('/imprimir-mis-distri-hoy', 'Certificados@imprimirMisDistribucionesHoy')->name('imprimirMisDistribucionesHoy');


// reporetes
Route::get('/prestamos-reportes', 'Reportes@prestamos')->name('prestamosReporte');
Route::get('/devoluciones-reportes', 'Reportes@devoluciones')->name('devolucionesReporte');
Route::get('/distribucion-reportes', 'Reportes@distribucion')->name('distribucionReporte');



// consultas
Route::get('/certificados-consultas', 'Reportes@consultasCertificados')->name('consultasCertificados');
Route::get('/reportes-usuarios-distribuciones', 'Reportes@buscarDistribucionesUsuario')->name('buscarDistribucionesUsuario');

Route::post('/guardra-reportes-certificados', 'Reportes@guardarReporteCertificados')->name('guardarReporteCertificados');
Route::get('/certificados-reportes-fecha', 'Reportes@reportesCertificados')->name('reportesCertificados');
Route::get('/certificados-reportes-descarga-pdf/{id}', 'Reportes@descargarReportePdf')->name('descargarReportePdf');

Route::post('/guardra-reportes-certificados-distribucion', 'Reportes@guardarReporteDistribucion')->name('guardarReporteDistribucion');
Route::get('/certificados-reportes-fecha-distribuciones', 'Reportes@reportesDistribucion')->name('reportesDistribucion');
Route::get('/certificados-reportes-descarga-distibucion-pdf/{id}', 'Reportes@descargarReporteDistribucionPdf')->name('descargarReporteDistribucionPdf');

