<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mapa con Mapbox</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/rider.css') }}" />
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.css' rel='stylesheet' />
</head>
<body>
    @yield('contenido')
    <div id="map">
        <img src="{{ asset('img/superhero.png') }}" alt="" id="super">
        <button id="createMarkerButton">Crear Marca</button>
    </div> 





    <!-- Enlace al archivo JavaScript -->
    <script src="{{ asset('js/rider.js') }}"></script>
</body>
</html>
