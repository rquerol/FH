@extends('layouts.principal')
@section('contenido')
    @include("partials.mensajes")
    <div class="container">
        <div class="card mt-2">
            <div class="card-body">
                <p class="h5 font-wight-bold">
                    <strong>
                        Inscribirse
                    </strong>
                </p>
                <form action="{{action([App\Http\Controllers\UsuarioController::class,'store'])}}" class="row" method="POST">  
                    @csrf


                    <label for="nombre" class="col-sm-2 col-form-label">
                        Nombre
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="text" id="nombre" class="form-control" name="Nombre" autofocus>
                    </div>


                    <label for="contrasenia" class="col-sm-2 col-form-label">
                        Contraseña
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="password" id="contrasenia" class="form-control" name="Contrasenia">
                    </div>


                    <label for="contrasenia" class="col-sm-2 col-form-label">
                        Confirmar contraseña
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="password" id="confirmarContrasenia" class="form-control" name="ConfirmarContrasenia">
                    </div>


                    <label for="email" class="col-sm-2 col-form-label">
                        email
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="email" id="email" class="form-control" name="Email">
                    </div>


                    <div hidden>
                        <label for="tipo" class="col-sm-2 col-form-label">
                            tipo
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" id="tipo" class="form-control" name="Tipo" value="administrador" readonly>
                        </div>
                    </div>

<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
                    <label for="telefono" class="col-sm-2 col-form-label">
                        telefono
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="email" id="email" class="form-control" name="Email">
                    </div>



                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            Aceptar
                        </button>
                        <a href="{{url('ciclos')}}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection