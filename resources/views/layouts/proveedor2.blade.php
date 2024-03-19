<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proveedor2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/proveedor2.css') }}" />
</head>

<body>
    @yield('contenido')

    <div class="contenedor">
        <div class="infoProveedor"></div>
        <div class="estadisticas"></div>
        <div class="crearMenu"></div>
        <div class="entregarMenu"></div>
        <div class="stok"></div>
        <div class="mapa"></div>
    </div>

    <h1>Pol Garcia</h1>
    <p>esta es la segunda pagina del proveedor, no la del mapa</p>


    <div class="proveedor">
        <h1>proveedor</h1>
        <h2>Rebecca</h2>
        <p></p>
    </div>

</body>

</html>
