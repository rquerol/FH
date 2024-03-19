<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Clases\Utilidad;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($apellidos)
    {
        //Crear un objeto de la clase que representa una consulta a la tabla
        $administrador=new Administrador();
        //Asignar los valores del formulario a su respectivo campo
        $administrador->apellidos=$apellidos;

        try
        {
            //Hacer el insert en la tabla
            $administrador->save();
            $request->session()->flash("mensaje","Usuario inscrito correctamente.");
            $response=view("auth.login");
        }
        catch(QueryException $ex)
        {
            $mensaje=Utilidad::errorMessage($ex);
            $request->session()->flash("error",$mensaje);
            $response=view("auth.login");
        }
        

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
