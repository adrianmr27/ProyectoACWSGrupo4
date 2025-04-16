<?php // registro.php ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Floristería</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body id="pagina-registro">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="img/favicon.png" alt="Logo" width="40" height="40" class="me-2">
                <span>The Flower Lab</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="servicios.html" id="navbarDropdown">Servicios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="CatalogoProductos.html">Catálogo</a></li>
                            <li><a class="dropdown-item" href="eventos.html">Eventos</a></li>
                            <li><a class="dropdown-item" href="jardines.html">Jardines</a></li>
                            <li><a class="dropdown-item" href="corporativos.html">Corporativos</a></li>
                            <li><a class="dropdown-item" href="interiores.html">Interiores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Nosotros.html">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="ayuda.html">Ayuda</a></li>
                    <li class="nav-item"><a class="nav-link" href="facturacion.html">Facturación</a></li>
                    <li class="nav-item"><a class="nav-link active" href="cuenta.php">Cuenta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container mt-5 position-relative pt-5">
        <a href="cuenta.php" class="btn btn-outline-dark position-absolute top-0 start-0 mt-3 ms-3">&larr; Volver</a>
        <h2 class="text-center mt-5">Regístrate</h2>
        <p class="text-center">Crea una cuenta para realizar compras y acceder a ofertas exclusivas.</p>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="form-registro" action="registrar.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Número de Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Crea una contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirm-password" placeholder="Repite tu contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.html" class="text-white">Política de Privacidad</a> |
               <a href="Terminos.html" class="text-white">Términos y Condiciones</a></p>
        </div>
    </footer>

    <!-- MODAL: Usuario ya existe -->
    <div class="modal fade" id="usuarioExisteModal" tabindex="-1" aria-labelledby="usuarioExisteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="usuarioExisteModalLabel">Este correo ya está registrado</h5>
                </div>
                <div class="modal-body">
                    <p>Ya existe una cuenta asociada a este correo electrónico.</p>
                    <p>¿Tal vez ya estás registrado? Intenta <a href="cuenta.php">iniciar sesión</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y Script para mostrar modal si error -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const params = new URLSearchParams(window.location.search);
            if (params.get("error") === "usuarioExiste") {
                const modal = new bootstrap.Modal(document.getElementById('usuarioExisteModal'));
                modal.show();
            }
        });
    </script>

</body>
</html>
