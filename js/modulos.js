const btnDom = document.getElementById("btn-dom");
const btnMir = document.getElementById("btn-mir");
const cards = document.querySelectorAll(".card");

function actualizarMaterias(dia) {
    cards.forEach(card => {
        if (card.id === dia) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });

    btnDom.classList.toggle("active", dia === "domingo");
    btnMir.classList.toggle("active", dia === "miercoles");
}

btnDom.addEventListener("click", () => actualizarMaterias("domingo"));
btnMir.addEventListener("click", () => actualizarMaterias("miercoles"));

// Iniciar carga
document.addEventListener("DOMContentLoaded", () => actualizarMaterias("domingo"));