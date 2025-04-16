<?php
session_start();

// Redirigir si no es admin
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.html");
    exit();
}

$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center">Bienvenido, <?php echo htmlspecialchars($nombre); ?></h1>
        <div>
            <a href="cuenta.php" class="btn btn-outline-secondary me-2">Vista de cliente</a>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>

    <h2 class="text-center mb-4 text-black">Panel de Administración</h2>

    <div class="row">
        <!-- Usuarios -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Modifica o elimina cuentas de usuarios registradas en el sistema.</p>
                    <a href="admin_usuarios.php" class="btn btn-outline-dark w-100">Administrar Usuarios</a>
                </div>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Agrega, edita o elimina productos del catálogo.</p>
                    <a href="admin_productos.php" class="btn btn-outline-dark w-100">Administrar Productos</a>
                </div>
            </div>
        </div>
</body>
</html>
