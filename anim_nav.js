document.addEventListener("DOMContentLoaded", function () {
    const dropdownMenus = document.querySelectorAll(".dropdown-menu");
  
    dropdownMenus.forEach((menu) => {
      // Evento cuando el dropdown se muestra
      menu.parentElement.addEventListener("shown.bs.dropdown", function () {
        menu.style.display = "block"; // Muestra el menú
        setTimeout(() => {
          menu.classList.add("show"); // Aplica la animación de fade in
        }, 10);
      });
  
      // Evento cuando el dropdown se oculta
      menu.parentElement.addEventListener("hidden.bs.dropdown", function () {
        menu.classList.remove("show"); // Aplica la animación de fade out
        setTimeout(() => {
          menu.style.display = "none"; // Oculta el menú después de la animación
        }, 300);
      });
    });
  });