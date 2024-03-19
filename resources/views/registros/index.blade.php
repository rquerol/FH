@extends('layouts.principal')
@section('contenido')
    <div class="offset-lg-3 col-lg-6 mt-5">
        <div class="card">
            <div class="card-header bg-secondary  text-light">Inscribirse</div>
            <div class="card-body">
            
                <div class="row mb-3">
                    <a href="{{url("registros/administrador")}}" class="btn btn-primary">
                        Administrador
                    </a>
                </div>

                <div class="row mb-3">
                    <a href="" class="btn btn-primary">
                        Raider
                    </a>
                </div>

                <div class="row mb-3">
                    <a href="" class="btn btn-primary">
                        Proveedor
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection