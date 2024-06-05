<!DOCTYPE html>
<html lang="es">
<?php

use App\Models\UserModel;

$userModel = new UserModel();
$user = $userModel->where('id', $_SESSION['id'])->first();
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php 
     if(isset($title))
     {
        echo '<title>'.$title.'</title>';
     }
     else
     {
        echo '<title>Perdi mi Billetera</title>';
     }
    ?>

    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="<?= base_url('assets/img/logo.png') ?>" rel="shortcut icon">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="shortcut icon" type="image/ico" href="assets/icons/logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="<?= base_url('/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">


    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->renderSection('title') ?>
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center m-2">

        <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <a href=<?= base_url($_SESSION['index']) ?> class="logo d-flex align-items-center">
            <span>&nbsp;&nbsp;</span>
            <span class="d-none d-lg-block">Perdi Mi Billetera</span>
        </a>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src=<?= base_url('assets/img/profile-img.png') ?> alt="Perfil " class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo $user['nombre'] . ' ' . $user['apellido'] ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">

                            <h6>
                                <?php echo $user['nombre'] . ' ' . $user['apellido'] ?>
                            </h6>
                            <span>
                                <?php
                                echo $_SESSION['tipo_rol']
                                    ?>
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <a class="dropdown-item d-flex align-items-center" href='<?php echo base_url('perfil') ?>'>
                                <i class="bi bi-person"></i>
                                <span>Mi Perfil</span>
                            </a>

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action='<?= base_url('perfil') ?>' method="GET">
                                <button class="dropdown-item d-flex align-items-center"
                                    href='<?php echo base_url('perfil') ?>' type="submit" name="menu" value="1">
                                    <i class="bi bi-gear"></i>
                                    <span>Configuracion de Cuenta</span>
                                    </a>
                            </form>
                        </li>
                        <li>
                            <form action='<?= base_url('cerrarSesion') ?>' method="GET">
                                <button class="dropdown-item d-flex align-items-center" type="submit">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Cerrar Sesion</span>
                                    </a>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar m-2">
        

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href=<?= base_url($_SESSION['index']) ?>>
                    <i class="bi bi-grid"></i>
                    <span>Inicio</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Documentacion</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <?php if ($_SESSION['tipo_rol'] == "Administrador") { ?>
                        <li>
                            <a href="<?= base_url('/forms/formDocumentacion') ?>">
                                <i class="bi bi-circle"></i><span>Cargar nueva documentación a un usuario </span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('miDocumentacion/' . $_SESSION['id'] . '') ?>">
                            <i class="bi bi-circle"></i><span>Mi documentación</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('/user/cargarDocumentacion') ?> ">
                            <i class="bi bi-circle"></i><span>Agregar documentacion</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<? //= base_url('listarDocumentacion/'.$_SESSION['id'].'') ?>">
                            <i class="bi bi-circle"></i><span>Documentación del Usuario</span>
                        </a>
                    </li> -->
                    <?php if ($_SESSION['tipo_rol'] == "Administrador") { ?>
                        <li>
                            <a href="<?= base_url('/administrarTipoDocumentacion') ?>">
                                <i class="bi bi-circle"></i><span>Administrar tipos de documentación</span>
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </li><!-- End Forms Nav -->
            <?php if ($_SESSION['tipo_rol'] == "Administrador") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <?php if ($_SESSION['tipo_rol'] == "Administrador") { ?>
                        <li>
                            <a href="<?= base_url('/forms/formUsuarios_admin') ?>">
                                <i class="bi bi-circle"></i><span>Agregar nuevo usuario</span>
                            </a>
                        </li>
                    <?php } ?>
                   
                        <li>
                            <a href="<?= base_url('/tables/listaUsuarios') ?>">
                                <i class="bi bi-circle"></i><span>Listado/modificar usuario</span>
                            </a>
                        </li>
                    
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href='<?php echo base_url('perfil') ?>'>
                            <i class="bi bi-circle"></i>
                            <span>Mi Perfil</span>
                        </a>
                    </li>

                </ul>

            </li><!-- End Charts Nav -->
            <?php   } ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Denuncias</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <?php if ($_SESSION['tipo_rol'] == "Administrador") { ?>
                        <li>
                            <a href="<?= base_url('/seleccionarUsuarioDenuncia') ?>">
                                <i class="bi bi-circle"></i><span>Administrar denuncias</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('/listadoDenuncias') ?>">
                                <i class="bi bi-circle"></i><span>Lista de denuncias de usuarios</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('/selecccionarDenunciarDocumentacion/') ?><?php echo $_SESSION['id'] ?>">
                            <i class="bi bi-circle"></i><span>Denunciar documentacion</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/misDenuncias/') ?><?php echo $_SESSION['id'] ?>">
                            <i class="bi bi-circle"></i><span>Mis denuncias</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-heading"></li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Entidades</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <?php if ($_SESSION['tipo_rol'] == "Administrador") { ?>
                        <li>
                            <a href=<?= base_url('/nuevaEntidad') ?>>
                                <i class="bi bi-circle"></i><span>Nueva Entidad</span>
                            </a>
                        </li>
                        <li>
                            <a href=<?= base_url('/listaEntidades') ?>>
                                <i class="bi bi-circle"></i><span>Listado de Entidades</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href=<?= base_url('/listarTiposDeDocumentacion') ?>>
                            <i class="bi bi-circle"></i><span>Informacion sobre pasos de recuperacion</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>

    </aside><!-- End Sidebar-->

    <?= $this->renderSection('content') ?>

    <footer id="footer" class="footer">
        <!--
        <div class="copyright">
            <p>&copy; 2023 Perdí Mi Billetera</p>
        </div>
        <div class="credits">
        </div>
          -->
        <script src="<?= base_url('/assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/chart.js/chart.umd.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/echarts/echarts.min.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/quill/quill.min.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/tinymce/tinymce.min.js') ?>"></script>
        <script src="<?= base_url('/assets/vendor/php-email-form/validate.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <!-- Template Main JS File -->
        <script src="<?= base_url('/assets/js/main.js') ?>"></script>
        <script src="<?= base_url('/assets/js/perfil.js') ?>"></script>
        <script src="<?= base_url('/assets/js/documentacion.js') ?>"></script>

        <script src="<?= base_url('/assets/js/entities_list.js') ?>"></script>
        <script src="<?= base_url('/assets/js/cancelarDenuncia.js') ?>"></script>
        
        <?php
        if (isset($_GET)) {
            if (isset($_GET['menu'])) {
                echo "<script>
      $(document).ready(function() {
          $('#editarPerfil').click();
      });
      </script>";
            }
        }
        ?>
    </footer><!-- End Footer -->

</body>

</html>