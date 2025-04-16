<?php
session_start();
include 'conexion.php';

// Asegurar que solo admin tenga acceso
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.html");
    exit();
}

// Eliminar usuario si se solicitó
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $idEliminar);
    $stmt->execute();
    header("Location: admin_usuarios.php");
    exit();
}

// Obtener lista de usuarios
$usuarios = $conexion->query("SELECT id, nombre, email, telefono, tipo_usuario FROM usuarios ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Administración de Usuarios</h2>
        <a href="admin.php" class="btn btn-outline-secondary">⬅ Volver al panel</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = $usuarios->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['tipo_usuario']); ?></td>
                    <td>
                        <a href="?eliminar=<?php echo $usuario['id']; ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                           Eliminar
                        </a>
                        <!-- Aquí podrías agregar un botón de Editar -->
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
