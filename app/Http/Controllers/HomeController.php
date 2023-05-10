<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ConsultaLibrosDataTable;
use App\User;
use App\Libro;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ConsultaLibrosDataTable $dataTable )
    {
        $data = array('users' => User::all());

        return  $dataTable->render('home',$data);
    }

    public function error()
    {
        return view('error');
    }


    public function buscarTomoLibroAnioPartidaInicio(Request $request)
    {
        $libros=Libro::where(['tipo'=>$request->tipo,'anio'=>$request->anio])->where('partidaInicio','<=',$request->partida_inicio)->where('partidaFin','>=',$request->partida_inicio)->get();
        $data = array('libros' => $libros );
        return view('libros.buscarTomoLibroAnioPartidaInicio',$data);
    }

}
