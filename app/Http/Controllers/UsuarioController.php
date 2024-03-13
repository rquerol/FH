<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Clases\Utilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function showLogin()
    {
        //$usuario=new Usuario();

        //$usuario->nombre_de_usuario="oarriaza";
        //$usuario->contrasenia=\bcrypt("contra1");
        //$usuario->correo="oarriazag2223@politecnics.barcelona";
        //$usuario->nombre="Oscar Armando";
        //$usuario->apellidos="Arriaza Guzmán";
        //$usuario->roles_id=1;
        //$usuario->save();
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $correoElectronico=$request->input("CorreoElectronico");
        $contrasenia=$request->input("Contrasenia");

        $usuario=Usuario::where("email",$correoElectronico)->first();

        if($usuario !=null && Hash::check($contrasenia,$usuario->contrasenia))
        {
            Auth::login($usuario);
            $response=redirect("/home");
        }
        else
        {
            $request->session()->flash("error","Usuario o contraseña incorrectos");
            $response=redirect("/login")->withInput();
        }
        return $response;
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
