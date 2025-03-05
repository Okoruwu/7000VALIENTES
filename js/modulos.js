const materias = {
    domingos: [
        { nombre: "Materia 1", profesor: "Juan Pérez", horario: "10:00 - 11:00 AM" },
        { nombre: "Materia 2", profesor: "Ana López", horario: "11:00 - 12:00 PM" },
        { nombre: "Materia 3", profesor: "Carlos Ruiz", horario: "12:00 - 1:00 PM" },
        { nombre: "Materia 4", profesor: "María Gómez", horario: "2:00 - 3:00 PM" },
        { nombre: "Materia 5", profesor: "Pedro Sánchez", horario: "3:00 - 4:00 PM" },
        { nombre: "Materia 6", profesor: "Sofía Fernández", horario: "4:00 - 5:00 PM" }
    ],
    miercoles: [
        { nombre: "Materia A", profesor: "Luis Torres", horario: "8:00 - 9:00 AM" },
        { nombre: "Materia B", profesor: "Carla Díaz", horario: "9:00 - 10:00 AM" },
        { nombre: "Materia C", profesor: "Miguel Gómez", horario: "10:00 - 11:00 AM" },
        { nombre: "Materia D", profesor: "Elena Ramos", horario: "11:00 - 12:00 PM" },
        { nombre: "Materia E", profesor: "Daniel Herrera", horario: "12:00 - 1:00 PM" },
        { nombre: "Materia F", profesor: "Patricia Núñez", horario: "1:00 - 2:00 PM" }
    ]
};

const btnDom = document.getElementById("btn-dom");
const btnMir = document.getElementById("btn-mir");
const cards = document.querySelectorAll(".card");

function actualizarMaterias(dia) {
    const datos = materias[dia];

    cards.forEach((card, index) => {
        card.classList.add("flip"); 
        
        setTimeout(() => {
            card.querySelector("h3").textContent = datos[index].nombre;
            card.querySelector(".profesor").textContent = `Maestro: ${datos[index].profesor}`;
            card.querySelector(".horario").textContent = `Horario: ${datos[index].horario}`;
            card.classList.remove("flip"); 
        }, 300);
    });

    btnDom.classList.toggle("active", dia === "domingos");
    btnMir.classList.toggle("active", dia === "miercoles");
}

btnDom.addEventListener("click", () => actualizarMaterias("domingos"));
btnMir.addEventListener("click", () => actualizarMaterias("miercoles"));

actualizarMaterias("domingos");
