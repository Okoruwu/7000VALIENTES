   
   function showSection(section) {
   
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(function (sec) {
        sec.style.display = 'none';
    });

    
    const activeSection = document.getElementById(section);
    activeSection.style.display = 'block';
}

window.onload = function () {
    showSection('home'); 
}

