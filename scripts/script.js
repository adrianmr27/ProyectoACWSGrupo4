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
