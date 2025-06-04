<?php
session_start();
include_once "includes/header.php";
include "../conexion.php";
$query1 = mysqli_query($conexion, "SELECT COUNT(id) AS total FROM salas WHERE estado = 1");
$totalSalas = mysqli_fetch_assoc($query1);
$query2 = mysqli_query($conexion, "SELECT COUNT(id) AS total FROM platos WHERE estado = 1");
$totalPlatos = mysqli_fetch_assoc($query2);
$query3 = mysqli_query($conexion, "SELECT COUNT(id) AS total FROM usuarios WHERE estado = 1");
$totalUsuarios = mysqli_fetch_assoc($query3);
$query4 = mysqli_query($conexion, "SELECT COUNT(id) AS total FROM pedidos WHERE estado = 1");
$totalPedidos = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($conexion, "SELECT SUM(total) AS total FROM pedidos");
$totalVentas = mysqli_fetch_assoc($query5);
?>
<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #1cc88a;
        --accent-color: #36b9cc;
        --warning-color: #f6c23e;
        --danger-color: #e74a3b;
        --dark-color: #5a5c69;
        --light-color: #f8f9fc;
    }
    
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(135deg, var(--primary-color), #224abe);
        color: white;
        font-weight: 600;
        font-size: 1.5rem;
        padding: 1.25rem;
        font-family: 'Poppins', sans-serif;
        border-bottom: none;
    }
    
    .small-box {
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .small-box .inner {
        padding: 20px;
    }
    
    .small-box h3 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 10px 0;
        font-family: 'Poppins', sans-serif;
    }
    
    .small-box p {
        font-size: 1.2rem;
        font-family: 'Poppins', sans-serif;
    }
    
    .small-box .icon {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 70px;
        opacity: 0.2;
        transition: all 0.3s ease;
    }
    
    .small-box:hover .icon {
        opacity: 0.3;
        transform: scale(1.1);
    }
    
    .small-box-footer {
        background: rgba(0, 0, 0, 0.1);
        color: white;
        display: block;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        transition: background 0.3s ease;
    }
    
    .small-box-footer:hover {
        background: rgba(0, 0, 0, 0.2);
        color: white;
    }
    
    .bg-info {
        background: linear-gradient(135deg, var(--accent-color), #2c9faf);
    }
    
    .bg-success {
        background: linear-gradient(135deg, var(--secondary-color), #17a673);
    }
    
    .bg-warning {
        background: linear-gradient(135deg, var(--warning-color), #dda20a);
    }
    
    .bg-danger {
        background: linear-gradient(135deg, var(--danger-color), #be2617);
    }
    
    .card-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: var(--dark-color);
    }
    
    .text-bold {
        font-weight: 700;
    }
    
    .text-lg {
        font-size: 1.5rem;
    }
</style>

<div class="card">
    <div class="card-header text-center">
        Panel de Control
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $totalPlatos['total']; ?></h3>

                        <p>Platos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <a href="platos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $totalSalas['total']; ?></h3>

                        <p>Salas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <a href="salas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $totalUsuarios['total']; ?></h3>

                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="usuarios.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $totalPedidos['total']; ?></h3>

                        <p>Pedidos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="lista_ventas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Ventas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">$<?php echo $totalVentas['total']; ?></span>
                                <span>Total de Ventas</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>

<script src="../assets/js/dashboard.js"></script>