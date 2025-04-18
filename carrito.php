<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Tu Carrito</h1>
        <div id="carrito-contenido" class="mt-4"></div>
        <a href="CatalogoProductos.php" class="btn btn-secondary mt-3">Seguir comprando</a>
    </div>

    <script>
        function mostrarCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const contenedor = document.getElementById('carrito-contenido');

            if (carrito.length === 0) {
                contenedor.innerHTML = '<p>Tu carrito está vacío.</p>';
                return;
            }

            let html = '<ul class="list-group">';
            let total = 0;

            carrito.forEach((producto, index) => {
                html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                ${producto.nombre} x${producto.cantidad} - ₡${(producto.precio * producto.cantidad).toLocaleString()}
                <button class="btn btn-sm btn-danger" onclick="eliminarDelCarrito(${index})">Eliminar</button>
            </li>`;
                total += producto.precio * producto.cantidad;
            });


            html += `</ul><h4 class="mt-3">Total: ₡${total.toLocaleString()}</h4>
                    <button class="btn btn-danger mt-2" onclick="vaciarCarrito()">Vaciar Carrito</button>`;

            contenedor.innerHTML = html;
        }

        function eliminarDelCarrito(index) {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito(); // Recargar la vista
        }

        function vaciarCarrito() {
            localStorage.removeItem('carrito');
            mostrarCarrito();
        }

        window.onload = mostrarCarrito;
    </script>
</body>

</html>