const btnDom = document.getElementById("btn-dom");
const btnMir = document.getElementById("btn-mir");
const cards = document.querySelectorAll(".card");
let materias = {};


function actualizarMaterias(dia) {
    const datos = materias[dia] || [];
    
    cards.forEach((card, index) => {
        card.classList.add("flip");
        
        setTimeout(() => {
            const item = datos[index] || { 
                materia: "Sin información", 
                maestro: "Sin información", 
                hora: ""
            };
            
            card.querySelector(".materia").textContent = item.materia;
            card.querySelector(".profesor").textContent = `Maestro: ${item.maestro}`;
            card.querySelector(".horario").textContent = `Horario: ${item.hora}`;
            card.classList.remove("flip");
        }, 300);
    });


    btnDom.classList.toggle("active", dia === "domingos");
    btnMir.classList.toggle("active", dia === "miercoles");
}

btnDom.addEventListener("click", () => actualizarMaterias("domingos"));
btnMir.addEventListener("click", () => actualizarMaterias("miercoles"));

// Iniciar carga
document.addEventListener("DOMContentLoaded", cargarDatos);
