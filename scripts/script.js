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

