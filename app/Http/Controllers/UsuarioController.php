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
        $tipo=$request->input("Tipo");

        if($tipo==="proveedor")
        {
            $nombreEmpresa=$request->input("NombreEmpresa");
        }
        else
        {
            $nombre=$request->input("Nombre");
        }
        $contrasenia=$request->input("Contrasenia");
        $email=$request->input("Email");
        $telefono=$request->input("Telefono");

        if($tipo==="administrador")
        {
            $apellidos=$request->input("Apellidos");
        }
        else if($tipo==="proveedor")
        {
            $calle=$request->input("Calle");
            $numero=$request->input("Numero");
            $cp=$request->input("Cp");
            $ciudad=$request->input("Ciudad");
            $logo=$request->file("Logo");
            $nombreDelArchivoDelLogo=$logo->getClientOriginalName();
            $logo->store(asset('img/logos/'));

            // $file = $request->file('nombre_campo');

            // // Acceder a información del archivo
            // $nombre = $file->getClientOriginalName();
            // $extension = $file->getClientOriginalExtension();
            // $tipo = $file->getClientMimeType();
            // $tamanio = $file->getSize();

            // //modificar la informacion del archivo
            // $name = $file->hashName(); // Generate a unique, random name...
            // $extension = $file->extension(); // Determine the file's extension based on the file's MIME type...

            // // Almacenar el archivo
            // $file->store('carpeta_destino');
        }

        //Crear un objeto de la clase que representa una consulta a la tabla
        $usuario=new Usuario();
        //Asignar los valores del formulario a su respectivo campo
        if($tipo==="proveedor")
        {
            $usuario->nombre=$nombreEmpresa;
        }
        else
        {
            $usuario->nombre=$nombre;
        }
        $usuario->contrasenia=\bcrypt($contrasenia);
        $usuario->email=$email;
        $usuario->tipo=$tipo;
        $usuario->telefono=$telefono;

        try
        {
            //Hacer el insert en la tabla
            $usuario->save();
            $id=$usuario["id"];
            if($tipo==="administrador")
            {
                //$response=redirect()->action([AdministradorController::class,"store"],['apellidos'=>$apellidos]);
                //return view("ciclos.index",compact("ciclos"));
                //$response=route('administradores.store', ['apellido' =>$apellidos]);
                //$response=redirect("administradores/store", ['apellido' =>$apellidos]);
                //$response=redirect()->action([AdministradorController::class,"store"],['apellidos'=>$apellidos]);
                //$response=redirect([App\Http\Controllers\AdministradorController::class,'store'],['apellido' =>$apellidos]);
                
                //$response=view("registros.administrador",compact("apellidos","id")); Forma incorrecta
                
                //$response=redirect()->action([UsuarioController::class,"index"],["apellidos"=>$apellidos,"email"=>$email]);
                //$response=redirect()->route('administradores.create',compact('apellidos', 'id')); Forma correcta
                $response=redirect()->action([AdministradorController::class,'store'],['apellidos' =>$apellidos,'id'=>$id]);
                $response=redirect()->route('administradores.store',compact('apellidos', 'id'));---->probar
                

                /*$request->session()->flash("mensaje","Usuario inscrito correctamente.");
                $response=redirect("/login");*/
                
            }
            else if($tipo==="proveedor")
            {
                $response=view("registros.administrador",compact("apellidos","id"));
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
