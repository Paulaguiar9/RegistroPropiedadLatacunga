<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DevolucionesDataTable;
use Illuminate\Support\Facades\Auth;

class Devoluciones extends Controller
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


    public function index(DevolucionesDataTable $dataTable)
    {
        return  $dataTable->render('devoluciones.index');
    }
}
