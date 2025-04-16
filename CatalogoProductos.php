<?php include_once "cliente_menu.php" ?>
<?php include 'conexion.php'; ?>
<head>
    <title>Catálogo de Productos - Floristería</title>
</head>
<body>
<!-- Banner -->
<div class="container mt-5">
    <div class="section-header d-flex align-items-center justify-content-center" style="background-image: url('img/Catalogo.png'); padding-top: 56px;">
        <div class="overlay"></div>
        <a href="servicios.html" class="btn btn-light position-absolute top-0 start-0 m-3">&larr; Volver</a>
        <h1 class="text-white display-4 position-relative">Catálogo de Productos</h1>
    </div>

    <?php
    // IDs de las categorías a mostrar
    $categorias = [
        1 => "Plantas Medicinales",
        2 => "Ramos de Flores",
        3 => "Plantas de Interior"
    ];

    foreach ($categorias as $idCategoria => $nombreCategoria):
        $query = $conexion->prepare("
            SELECT p.*
            FROM producto p
            WHERE p.disponibilidad = 1 AND p.id_categoria = ?
        ");
        $query->bind_param("i", $idCategoria);
        $query->execute();
        $resultado = $query->get_result();
    ?>
    <section class="my-5">
        <h3><?= $nombreCategoria ?></h3>
        <div class="row">
            <?php if ($resultado->num_rows > 0): ?>
                <?php while ($producto = $resultado->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="img/<?= htmlspecialchars($producto['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['nombre_producto']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($producto['nombre_producto']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($producto['descripcion']) ?></p>
                                <p class="fw-bold">Precio: ₡<?= number_format($producto['precio'], 0, '', ',') ?></p>
                                <button class="btn btn-success" onclick="agregarAlCarrito('<?= htmlspecialchars($producto['nombre_producto']) ?>', <?= $producto['precio'] ?>)">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-muted">No hay productos disponibles en esta categoría.</p>
            <?php endif; ?>
        </div>
    </section>
    <?php endforeach; ?>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
        <p><a href="Privacidad.html" class="text-white">Política de Privacidad</a> | <a href="Terminos.html" class="text-white">Términos y Condiciones</a></p>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Verifica si el carrito ya existe en localStorage, si no, lo crea
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    
        function agregarAlCarrito(nombre, precio) {
            // Buscar si ya existe el producto
            const productoExistente = carrito.find(p => p.nombre === nombre);
            
            if (productoExistente) {
                productoExistente.cantidad += 1;
            } else {
                carrito.push({ nombre, precio, cantidad: 1 });
            }
    
            // Guarda el carrito actualizado en localStorage
            localStorage.setItem('carrito', JSON.stringify(carrito));
            alert(`${nombre} agregado al carrito.`);
        }
    </script>
    
</body>

</html>