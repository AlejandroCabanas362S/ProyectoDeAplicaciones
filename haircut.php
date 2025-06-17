<?php
session_start();
include 'conexion.php';
$mensaje = '';

$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$apellido = isset($_SESSION['apellido']) ? $_SESSION['apellido'] : '';
$correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : '';
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Alejandro-IGNISIA &mdash;</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>




    <header class="site-navbar py-1" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2" data-aos="fade-down">
            <h1 class="mb-0">
              <a href="index.php" class="text-black h2 mb-0 d-block">IGNISIA</a>

              <!-- subtítulo en una sola línea -->
              <small class="d-block text-muted lh-1 text-nowrap" style="font-size:.75rem;">
                Reservas y turnos online para peluquerías o centros estéticos
              </small>
            </h1>
          </div>

          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="index.php">Inico</a></li>
                <?php if ($rol === 'admin' || $rol === 'emple'): ?>
                  <li class="has-children">
                    <a>Administración</a>
                    <ul class="dropdown">
                      <li><a href="register.php">Usuarios</a></li>
                      <li><a href="empleados.php">Empleados</a></li>
                      <li><a href="products.php">Productos</a></li>
                      <li><a href="reserve.php">Reservas</a></li>
                      <li><a href="contactAdm.php">Contactos</a></li>
                    </ul>
                  </li>
                <?php endif; ?>
                <li class="active"><a href="haircut.php">Cortes</a></li>
                <li><a href="services.php">Servicios</a></li>
                <li><a href="about.php">Nosotros</a></li>
                <li><a href="booking.php">Reservar Online</a></li>
                <li><a href="contact.php">Contacto</a></li>
                <li><a href="https://insignastetic.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog</a></li>
                <li><a href="http://192.168.100.234/wordpress/" target="_blank" rel="noopener noreferrer">Beneficios</a></li>
                <li><a href="sobreMi.php" target="_blank" >Sobre mi</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="login_styled.php" class="pl-3 pr-3 text-black"><span class="icon-user"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
                class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>

    </header>





    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-4 display-1 line-height-1">Estilos y Precios</h2>

              <p><a href="#" class="btn btn-black py-3 px-5">¡Reserva Ya!</a></p>
            </div>
          </div>
        </div>
      </div>

    </div>



    <div class="site-section">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 bg-light site-block-feature-7">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <div class="p-4 p-lg-5">
                <h3 class="text-black h4">Corte Clásico</h3>
                <p>Un corte tradicional que combina precisión y estilo para un acabado impecable.</p>
                <p><strong class="font-weight-bold text-primary">$29</strong></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 bg-light site-block-feature-7">
              <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              <div class="p-4 p-lg-5">
                <h3 class="text-black h4">Fade Moderno</h3>
                <p>Degradado perfecto para un look fresco y contemporáneo que marca tendencia.</p>
                <p><strong class="font-weight-bold text-primary">$29</strong></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 bg-light site-block-feature-7">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              <div class="p-4 p-lg-5">
                <h3 class="text-black h4">Corte con Diseño</h3>
                <p>Detalles creativos que añaden personalidad y originalidad a tu estilo.</p>
                <p><strong class="font-weight-bold text-primary">$29</strong></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 bg-light site-block-feature-7">
              <img src="images/img_4.jpg" alt="Image" class="img-fluid">
              <div class="p-4 p-lg-5">
                <h3 class="text-black h4">Coloración Completa</h3>
                <p>Transforma tu look con tonos vibrantes aplicados por expertos coloristas.</p>
                <p><strong class="font-weight-bold text-primary">$29</strong></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 bg-light site-block-feature-7">
              <img src="images/img_5.jpg" alt="Image" class="img-fluid">
              <div class="p-4 p-lg-5">
                <h3 class="text-black h4">Tratamiento Capilar</h3>
                <p>Nutrimos tu cabello en profundidad para un brillo y suavidad incomparables.</p>
                <p><strong class="font-weight-bold text-primary">$29</strong></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 bg-light site-block-feature-7">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <div class="p-4 p-lg-5">
                <h3 class="text-black h4">Afeitado Premium</h3>
                <p>Experiencia de afeitado tradicional con toallas calientes y acabado perfecto.</p>
                <p><strong class="font-weight-bold text-primary">$29</strong></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <img src="images/person_1.jpg" alt="Image" class="img-md-fluid">
          </div>
          <div class="col-lg-6 bg-white p-md-5 align-self-center">
            <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">¡Nuevo look!</h2>
            <p class="text-black lead"><em>&ldquo;Salí del salón sintiéndome renovada. El equipo de IGNISIA entendió mi
                estilo y superó mis expectativas.&rdquo;</em></p>
            <p class="lead text-black">&mdash; <em>Stella Martin</em></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-4 text-black">Queremos que tu cabello luzca fabuloso</h2>
            <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5 text-white">Visita Nuestro Salón Ahora</a></p>
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Sobre IGNISIA</h3>
              <p>Combinamos técnicas clásicas con tendencias actuales para brindarte resultados que realzan tu
                personalidad y estilo.</p>
            </div>



          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Menú Rápido</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Inicio</a></li>
                  <li><a href="#">Barberos</a></li>
                  <li><a href="#">Noticias</a></li>
                  <li><a href="#">Equipo</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Sobre Nosotros</a></li>
                  <li><a href="#">Política de Privacidad</a></li>
                  <li><a href="#">Contacto</a></li>
                  <li><a href="#">Membresía</a></li>
                </ul>
              </div>
            </div>



          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-2">Suscríbete al Boletín</h3>
              <p>Recibe consejos de cuidado capilar y ofertas exclusivas directamente en tu correo.</p>
              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent"
                    placeholder="Ingresa tu correo" aria-label="Ingresa tu correo" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Enviar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-2">Integrastes</h3>
              <p>Alejandro Cabañas</p>
              <p>Lucas Berino</p>
              <p>Ariel Narvaez </p>
              <p>Mateus Velazque </p>
              <p>Antonio Gonzalez</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="mb-5">
            <h3 class="footer-heading mb-2">Datos</h3>
            <p>2025</p>
            <p>Carrera: Ing. Informatica </p>
            <p>Presentador: Alejandro Cabañas</p>
          </div>
        </div>
      </div>

  </div>
  <div class="row pt-5 mt-5 text-center">
    <div class="col-md-12">
      <div class="mb-5">
        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
      </div>

      <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;
        <script data-cfasync="false"
          src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script>
          document.write(new Date().getFullYear());
        </script> Todos los derechos reservados
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>

  </div>
  </div>
  </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>