<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Models\Administrador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get("/login",[UsuarioController::class,"showLogin"])->name("login");
Route::post("/login",[UsuarioController::class,"login"]);
Route::get("/logout",[UsuarioController::class,"logout"]);

Route::middleware(["auth"])->group(function(){
    Route::get("/home",function(){
        $user=Auth::user();
        $id=$user["id"];
        switch($user["tipo"])
        {
            case "administrador":
                $administrador=Administrador::where("id","=",$id)->first();
                $response=view("home",compact("user","administrador"));
                break;
            case "proveedor":
                break;
            default:
                # code...
                break;
        }
        return $response;
    });
});

Route::get('/registros/index', function () {
    return view('registros.index');
});

Route::get('/registros/administrador', function () {
    return view('registros.administrador');
});

Route::get('/layouts/rider', function () {
    return view('layouts.rider');
});

Route::resource("usuarios",UsuarioController::class);