<?php include_once "admin_menu.php" ?>
<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: cuenta.php");
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

<head>
    <title>Administrar Usuarios</title>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
            <a href="admin.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
            <h2 class="fw-bold display-6 text-dark mx-auto">Administración de Usuarios</h2>
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
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.html" class="text-white">Política de Privacidad</a> | <a href="Terminos.html" class="text-white">Términos y
            Condiciones</a></p>
        </div>
    </footer>
</body>
</html>
