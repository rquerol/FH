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
        <div id="myModal" class="modal-pua">
            <div class="modal-pua-content">
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

         <!-- Navbar Inferior -->
        <nav class="navbar-bottom">
            <div class="container text-center d-flex ">
                <div class="navbar-item">
                    <a href="#">
                        <img src="{{ asset('img/perfil.png') }}" alt="Perfil" class="img-fluid" />
                        <div>Perfil</div>
                    </a>
                </div>
                <div class="navbar-item">
                    <a href="#">
                        <img src="{{ asset('img/crear_pua.png') }}"alt="Crear Pua" class="img-fluid" />
                        <div>Crear Pua</div>
                    </a>
                </div>
                <div class="navbar-item">
                    <a href="#" data-toggle="modal" data-target="#modal-reservas">
                        <img src="{{ asset('img/reservas.png') }}" alt="Reservar" class="img-fluid" />
                        <div>Reservar</div>
                    </a>
                </div>
                <div class="navbar-item">
                    <a href="#" data-toggle="modal" data-target="#modal-historial">
                    <img src="{{ asset('img/historial.png') }}"alt="Historial" class="img-fluid" />
                        <div>Historial</div>
                    </a>
                </div>
            </div>
        </nav>
      
            <!-- Modal Reservas -->
        {{-- <div id="modal-reservas" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">RESERVAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>PROVEEDOR</th>
                                        <th>RESERVAS</th>
                                        <th>HORARIOS</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr>
                                        <td>Pizzeria Rebebba</td>
                                        <td>4</td>
                                        <td>18:00 a 22:00</td>
                                    </tr>
                                    <tr>
                                        <td>BurgerKing</td>
                                        <td>2</td>
                                        <td>20:00 a 20:30</td>
                                    </tr>
                                    <tr>
                                        <td>365</td>
                                        <td>2</td>
                                        <td>12:00 a 24:00</td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> --}}

            <!-- Modal Historial -->
        {{-- <div id="modal-historial" class="modal fade">
            <div class="modal-dialog modal-lg mt-3">
                <div class="modal-content px-5 pt-3 pb-3">
                    <div class="row">
                        <div class="col-lg-12 contact-form">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="text-end">
                                        <!-- Cambiar btn-close a close -->
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="card-title text-center pb-3">
                                        <h3>HISTORIAL</h3>
                                        <p class="lead text-muted fw-light">Descubre el historial de tus puas.</p>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <h4>PUAS CREADAS</h4>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <p class="lead m-0">12</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <h4>MENÚS ENTREGADOS</h4>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <p class="lead m-0">5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <h4>RESERVAS ACTUALES</h4>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <p class="lead m-0">3</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <h4>RANKING</h4>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <p class="lead m-0">5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}




    </div> 
    <!-- Enlace al archivo JavaScript -->
    <script src="{{ asset('js/rider.js') }}"></script>
</body>
</html>
