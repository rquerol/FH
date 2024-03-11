<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasApiTokens,HasFactory,Notifiable;

    // protected $table="usuarios";
    // public $timestamps=false;

    // /**
    //  * Get the rol that owns the usuario
    //  * 
    //  * @return \Illuminate\Database\Eloquent\Relations\BeLongsTo
    //  */
    // public function tipoUsuario():BelongsTo
    // {
    //     return $this->belongsTo(TipoUsuario::class,"tipo");
    // }

    protected $table="usuarios";
    protected $primaryKey="id"; //solo se pone cuando la clave primaria no se llama id.
    //public $incrementing=false; //solo se pone cuando la clave primaria es autoincremental.
    //protected $keyType="string"; //solo se pone cuando la clave primaria no es entero.
    public $timestamps=false;
}
