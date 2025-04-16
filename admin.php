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
<body class="container mt-5">

    <div class="text-end">
        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <h1 class="text-center mb-4">Bienvenido, <?php echo htmlspecialchars($nombre); ?></h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <a href="admin_usuarios.php" class="btn btn-outline-dark w-100">Administrar Usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <a href="admin_productos.php" class="btn btn-outline-dark w-100">Administrar Productos</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
