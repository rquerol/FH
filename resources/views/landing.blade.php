<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Hero - Salva Comida Alimenta Corazones</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
  <link href="https://fonts.cdnfonts.com/css/luckiest-guy" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}" />
 
</head>

<body>

  <div class="container-fluid">

    <div class="d-flex align-items-center">
      <div class="col-12">
        <div class="row">
          <nav class="barra navbar navbar-expand-lg">
            <a href="#">
              <img class="logo-barra" src="{{ asset('img/logo-02.png') }}" alt="Food Hero" />
              
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse gap-3" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item mx-4">
                  <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item mx-4">
                  <a class="nav-link" href="#nosotros">Nosotros</a>
                </li>
                <li class="nav-item mx-4">
                  <a class="nav-link" href="#raider">Raider</a>
                </li>
                <li class="nav-item mx-4">
                  <a class="nav-link" href="#proveedor">Proveedor</a>
                </li>
                <ul class="navbar-nav">
                  <li class="nav-item mx-4">
                      <a class="nav-link" href="#footer">Unete</a>
                  </li>
                  
                  <li class="nav-item mx-4 ms-5">
                      <a class="nav-link" href="{{ route('login') }}" style="color: black;">Ir al APP</a>
                  </li>
              </ul>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <section id="home" class="contenedor-seccion">
      <div class="contenedor-imagen">
       <img src="{{ asset('img/home.png') }}" alt="">
      </div>
    </section>

    <section id="nosotros" class="contenedor-seccion">
      <div class="contenedor-imagen">
        <img src="{{ asset('img/nosotros.png') }}" alt="">
        <p class="parrafo"> ¡Bienvenidos a Food Heroe! plataforma que une a héroes sin capa que salvan comida y alimentan corazones. Proveedores (generan menú de regalo) y 
          raiders (entregan menú) se unen en una noble causa para alimentar al necesitado, geolozalizados en la app 
        </p>
      </div>
    </section>

    <section id="raider" class="contenedor-seccion">
      <div class="contenedor-imagen">
        <img src="{{ asset('img/raider.png') }}" alt="">
        <p class="parrafo"> Nuestros riders, a través de nuestro app, al momento de identificar un persona en necesidad, pueden crear un punto geolocalizado de entrega 
          (denominado "pua"), además la posibilidad de repartir un menú solidario creado por un proveedor 
        </p>
      </div>
    </section>

    <section id="proveedor" class="contenedor-seccion">
      <div class="contenedor-imagen">
        <img src="{{ asset('img/proveedor.png') }}" alt="">
        <p class="parrafo"> Los proveedores arman menús (desayuno, comida, cena), elaborados con productos de sus tiendas, que están dispuestos a regalar a alguien lo necesite. A través de la app 
          generan una púa con la cantidad de menús, que luego será retirado y entregado por un raider
        </p>
      </div>
    </section>

    

    <section id="footer" class="contenedor-seccion">
      <div class="contenedor-imagen">
      
        <img src="{{ asset('img/footer.png') }}" alt="">
        <p class="parrafo"> Únete a nosotros en esta misión. ¡Juntos podemos hacer una diferencia real en las vidas de quienes más lo necesitan! 
          El mundo te necesita, el mundo necesita nuevos héroes
        </p>
      </div>
    </section>
  </div>

  <!-- Scripts de Bootstrap (jQuery y Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="/assets/js/script.js"></script>
</body>

</html>