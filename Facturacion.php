<?php include_once "cliente_menu.php" ?>

<head>
    <title>Facturación - Floristería</title>
</head>
<body id="pagina-facturacion">

    <header class="text-center py-5">
        <h1 class="text-center">Facturación</h2>
        <p class="text-center">Aquí puedes gestionar tu facturación y consultar los detalles de tus compras.</p>
    </header>

    <div class>        
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <form>
                    <div class="mb-3">
                        <label for="invoiceNumber" class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" id="invoiceNumber" placeholder="Ingresa el número de factura">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico">
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Consultar Factura</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.html" class="text-white">Política de Privacidad</a> | <a href="Terminos.html" class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
