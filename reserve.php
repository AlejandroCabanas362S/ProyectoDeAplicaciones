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
    <title>Alejandro-IGNISIA</title>
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
                                    <li class="has-children active">
                                        <a>Administración</a>
                                        <ul class="dropdown">
                                            <li><a href="register.php">Usuarios</a></li>
                                            <li><a href="empleados.php">Empleados</a></li>
                                            <li><a href="products.php">Productos</a></li>
                                            <li class="active"><a href="reserve.php">Reservas</a></li>
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
                                <li><a href="sobreMi.php" target="_blank" >Sobre mi</a></li>
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


        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mb-5">
                        <form action="reserve.php" method="post" class="p-5 bg-white">
                            <h2 class="mb-4 site-section-heading">Agregar reserva</h2>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3">
                                    <label class="text-black">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="text-black">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3">
                                    <label class="text-black">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="text-black">Correo</label>
                                    <input type="email" name="correo" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="text-black" for="treatment">Servicio deseado</label>
                                    <select name="servicioDeseado" required class="form-control">
                                        <option value="corte_basico">Corte básico</option>
                                        <option value="corte_estilo">Corte con estilo</option>
                                        <option value="barba">Perfilado de barba</option>
                                        <option value="tinte">Tinte</option>
                                        <option value="peinado">Peinado</option>
                                        <option value="tratamiento_capilar">Tratamiento capilar</option>
                                        <option value="alisado">Alisado</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-black">Notas</label>
                                    <input type="text" name="notas" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Reservar" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>

                            <?php if ($mensaje) echo "<div class='mt-2 text-success fw-bold'>$mensaje</div>"; ?>
                        </form>

                    </div>



                    <h2 class="mb-4 mt-5 site-section-heading">Reservas registradas</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless shadow-sm rounded bg-white">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha</th>
                                    <th>Correo</th>
                                    <th>Servicio</th>
                                    <th>Notas</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $conn->query("SELECT * FROM reservas");
                                $contador = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<form method='POST' action='reserveEdit.php'>";
                                    echo "<td class='align-middle text-center'>" . $contador++ . "</td>";
                                    echo "<td><input type='text' name='nombre' value='" . htmlspecialchars($row['nombre']) . "' class='form-control form-control-sm'></td>";
                                    echo "<td><input type='text' name='apellido' value='" . htmlspecialchars($row['apellido']) . "' class='form-control form-control-sm'></td>";
                                    echo "<td><input type='date' name='fecha' value='" . $row['fecha'] . "' class='form-control form-control-sm'></td>";
                                    echo "<td><input type='email' name='correo' value='" . htmlspecialchars($row['correo']) . "' class='form-control form-control-sm'></td>";
                                    echo "<td><input type='text' name='servicioDeseado' value='" . htmlspecialchars($row['servicioDeseado']) . "' class='form-control form-control-sm'></td>";
                                    echo "<td><input type='text' name='notas' value='" . htmlspecialchars($row['notas']) . "' class='form-control form-control-sm'></td>";
                                    echo "<td class='text-center'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-success btn-sm px-3 rounded-1'>
                                        <i class='icon-check'></i> Guardar
                                    </button>
                                    </td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
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
                            <p>En IGNISIA combinamos técnicas clásicas con las tendencias más actuales para ofrecer resultados que resalten tu personalidad y estilo.</p>
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
                Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                <script>
                    document.write(new Date().getFullYear());
                </script> Todos los derechos reservados
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