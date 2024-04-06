<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proveedor2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="{{ asset('css/proveedor2.css') }}">
</head>

<body>
    <div class="contenedor col-lg-12">
        <div class="fila1 col-lg-12">
            <div class="infoProveedor col-lg-7 col-sm-12">
                <h2>Proveedor</h2>
                <h5>Calle: </h5>
                <p>C/ Mallorca 283</p>
                <h5>Ciudad: </h5>
                <p>Barcelona</p>
                <h5>CP: </h5>
                <p>08037</p>
            </div>
            <div class="estadisticas col-lg-4 col-sm-12">
                <h2>Estadisticas</h2>
            </div>
        </div>

        <div class="fila2 col-lg-12">
            <div class="crearMenu col-lg-4 col-sm-12">
                <div class="tituloMenu">
                    <h2>Crear Menu</h2>
                </div>
                <div class="cantidadMenu">
                    <div class="menosMenu">
                        <button class="menos"> - </button>
                    </div>
                    <div class="cantMenu"> 3 </div>
                    <div class="masMenu">
                        <button class="mas"> + </button>
                    </div>
                </div>
                <div class="btnCrear">
                    addcslashes
                        <!-- <button class="crear">
                            Crear Menu(s)
                        </button> -->
                </div>
            </div>
            <div class="entregarMenu col-lg-7 col-sm-12">
                <h2>Entregar Menu</h2>
            </div>
        </div>

        <div class="fila3 col-lg-12">
            <div class="stok col-lg-5 col-sm-12">
                <h2>Stok</h2>
            </div>
            <div class="mapa col-lg-5">
                @yield('contenido')
                <div id="map">
                    <a href="{{ route('proveedor2') }}">
                        <button class="mover" id="mover">Gestionar Proveedor</button>
                    </a>
                </div>
                <script src="{{ asset('js/rider.js') }}"></script>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @yield('contenido')
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>