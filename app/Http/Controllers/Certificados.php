<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\CertificadosDataTable;
use App\DataTables\DistribuirCertificadosDataTable;
use App\Http\Requests\RqCertificado;
use App\Certificado;
use App\User;
use App\Distribucion;
use App\DataTables\MidistribucionDataTable;
use Carbon\Carbon;

class Certificados extends Controller
{
    protected $userPer;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->userPer= Auth::user()->perfil;
            if ($this->userPer=='Admin' || $this->userPer=='Certificadores' || $this->userPer=='Distribuidor de Certificados' || $this->userPer=='Ingreso de certificados' ) {
                return $next($request);
            }
            return redirect()->route('error');
        });
    }


    public function index(CertificadosDataTable $dataTable)
    {
        return  $dataTable->render('certificados.index');
    }


    public function guardar(RqCertificado $request)
    {
        $c=new Certificado;
        $c->numeroEmision=$request->numeroEmision;
        $c->cliente=$request->cliente;
        $c->created_at=$request->fecha;
        $c->save();
        $request->session()->flash('success','Nuevo certificado ingresado exitosamente');
        return redirect()->route('certificados');
    }

    public function distribuir(DistribuirCertificadosDataTable $dataTable)
    {
        if (Auth::user()->perfil=='Distribuidor de Certificados'||Auth::user()->perfil=='Admin') {
            return  $dataTable->render('certificados.distribuir');
        }

        return redirect()->route('error');
    }


    public function distribuirUser(Request $request,$idCer)
    {
        if (Auth::user()->perfil=='Distribuidor de Certificados'||Auth::user()->perfil=='Admin') {
            $u=User::where('perfil','Distribuidor de Certificados')->OrWhere('perfil','Certificadores')->get();
            $d=Distribucion::where('certificado_id',$idCer)->get();
            $data = array('usuarios' => $u,'distribuciones'=>$d,'idCert'=>$idCer );
            return view('certificados.usuarios',$data);   
        }

        return redirect()->route('error');
        
    }

    public function asignar(Request $request,$idUser,$idCert)
    {
        if (Auth::user()->perfil=='Distribuidor de Certificados'||Auth::user()->perfil=='Admin') {
           
           $d=Distribucion::where(['certificado_id'=>$idCert])->first();
           if (!$d) {
               $d=new Distribucion;
               $d->certificado_id=$idCert;
               $d->user_id=$idUser;
               $d->estado=1;
               $d->save();
               $request->session()->flash('success','Certificado distribuido exitosamente');
           }else{
            $request->session()->flash('info','Certificado ya está distribuido');
           }
            return redirect()->route('usuariosDistrucucionCertificado',['id'=>$idCert]);           
        }

        return redirect()->route('error');
    }


    public function miDistribucion(MidistribucionDataTable $dataTable)
    {
         return  $dataTable->render('certificados.miDistribucion');
    }


    public function aprobarDistribucion(Request $request,$idD,$es)
    {
        $d=Distribucion::find($idD);
        $d->estado=$es;
        $d->save();
        $request->session()->flash('success','Distribución aprobado exitosamente');
        return redirect()->route('miDistribucion');
    }


    public function editar($id)
    {
        $c=Certificado::find($id);
        return view('certificados.editar',['c'=>$c]);
    }

    public function actualizar(RqCertificado $request)
    {
        $c=Certificado::find($request->id);
        $c->numeroEmision=$request->numeroEmision;
        $c->cliente=$request->cliente;
        $c->save();
        $request->session()->flash('success','Certificado actualizado exitosamente');
        return redirect()->route('certificados');
    }

    public function eliminar(Request $request,$id)
    {
        try {
            $c=Certificado::find($id);
            $c->delete();
            $request->session()->flash('success','Certificado eliminado exitosamente');
        } catch (\Exception $e) {
            $request->session()->flash('info','Certificado no eliminado, ya que se encuentra relacionado con otras areas del sistema');
        }
        return redirect()->route('certificados');
    }

    public function eliminarDistribucionCertificadoUsuario(Request $request,$id)
    {
        $d=Distribucion::find($id);
        $idCer=$d->certificado->id;
        try {
            $d->delete();
            $request->session()->flash('success','Distribución de certificado a usuario eliminado exitosamente');
        } catch (\Exception $e) {
            $request->session()->flash('info','No se puede eliminar distribución, ya que contiene información relacionado con otras partes del sistema');
        }

        return redirect()->route('usuariosDistrucucionCertificado',['id'=>$idCer]);
    }

    public function imprimirCertificadoHoy(Request $request)
    {
        $c=Certificado::whereDate('created_at',$request->fi)->get();
        $data = array('certificados' => $c ,'fecha'=>$request->fi);
        return view('certificados.imprimirHoy',$data);
    }

    public function imprimirMisDistribucionesHoy(Request $request)
    {
        $d=Distribucion::where('user_id',Auth::id())->whereDate('created_at',$request->fi)->get();
         $data = array('ditribuciones' => $d ,'fecha'=>$request->fi);
        return view('certificados.imprimirHoyDistribucion',$data);
    }
}
