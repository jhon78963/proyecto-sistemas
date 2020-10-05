<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Nivel;
use App\Grado;
use App\GradosP;
use App\Seccion;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña'
        ]);
        if(Auth::attempt($data)){
            $con='OK';
        }
        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if($query->count() != 0){
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if(password_verify($password,$hashp)){
                return view('bienvenido');
            }else{
                return back()->withErrors(['password'=> 'Contraseña no valida'])->withInput([request('password')]);
            }
        }else{
            return back()->withErrors(['name'=> 'Usuario no valido'])->withInput([request('usuario')]);
        }
    }

    public function index()
    {
        $secciones=Seccion::all();
        $niveles=Nivel::all();
        $grados=Grado::all();
        return view('auth.profile',compact('secciones','niveles','grados'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:190',
            'password'=>'required|max:255'

        ],
        [
            'name.required'=>'Ingrese usuario',
            'name.max'=>'Maximo 255 caracteres para el nombre del usuario',
            'email.required'=>'Ingrese email',
            'email.max'=>'Maximo 255 caracteres para el email del usuario',
            'password.required'=>'Ingrese password',
            'password.max'=>'Maximo 255 caracteres para el password del usuario'


        ]);
        $usuario=new User();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=$request->password;
        $usuario->save();
        return view('bienvenido')->with('datos','Felicidades ...! Registro satisfactorio');

    }
}
