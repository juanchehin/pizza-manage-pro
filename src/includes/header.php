<?php
if (empty($_SESSION['active'])) {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Restaurante</title>

    <!-- Google Font: Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Estilos personalizados -->
    <style>
        :root {
            --primary-color: #e63946;
            --secondary-color: #457b9d;
            --accent-color: #a8dadc;
            --light-color: #f1faee;
            --dark-color: #1d3557;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .main-header {
            background: linear-gradient(135deg, var(--dark-color), var(--secondary-color));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-light .navbar-nav .nav-link {
            color: var(--light-color);
        }
        
        .main-sidebar {
            background-color: var(--dark-color);
        }
        
        .brand-link {
            background-color: rgba(255,255,255,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .brand-text {
            font-weight: 600;
            color: var(--light-color);
        }
        
        .user-panel {
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .nav-sidebar .nav-item > .nav-link {
            color: #c2c7d0;
            margin-bottom: 2px;
        }
        
        .nav-sidebar .nav-item > .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        
        .nav-sidebar .nav-item > .nav-link.active {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }
        
        .nav-sidebar .nav-treeview .nav-link {
            padding-left: 50px;
        }
        
        .content-wrapper {
            background-color: #f8f9fa;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #c1121f;
            border-color: #c1121f;
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .table {
            border-radius: 5px;
            overflow: hidden;
        }
        
        .table thead {
            background-color: var(--dark-color);
            color: white;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Barra de navegación -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Enlaces izquierda -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Enlaces derecha -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Barra lateral principal -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="../assets/img/logo.png" alt="Logo Restaurante" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">RestoBar</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Panel de usuario -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fas fa-user-circle fa-2x text-light"></i>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-white"><?php echo $_SESSION['nombre']; ?></a>
                    </div>
                </div>

                <!-- Menú lateral -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Panel Principal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {
                                    echo '<li class="nav-item">
                                        <a href="index.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nueva Venta</p>
                                        </a>
                                    </li>';
                                } if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
                                    echo '<li class="nav-item">
                                        <a href="lista_ventas.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Historial de Ventas</p>
                                        </a>
                                    </li>';
                                } ?>
                            </ul>
                        </li>

                        <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
                            echo '<li class="nav-item">
                                <a href="platos.php" class="nav-link">
                                    <i class="nav-icon fas fa-utensils"></i>
                                    <p>
                                        Menú
                                    </p>
                                </a>
                            </li>';
                        } if ($_SESSION['rol'] == 1) {
                            echo '<li class="nav-item">
                                <a href="salas.php" class="nav-link">
                                    <i class="nav-icon fas fa-door-open"></i>
                                    <p>
                                        Áreas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Administración
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="usuarios.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Usuarios</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="config.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Configuración</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>';
                        } ?>

                        <li class="nav-item">
                            <a href="salir.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Cerrar Sesión
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Contenedor de contenido -->
        <div class="content-wrapper" style="background-color: #f8f9fa;">

            <!-- Contenido principal -->
            <div class="content">
                <div class="container-fluid py-2">