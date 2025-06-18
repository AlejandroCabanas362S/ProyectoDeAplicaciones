<?php
session_start();
include 'conexion.php';
$mensaje = '';

$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$apellido = isset($_SESSION['apellido']) ? $_SESSION['apellido'] : '';
$correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : '';
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];
    $servicio = $_POST['servicioDeseado'];
    $notas = $_POST['notas'];

    $stmt = $conn->prepare("INSERT INTO reservas (nombre, apellido, fecha, correo, servicioDeseado, notas) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido, $fecha, $correo, $servicio, $notas);

    if ($stmt->execute()) {
        $mensaje = "✅ Reserva registrada con éxito.";
    } else {
        $mensaje = "❌ Error: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ariel-IGNISIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
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

<style>
    :root {
        --accent: #8bc34a;
    }

    .booking-card {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .06);
    }

    .booking-card h2 {
        color: var(--accent);
        font-weight: 700;
        border-bottom: 2px solid var(--accent);
        padding-bottom: .5rem;
        margin-bottom: 1.5rem;
    }
</style>


<style>
    .table-custom thead {
        background: #8bc34a;
        color: #fff;
    }

    .table-custom tbody tr:nth-child(even) {
        background: #f8fafc;
    }

    .table-custom tbody tr:hover {
        background: #e8f5e9;
    }

    .table-custom td:first-child,
    .table-custom th:first-child {
        width: 60px;
        font-weight: 600;
    }

    .table-custom td,
    .table-custom th {
        padding: .75rem 1rem;
        vertical-align: middle;
    }

    .table-custom {
        border-radius: .75rem;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .06);
    }
</style>

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
                                <li><a href="haircut.php">Cortes</a></li>
                                <li><a href="services.php">Servicios</a></li>
                                <li><a href="about.php">Nosotros</a></li>
                                <li><a href="booking.php">Reservar Online</a></li>
                                <li><a href="contact.php">Contacto</a></li>
                                <li><a href="https://insignastetic.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog</a></li>
                                <li><a href="http://192.168.100.234/wordpress/" target="_blank" rel="noopener noreferrer">Beneficios</a></li>
                                <li class="active"><a href="sobreMi.php">Sobre mi</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
                        <div class="d-none d-xl-inline-block">
                            <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                                <li>
                                    <a href="/ignisia/login_styled.php" class="pl-3 pr-3 text-black"><span class="icon-user"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                    </div>

                </div>
            </div>
        </header>

        <div class="slide-one-item home-slider owl-carousel">
            <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">

                        <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                            <h2 class="text-white font-weight-light mb-2 display-1">Sobre mi</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="site-section bg-light">
            <div class="container">





                <div class="row justify-content-center gx-4 gy-4 py-4">
                    <!-- ──────────────── Primer formulario ──────────────── -->
                    <div class="col-md-6 col-lg-5">
                        <form action="booking.php" method="post" class="p-4 booking-card">
                            <h2>Datos del Estudiante</h2>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Carrera</label>
                                    <input type="text" name="Carrea" class="form-control" readonly value="Ing. Informática">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" readonly value="Ariel">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" readonly value="Narvaz">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Ciudad</label>
                                    <input type="text" name="Ciudad" class="form-control" readonly value="Capiatá">
                                </div>
                            </div>

                            <?php if ($mensaje) echo "<div class='mt-3 text-success fw-bold'>$mensaje</div>"; ?>
                        </form>
                    </div>

                    <!-- ──────────────── Segundo formulario ──────────────── -->
                    <div class="col-md-6 col-lg-5">
                        <form action="booking.php" method="post" class="p-4 booking-card">
                            <h2>Lógica JS</h2>

                            <div class="col-12">
                                <label class="form-label">Ingresa texto</label>
                                <input type="text" id="texto-original" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Texto invertido</label>
                                <input type="text" id="texto-invertido" class="form-control" readonly>
                            </div>

                            <button type="button" class="btn btn-success mt-2" onclick="invertirTexto()">
                                Invertir
                            </button>

                            <?php if ($mensaje) echo "<div class='mt-3 text-success fw-bold'>$mensaje</div>"; ?>
                        </form>
                    </div>
                </div>







                <h2 class="mb-4 mt-5 site-section-heading">Datos Base de datos</h2>

                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-custom bg-white">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>CI</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $conn->query("SELECT * FROM alumno_anarvaez");
                            $contador = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='align-middle text-center'>" . $contador++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['ci']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>




            </div>
        </div>



        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-5">
                            <h3 class="footer-heading mb-4">Sobre IGNISIA</h3>
                            <p>En IGNISIA combinamos técnicas clásicas con las tendencias más actuales para ofrecer resultados que resalten tu personalidad y estilo.</p>
                        </div>
                    </div>
                    <!-- 🟢  BLOQUE “Lógica JS” REEMPLAZADO -->
                    <!-- ───────── BLOQUE ÚNICO “Lógica JS” ───────── -->
                    <div class="col-md-6 col-lg-5">
                        <form class="p-4 booking-card" onsubmit="return false"><!-- evita submit -->
                            <h2>Lógica JS</h2>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Ingresa texto</label>
                                    <input type="text" id="texto-original" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Texto invertido</label>
                                    <input type="text" id="texto-invertido" class="form-control" readonly>
                                </div>

                                <div class="col-12">
                                    <button type="button" class="btn btn-success" onclick="invertirTexto()">
                                        Invertir
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="mb-5">
                            <h3 class="footer-heading mb-2">Suscríbete al Boletín</h3>
                            <p>Recibe consejos de cuidado capilar y ofertas exclusivas directamente en tu correo.</p>
                            <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Ingresa tu correo" aria-label="Ingresa tu correo" aria-describedby="button-addon2">
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
                Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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

    <script>
        function invertirTexto() {
            const inEl = document.getElementById('texto-original');
            const outEl = document.getElementById('texto-invertido');

            /* Si por algún motivo no encuentra los elementos, lo avisa en consola */
            if (!inEl || !outEl) {
                console.warn('No se encontraron los inputs de texto.');
                return;
            }

            /* Array.from gestiona correctamente tildes, emoji, etc. */
            outEl.value = Array.from(inEl.value).reverse().join('');
        }
    </script>

</body>

</html>