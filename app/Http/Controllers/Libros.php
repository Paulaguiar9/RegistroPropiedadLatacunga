<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LibrosDataTable;
use Illuminate\Support\Facades\Auth;
use App\Libro;
use App\Http\Requests\RqLibro;

use App\Exports\LibroExport;
use Maatwebsite\Excel\Facades\Excel;


class Libros extends Controller
{
    protected $userPer;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->userPer= Auth::user()->perfil;
            if ($this->userPer=='Admin' || $this->userPer=='Digitalizador') {
                return $next($request);
            }
            return redirect()->route('error');
        });
    }


    public function index(LibrosDataTable $dataTable)
    {
        return  $dataTable->render('libros.index');
    }

    public function guardar(RqLibro $request)
    {
        $l=new Libro;
        $l->tipo=$request->input('tipo');
        $l->numeroTomo=$request->input('numeroTomo');
        $l->anio=$request->input('anio');
        $l->partidaInicio=$request->input('partidaInicio');
        $l->fojaInicio=$request->input('fojaInicio');
        $l->fechaPartidaInicio=$request->input('fechaPartidaInicio');
        $l->partidaFin=$request->input('partidaFin');
        $l->fojaFin=$request->input('fojaFin');
        $l->fechaPartidaFin=$request->input('fechaPartidaFin');
        $l->observacion=$request->input('observacion');
        $l->estado=true;


        if ($request->hasFile('archivo')) {
            $l->archivo=$request->archivo->hashName();
            $request->file('archivo')->move('img/libros',$request->archivo->hashName());  

        }




        $l->save();
        $request->session()->flash('success','Nuevo libro ingresado exitosamente');
        return redirect()->route('libros');
    }

    public function editar($id)
    {
        $l=Libro::find($id);
        return view('libros.editar',['l'=>$l]);
    }

    public function actualizar(RqLibro $request)
    {
        $l=Libro::find($request->input('id'));
        $l->tipo=$request->input('tipo');
        $l->numeroTomo=$request->input('numeroTomo');
        $l->anio=$request->input('anio');
        $l->partidaInicio=$request->input('partidaInicio');
        $l->fojaInicio=$request->input('fojaInicio');
        $l->fechaPartidaInicio=$request->input('fechaPartidaInicio');
        $l->partidaFin=$request->input('partidaFin');
        $l->fojaFin=$request->input('fojaFin');
        $l->fechaPartidaFin=$request->input('fechaPartidaFin');
        $l->observacion=$request->input('observacion');

         if ($request->hasFile('archivo')) {
            if (file_exists('img/libros/'.$l->archivo)) {
                @unlink('img/libros/'.$l->archivo);
            }

            $l->archivo=$request->archivo->hashName();
            $request->file('archivo')->move('img/libros',$request->archivo->hashName());
         }

        $l->save();
        $request->session()->flash('success','Libro actualizado exitosamente');
        return redirect()->route('libros');
    }

    public function eliminar(Request $request, $id)
    {
        try {
            $l=Libro::find($id);
            if($l->delete()){
                if (file_exists('img/libros/'.$l->archivo)) {
                    @unlink('img/libros/'.$l->archivo);
                }
            }
            $request->session()->flash('success','Libro eliminado exitosamente');
        } catch (\Exception $e) {
            $request->session()->flash('info','No se puede eliminar Libro, ya que contiene información relacionada con otras areas de sistema');
        }

        return redirect()->route('libros');
        
    }


    public function export(Request $request) 
    {
        $exi=Libro::query()->where('anio', $request->anio)->count();
        if ($exi>0) {
            return Excel::download(new LibroExport($request->anio), 'libro.xlsx');   
        }else{
             $request->session()->flash('info','No existe libros con esa información');
            return redirect()->route('libros');
        }

    }


}
