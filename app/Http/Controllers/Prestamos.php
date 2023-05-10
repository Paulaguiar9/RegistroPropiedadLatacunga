<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PrestamoLibrosDataTable;
use App\DataTables\PrestamoUsuariosDataTable;
use App\DataTables\PrestamosDataTable;
use Illuminate\Support\Facades\Auth;
use App\Prestamo;
use App\Libro;
use App\Devolucion;


class Prestamos extends Controller
{
    protected $userPer;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->userPer= Auth::user()->perfil;
            if ($this->userPer=='Admin' || $this->userPer=='Prestamista') {
                return $next($request);
            }
            return redirect()->route('error');
        });
    }


    public function index(PrestamoLibrosDataTable $udt, PrestamoUsuariosDataTable $pdt) {
      if (request()->get('table') == 'libros') {
        return $udt->render('prestamos.index', compact('udt', 'pdt'));
      }

      return $pdt->render('prestamos.index', compact('udt', 'pdt'));
    }



    public function guardar(Request $request)
    {
        $i=0;
        foreach ($request->idsLibros as $idLi) {

          $p=new Prestamo;
          $p->user_id=$request->idUser;
          $p->libro_id=$idLi;

          $p->observacion=$request->observacion[$i];
          $p->save();

          $p->libro->estado=false;
          $p->libro->save();


          $i++;
        }
        return redirect()->route('prestamosLibros');
    }



    public function listado(PrestamosDataTable $dataTable)
    {
        return  $dataTable->render('prestamos.lista');
    }

    public function devolver(Request $request)
    {
      $p=Prestamo::find($request->idPrestamo);
      $p->estado=false;
      $p->save();
      $p->libro->estado=true;
      $p->libro->save();

      $d=new Devolucion;
      $d->prestamo_id=$p->id;
      $d->observacion=$request->descripcion;
      $d->save();
      return redirect()->route('listadoPrestamo');
    }



}
