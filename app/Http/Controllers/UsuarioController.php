<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Clases\Utilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("usuarios.usuario");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Recuperar los datos del formulario
        $nombre=$request->input("Nombre");
        $contrasenia=$request->input("Contrasenia");
        $email=$request->input("Email");
        $tipo=$request->input("Tipo");
        $telefono=$request->input("Telefono");

        if($tipo==="administrador")
        {
            $apellidos=$request->input("Apellidos");
        }

        //Crear un objeto de la clase que representa una consulta a la tabla
        $usuario=new Usuario();
        //Asignar los valores del formulario a su respectivo campo
        $usuario->nombre=$nombre;
        $usuario->contrasenia=\bcrypt($contrasenia);
        $usuario->email=$email;
        $usuario->tipo=$tipo;
        $usuario->telefono=$telefono;

        try
        {
            //Hacer el insert en la tabla
            $usuario->save();
            
            if($tipo==="administrador")
            {
                //$response=redirect()->action([AdministradorController::class,"store"],['apellidos'=>$apellidos]);
                //return view("ciclos.index",compact("ciclos"));
                //$response=route('administradores.store', ['apellido' =>$apellidos]);
                //$response=redirect("administradores/store", ['apellido' =>$apellidos]);
                //$response=redirect()->action([AdministradorController::class,"store"],['apellidos'=>$apellidos]);
                //$response=redirect([App\Http\Controllers\AdministradorController::class,'store'],['apellido' =>$apellidos]);
                $id=$usuario["id"];
                $response=view("registros.administrador",compact("apellidos","id"));
                //$response=redirect()->action([UsuarioController::class,"index"],["apellidos"=>$apellidos,"email"=>$email]);
                

                /*$request->session()->flash("mensaje","Usuario inscrito correctamente.");
                $response=redirect("/login");*/
                
            }
            /*$request->session()->flash("mensaje","Usuario inscrito correctamente.");
            $response=redirect("/login");*/
        }
        catch(QueryException $ex)
        {
            $mensaje=Utilidad::errorMessage($ex);
            $request->session()->flash("error",$mensaje);
            $response=redirect()->action([UsuarioController::class,"create"],['tipo' =>$tipo])->withInput();
        }
        

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
