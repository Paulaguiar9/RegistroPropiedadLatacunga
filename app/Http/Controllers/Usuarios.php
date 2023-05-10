<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RqUsuario;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UsuariosDataTable;
use Illuminate\Support\Facades\Auth;

class Usuarios extends Controller
{
    protected $userPer;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->userPer= Auth::user()->perfil;
            if ($this->userPer=='Admin') {
                return $next($request);
            }
            return redirect()->route('error');
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsuariosDataTable $dataTable)
    {
        return  $dataTable->render('usuarios.index');
    }

    public function guardar(RqUsuario $request)
    {
        $user=new User;
        $user->name = $request->nombres;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->perfil=$request->perfil;
        $user->cedula=$request->cedula;
        $user->telefono=$request->telefono;
        $user->sexo=$request->sexo;
        $user->estado=$request->estado;
        $user->direccion=$request->direccion;
        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->save();
        $request->session()->flash('success','Nuevo usuario ingresado exitosamente');
        return redirect()->route('usuarios');
    }


    public function editar($idUser)
    {
        $u=User::find($idUser);
        return view('usuarios.editar',['u'=>$u]);
    }

    public function actualizar(RqUsuario $request)
    {
        $user=User::find($request->id);
        $user->name = $request->nombres;
        $user->email = $request->email;
        $user->perfil=$request->perfil;
        $user->cedula=$request->cedula;
        $user->telefono=$request->telefono;
        $user->sexo=$request->sexo;
        $user->estado=$request->estado;
        $user->direccion=$request->direccion;
        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->save();
        $request->session()->flash('success','Usuario actualizado exitosamente');
        return redirect()->route('usuarios');
    }

    public function eliminar(Request $request,$id)
    {
        try {
            $user=User::find($id);
            $user->delete();
            $request->session()->flash('success','Usuario eliminado exitosamente');
        } catch (\Exception $e) {
            $request->session()->flash('info','No se puede eliminar usuario, contiene información relacionada con otras areas del sistema');
        }
        return redirect()->route('usuarios');
    }
}
