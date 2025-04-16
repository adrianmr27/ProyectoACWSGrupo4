document.querySelectorAll(".service-link").forEach(item => {
    item.addEventListener("click", function(event) {
        event.preventDefault(); // Evita redirecciones

        let title = this.getAttribute("data-title");
        let description = this.getAttribute("data-description");

        document.getElementById("modalTitle").innerText = title;
        document.getElementById("modalContent").innerText = description;

        let modal = new bootstrap.Modal(document.getElementById("infoModal"));
        modal.show();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let myCarousel = new bootstrap.Carousel(document.querySelector("#carouselExampleFade"), {
        interval: 3000, // Cambia cada 3 segundos
        ride: "carousel"
    });
});
function agregarAlCarrito(nombre, precio) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    // Verificar si el producto ya está en el carrito
    const index = carrito.findIndex(producto => producto.nombre === nombre);

    if (index !== -1) {
        // Si ya existe, aumentar la cantidad
        carrito[index].cantidad += 1;
    } else {
        // Si no existe, agregarlo con cantidad 1
        carrito.push({ nombre, precio, cantidad: 1 });
    }

    localStorage.setItem('carrito', JSON.stringify(carrito));
    alert(nombre + ' fue agregado al carrito.');
}


