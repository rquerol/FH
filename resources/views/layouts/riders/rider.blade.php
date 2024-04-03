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
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeButton">&times;</span>
                <h2>Crear Pua</h2>
                <form id="puaForm">
                    <label for="nombrePua">Nombre de la Pua:</label><br>
                    <input type="text" id="nombrePua" name="nombrePua"><br><br>
                    <label for="pregunta1">Pregunta 1:</label><br>
                    <input type="text" id="pregunta1" name="pregunta1"><br><br>
                    <label for="pregunta2">Pregunta 2:</label><br>
                    <input type="text" id="pregunta2" name="pregunta2"><br><br>
                    <button type="button" id="submitForm">Crear Pua</button>
                </form>
            </div>
        </div>
    </div> 
    <!-- Enlace al archivo JavaScript -->
    <script src="{{ asset('js/rider.js') }}"></script>
</body>
</html>
