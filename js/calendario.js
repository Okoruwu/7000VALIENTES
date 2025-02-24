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
            info.innerHTML = `<h3>Información del ${selectedDay}</h3><p>Aquí puedes agregar detalles para este día.</p>`;
        }
    });

    generateCalendar();
});