const fecha = new Date();

const meses = [
    "de enero", "de febrero", "de marzo", "de abril", "de mayo", "de junio", 
    "de julio", "de agosto", "de septiembre", "de octubre", "de noviembre", "de diciembre"
];
const mesActual = meses[fecha.getMonth()];


document.getElementById("titulo").textContent = mesActual;
