<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pua;
use Illuminate\Http\Request;

class PuaController extends Controller
{
    public function index()
    {
        $puas = Pua::all();
        return response()->json($puas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'numpersonas' => 'required|integer',
            'lng' => 'required|numeric',
            'lat' => 'required|numeric',
        ]);

        $pua = new Pua();
        $pua->nombre = $request->nombre;
        $pua->numpersonas = $request->numpersonas;
        $pua->lng = $request->lng;
        $pua->lat = $request->lat;
        $pua->save();

        return response()->json($pua, 201);
    }

    public function show(Pua $pua)
    {
        return response()->json($pua);
    }

    public function update(Request $request, Pua $pua)
    {
        $request->validate([
            'nombre' => 'required|string',
            'numpersonas' => 'required|integer',
            'lng' => 'required|numeric',
            'lat' => 'required|numeric',
        ]);

        $pua->nombre = $request->nombre;
        $pua->numpersonas = $request->numpersonas;
        $pua->lng = $request->lng;
        $pua->lat = $request->lat;
        $pua->save();

        return response()->json($pua, 200);
    }

    public function destroy(Pua $pua)
    {
        $pua->delete();
        return response()->json(null, 204);
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\Pua;
use Illuminate\Http\Request;

class PuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pua $pua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pua $pua)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pua $pua)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pua $pua)
    {
        //
    }
}
