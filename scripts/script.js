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

//Inicio sesion script
document.querySelector("#form-sesion").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(response => {
        const messageDiv = document.getElementById("message");
        messageDiv.style.display = "block";

        messageDiv.classList.remove("alert-success", "alert-danger");

        if (response === "ok") {
            messageDiv.classList.add("alert-success");
            messageDiv.innerHTML = "¡Inicio de sesión exitoso! Felices compras.";
            setTimeout(function() {
                window.location.href = "Cuenta.html";
            }, 2000);
        } else if (response === "error_contraseña") {
            messageDiv.classList.add("alert-danger");
            messageDiv.innerHTML = "Contraseña incorrecta. Por favor, intenta nuevamente.";
        } else if (response === "error_usuario") {
            messageDiv.classList.add("alert-danger");
            messageDiv.innerHTML = "Correo electrónico no válido.";
        } else {
            messageDiv.classList.add("alert-danger");
            messageDiv.innerHTML = "Ocurrió un error inesperado.";
        }
    })
    .catch(error => {
        console.error("Error:", error);
        document.getElementById("message").innerHTML = "Hubo un problema con la conexión. Intenta de nuevo.";
        document.getElementById("message").classList.add("alert-danger");
        document.getElementById("message").style.display = "block";
    });
});
