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
<html lang="es">

<head>
  <title>Ariel-IGNISIA </title>
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

  <script>
    function actualizarHoraParaguay() {
      // Obtener la hora actual en Paraguay (UTC-4)
      const opciones = {
        timeZone: 'America/Asuncion',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
      };
      const horaParaguay = new Intl.DateTimeFormat('es-PY', opciones).format(new Date());
      document.getElementById('hora-paraguay').textContent = "Hora PY: " + horaParaguay;
    }

    setInterval(actualizarHoraParaguay, 1000);
    actualizarHoraParaguay(); // llamada inicial
  </script>

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
              <small class="d-block text-muted lh-1 text-nowrap" style="font-size:.75rem;">
                Reservas y turnos online para peluquerías o centros estéticos
              </small>
            </h1>
          </div>

          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="index.php">Inico</a></li>
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
                <li><a href="haircut.php">Cortes</a></li>
                <li><a href="services.php">Servicios</a></li>
                <li><a href="about.php">Nosotros</a></li>
                <li><a href="booking.php">Reservar Online</a></li>
                <li><a href="contact.php">Contacto</a></li>
                <li><a href="https://insignastetic.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog</a></li>
                <li><a href="http://192.168.100.234/wordpress/" target="_blank" rel="noopener noreferrer">Beneficios</a></li>
                <li><a href="sobreMi.php">Sobre mi</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <span id="hora-paraguay" class="text-black"></span>
                </li>
                <li>
                  <a href="/ignisia/login_styled.php" class="pl-3 pr-3 text-black"><span class="icon-user"></span></a>
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

      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h5 class="text-white font-weight-light text-uppercase">Bienvenido a IGNISIA</h5>
              <h2 class="text-white font-weight-light mb-2 display-1">Expertos en Estilo</h2>

              <p><a href="#" class="btn btn-black py-3 px-5">¡Reserva ahora!</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-2 display-1">¡Cabello hermoso, vida saludable!</h2>

              <p><a href="#" class="btn btn-black py-3 px-5">¡Reserva ahora!</a></p>
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 text-center">
            <h3 class="line-height-1 mb-3"><span class="d-block display-4 line-height-1 text-black">Bienvenido a</span>
              <span class="d-block display-4 line-height-1"><em
                  class="text-primary font-weight-bold">IGNISIA</em></span>
            </h3>
            <p>En IGNISIA creemos que cada cabellera cuenta una historia. Nuestro equipo de estilistas profesionales
              combina creatividad y técnicas de vanguardia para realzar tu imagen y reflejar tu personalidad única. Ven
              y vive la experiencia de un servicio personalizado en un ambiente relajado y moderno.</p>
            <p><a href="#"><small class="text-uppercase font-weight-bold">Leer más</small></a></p>
          </div>
          <div class="col-md-6 col-lg-4">
            <figure class="h-100 hover-bg-enlarge">
              <div class="bg-image h-100 bg-image-md-height" style="background-image: url('images/img_2.jpg');"></div>
            </figure>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="border p-4 d-flex align-items-center justify-content-center h-100">
              <div class="text-center">
                <h2 class="text-primary h2 mb-5">Horario de Atención</h2>
                <p class="mb-4">
                  <span class="d-block font-weight-bold">Lun – Vie </span>
                  10:00 AM – 8:30 PM
                </p>

                <p class="mb-4">
                  <span class="d-block font-weight-bold">Sábado</span>
                  Cerrado
                </p>

                <p class="mb-4">
                  <span class="d-block font-weight-bold">Domingo</span>
                  10:00 AM – 8:30 PM
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="site-section-heading font-weight-light text-black text-center">Servicios Destacados</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-razor display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">Afeitado con Navaja</h3>
              <p>Disfruta de un afeitado tradicional con toallas calientes y aceites esenciales que dejan tu piel suave
                y revitalizada.</p>
              <p><strong class="font-weight-bold text-primary">$29</strong></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-location-pin display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">Coloración Premium</h3>
              <p>Creamos tonos vibrantes y duraderos utilizando productos de alta calidad que protegen y nutren tu
                cabello.</p>
              <p><strong class="font-weight-bold text-primary">$46</strong></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
              <span class="icon flaticon-shave display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-black h4">Corte de Estilo</h3>
              <p>Actualiza tu look con un corte de tendencia adaptado a tu forma de rostro y estilo de vida.</p>
              <p><strong class="font-weight-bold text-primary">$24</strong></p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <img src="images/person_1.jpg" alt="Cliente satisfecho" class="img-md-fluid">
          </div>
          <div class="col-lg-6 bg-white p-md-5 align-self-center">
            <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">¡Nuevo Estilo!</h2>
            <p class="text-black lead"><em>&ldquo;Nunca había sentido mi cabello tan saludable y brillante. El equipo de
                IGNISIA capturó exactamente lo que quería y superó mis expectativas. ¡Volveré sin duda!&rdquo;</em></p>
            <p class="lead text-black">&mdash; <em>Stella Martín</em></p>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover overlay inner-page-cover"
      style="background-image: url(images/hero_bg_2.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-5 display-3">Vive nuestros servicios excepcionales</h2>
            <!--  <a href="https://vimeo.com/channels/staffpicks/93951774"
              class="play-single-big d-inline-block popup-vimeo"><span class="icon-play"></span></a> -->
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Acerca de IGNISIA</h3>
              <p>Somos un salón boutique dedicado a ofrecer experiencias de belleza de primera clase. Fusionamos
                técnicas tradicionales y tendencias modernas para brindar resultados que inspiran confianza y estilo.
              </p>
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
                  <li><a href="#">Contáctanos</a></li>
                  <li><a href="#">Membresía</a></li>
                </ul>
              </div>
            </div>



          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-2">Suscríbete al Boletín</h3>
              <p>Recibe novedades, promociones y consejos de cuidado capilar directamente en tu correo.</p>
              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent"
                    placeholder="Ingresa tu email" aria-label="Ingresa tu email" aria-describedby="button-addon2">
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
            <p>Presentador: Ariel Narvaez</p>
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