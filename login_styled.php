<?php
session_start();
$mensaje_error = '';
if (isset($_SESSION['mensaje_error'])) {
  $mensaje_error = $_SESSION['mensaje_error'];
  unset($_SESSION['mensaje_error']);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <title>Ariel-IGNISIA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Playfair+Display:wght@600;700&display=swap"
    rel="stylesheet" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

  <!-- Fuentes locales -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <!-- Media Element Player -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">

  <!-- Estilos locales (rutas corregidas) -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Script del login -->
  <script defer src="Login.js"></script>

  <!-- Estilos personalizados -->
  <style>
    :root {
      --brand-green: #8bc34a;
      --dark: #000;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: url("images/hero_bg_2.jpg") center/cover no-repeat;
      filter: blur(8px);
      z-index: -2;
    }

    body::after {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(255, 255, 255, .45);
      z-index: -1;
    }

    body {
      font-family: "Poppins", sans-serif;
      color: #333;
      min-height: 100vh;
    }

    .site-navbar {
      background: #fff;
      border-bottom: 1px solid #eee;
    }

    .navbar-brand {
      font-family: "Playfair Display", serif;
      font-weight: 700;
      letter-spacing: .5px;
      color: var(--dark);
    }

    .site-menu a {
      color: var(--dark);
      padding-inline: .75rem;
      font-size: .95rem;
    }

    .site-menu a.active,
    .site-menu a:hover {
      color: var(--brand-green);
    }

    .site-menu a span {
      transition: transform .25s;
    }

    .site-menu a:hover span {
      transform: scale(1.2) rotate(10deg);
    }

    .login-card {
      max-width: 420px;
      width: 100%;
      background: rgba(255, 255, 255, .9);
      border: 1px solid rgba(0, 0, 0, .05);
      border-radius: 1.25rem;
      box-shadow: 0 25px 45px rgba(0, 0, 0, .1);
      backdrop-filter: saturate(180%) blur(12px);
    }

    .login-card h3 {
      font-family: "Playfair Display", serif;
      font-weight: 700;
      color: var(--dark);
    }

    .form-group {
      position: relative;
    }

    .form-icon {
      position: absolute;
      left: 0.9rem;
      top: 50%;
      transform: translateY(-50%);
      color: #a5a5a5;
      font-size: 0.9rem;
    }

    .form-control {
      padding-left: 2.5rem;
      border-radius: 0.5rem;
      border: 1px solid #d0d0d0;
      font-size: 0.95rem;
    }

    .form-control:focus {
      border-color: var(--brand-green);
      box-shadow: 0 0 0 .2rem rgba(139, 195, 74, .25);
    }

    .form-label {
      font-size: 0.8rem;
      font-weight: 500;
      color: #555;
    }

    .btn-primary {
      background: var(--brand-green);
      border-color: var(--brand-green);
      font-weight: 500;
      letter-spacing: .4px;
    }

    .btn-primary:hover,
    .btn-primary:focus {
      background: var(--brand-green);
      border-color: var(--brand-green);
    }
  </style>
</head>

<body>
  <header class="site-navbar py-1" role="banner">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-6 col-xl-2" data-aos="fade-down">
          <h1 class="mb-0"><a href="index.php" class="text-black h2 mb-0">IGNISIA</a></h1>
        </div>
        <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down"></div>
        <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
          <div class="d-none d-xl-inline-block">
            <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
              <li><a href="Layout/layout.php" class="pl-3 pr-3 text-black"><span class="icon-user"></span></a></li>
            </ul>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="d-flex flex-column align-items-center justify-content-center py-5" style="min-height:80vh;">
    <div class="card login-card p-4" data-aos="zoom-in">
      <h3 class="text-center mb-4">Iniciar Sesión</h3>
      <form iid="loginForm" method="post" action="login.php">
        <div class="mb-3">
          <label class="form-label" for="email">Correo electrónico</label>
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
              <i class="fa-solid fa-envelope text-muted"></i>
            </span>
            <input type="text" name="txtusuario" required class="form-control border-start-0" placeholder="usuario@ejemplo.com" />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">Contraseña</label>
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
              <i class="fa-solid fa-lock text-muted"></i>
            </span>
            <input type="password" name="txtpassword" required class="form-control border-start-0" placeholder="Contraseña" />
          </div>
        </div>
        <div class="text-danger text-center mb-3" style="font-size: 0.9rem;">
          <?php
          if ($mensaje_error) {
            echo $mensaje_error;
          }
          ?>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <button type="submit" id="submitButton" class="btn btn-primary w-100">Login</button>

          <!--   <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p> -->
        </div>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true
    });
  </script>
</body>

</html>