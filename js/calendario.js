document.addEventListener("DOMContentLoaded", function () {
    const calendar = document.getElementById("calendar");
    const info = document.getElementById("info");

    function generateCalendar() {
        let today = new Date();
        let month = today.getMonth();
        let year = today.getFullYear();
        let daysInMonth = new Date(year, month + 1, 0).getDate();

        let calendarHTML = "<table><tr>";
        for (let day = 1; day <= daysInMonth; day++) {
            calendarHTML += `<td class='day' data-day='${day}'>${day}</td>`;
            if (day % 7 === 0) calendarHTML += "</tr><tr>";
        }
        calendarHTML += "</tr></table>";
        calendar.innerHTML = calendarHTML;
    }

    calendar.addEventListener("click", function (e) {
        if (e.target.classList.contains("day")) {
            let selectedDay = e.target.dataset.day;
            let today = new Date();
            let month = today.getMonth() + 1;
            let year = today.getFullYear();

            let formattedDate = `${year}-${month.toString().padStart(2, "0")}-${selectedDay.padStart(2, "0")}`;

            fetch(`calendario.php?fecha=${formattedDate}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Error en la respuesta del servidor");
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.length > 0) {
                        let evento = data[0];
                        info.innerHTML = `
                            
                            ${evento.imagen_url ? `<img src="${evento.imagen_url}" alt="Imagen del evento" />` : ''}
                        `;
                    } else {
                        info.innerHTML = `<p>No hay eventos para esta fecha.</p>`;
                    }
                })
                .catch(error => console.error("Error al obtener el evento:", error));
        }
    });

    generateCalendar();
});
