@extends('layouts.principal')
@section('contenido')
    @switch($user["tipo"])
        @case("administrador")
            First case...
            @break  
        @case("proveedor")
            Second case...
            @break
        @case("rider")
            Third case...
            @break
        @default
    @endswitch
@endsection