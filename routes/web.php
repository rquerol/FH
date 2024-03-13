<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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
        return view("home",compact("user"));
    });
});


Route::get('/proveedor2', function () {
    return view('proveedor2');
});