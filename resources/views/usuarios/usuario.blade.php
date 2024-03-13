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
                <form action="{{action([App\Http\Controllers\CicloController::class,'store'])}}" class="row" method="POST">  
                    @csrf
                    <label for="siglas" class="col-sm-2 col-form-label">
                        Siglas
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="text" id="siglas" class="form-control" name="Siglas" autofocus value="{{old('Siglas')}}">
                    </div>


                    <label for="nombre" class="col-sm-2 col-form-label">
                        Nombre
                    </label>
                    <div class="col-sm-10 mb-3">
                        <input type="text" id="nombre" class="form-control" name="Nombre" value="{{old('Nombre')}}">
                    </div>


                    <label for="descripcion" class="col-sm-2 col-form-label">
                        Descripción
                    </label>
                    <div class="col-sm-10">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="descripcion" style="height: 100px" name="Descripcion">{{old('Descripcion')}}</textarea>
                        </div>
                    </div>
        

                    <label for="activo" class="col-sm-2">
                        Activo
                    </label>
                    <div class="col-sm-10">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="activo" name="Activo" value="activo" @if (old("Activo") === "activo") @checked(true) @endif>
                        </div>
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