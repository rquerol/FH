@extends('layouts.principal')
@section('contenido')
    @include("partials.mensajes")
    <div id="contenedorPrincipal">
        <div class="modal fade" tabindex="-1" id="modalCambiarAvatar">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex; justify-content: center;">
                        <div class="row" style="text-align: center;">
                            <h5 class="modal-title" id="tituloModalMostrarFollowing" style="font-weight: bold;">Elige un avatar</h5>
                        </div>
                    </div>
                    <div class="modal-body" style="height: 350px; overflow-y: auto;">
                        <div class="row" id="contenedorAvatares"></div>
                        <!--<p class="col text-center">Username</p>
                        <div class="col text-center">
                            <button class="btn btn-danger btn-sm">Dejar de seguir</button>
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card mt-2">
                <div class="card-header">
                    <p class="h5 font-wight-bold text-center">
                        <strong>
                            @if($tipo==="administrador") {{"Inscribir administrador"}} @elseif ($tipo==="proveedor") {{"Inscribir proveedor"}} @else {{"Inscribir rider"}} @endif
                        </strong>
                    </p>
                </div>
                <div class="card-body" @if($tipo==="proveedor"||$tipo==="rider") style="height: 455px; overflow-y: auto;" @endif>
                    <form action="{{action([App\Http\Controllers\UsuarioController::class,'store'])}}" class="row" method="POST" id="formularioinscripcion" enctype="multipart/form-data">  
                        @csrf

                        @if($tipo==="rider")
                            @php
                                $listaAvatares=json_encode($listaAvatares);
                            @endphp
                            <div class="col-sm-12 mb-3 text-center">
                                <img src="{{asset('media/img/avatares/avatar1.png')}}" alt="imagen avatar" height="150vh" width="150vw" id="imagenAvatar" data-avatares="{{$listaAvatares}}" data-bs-toggle="modal" data-bs-target="#modalCambiarAvatar">
                            </div>

                            <div hidden>
                                <label for="avatar">
                                    Avatar
                                </label>
                                <input type="text" id="avatar" name="Avatar" readonly>
                            </div>

                            <label for="nickname" class="col-sm-2 col-form-label">
                                Nickname
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="text" id="nickname" class="form-control" name="Nickname" autofocus>
                            </div>

                        @endif


                        <label @if($tipo==="proveedor") for="nombreEmpresa" @else for="nombre" @endif class="col-sm-2 col-form-label">
                            Nombre @if($tipo==="proveedor") {{"empresa"}} @endif
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" @if($tipo==="proveedor") id="nombreEmpresa" @else id="nombre" @endif class="form-control" @if($tipo==="proveedor") name="NombreEmpresa" @else name="Nombre" @endif @if($tipo!=="rider") autofocus @endif>
                        </div>


                        @if ($tipo==="administrador"||$tipo==="rider")
                            <label for="apellidos" class="col-sm-2 col-form-label">
                                Apellidos
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="text" id="apellidos" class="form-control" name="Apellidos">
                            </div>
                        @endif


                        <label for="contrasenia" class="col-sm-2 col-form-label">
                            Contraseña
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="password" id="contrasenia" class="form-control" name="Contrasenia">
                        </div>


                        {{-- <label for="contrasenia" class="col-sm-2 col-form-label">
                            Confirmar contraseña
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="password" id="confirmarContrasenia" class="form-control" name="ConfirmarContrasenia">
                        </div> --}}


                        <label for="email" class="col-sm-2 col-form-label">
                            Email
                        </label>
                        <div class="col-sm-10 mb-3">
                            <input type="email" id="email" class="form-control" name="Email">
                        </div>


                        <div hidden>
                            <label for="tipo">
                                Tipo
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="text" id="tipo" name="Tipo" value="{{$tipo}}" readonly>
                            </div>
                        </div>


                        <label for="telefono" class="col-sm-2 col-form-label">
                            Telefono
                        </label>
                        <div @if($tipo==="rider") class="col-sm-10" @else class="col-sm-10 mb-3" @endif>
                            <input type="tel" id="telefono" class="form-control" name="Telefono">
                        </div>

                        @if ($tipo==="proveedor")


                            <label for="calle" class="col-sm-2 col-form-label">
                                Calle
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="text" id="calle" class="form-control" name="Calle">
                            </div>


                            <label for="numero" class="col-sm-2 col-form-label">
                                Edificio (Numero)
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="number" id="numero" class="form-control" name="Numero">
                            </div>


                            <label for="cp" class="col-sm-2 col-form-label">
                                Cp
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="number" id="cp" class="form-control" name="Cp">
                            </div>


                            <label for="ciudad" class="col-sm-2 col-form-label">
                                Ciudad
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="text" id="ciudad" class="form-control" name="Ciudad">
                            </div>


                            <label for="logo" class="col-sm-2 col-form-label">
                                Logo
                            </label>
                            <div class="col-sm-10 mb-3">
                                <input type="file" id="logo" class="form-control" name="Logo" required>
                            </div>


                        @endif


                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary" form="formularioinscripcion">
                        Aceptar
                    </button>
                    <a href="{{url('/registros/index')}}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if($tipo==="rider")
        <script src="{{asset('js/usuarioBladePhpRider.js')}}"></script>
    @endif
@endsection