function scrollToCardback() {
    var elemento = document.querySelector('.cardback');  
    if (elemento) {
      elemento.scrollIntoView({ behavior: 'smooth' });  
    }
  }

  function scrollToHeroImage() {
    var elemento = document.querySelector('.hero-image');
    if (elemento) {
        elemento.scrollIntoView({ behavior: 'smooth' });
    }
}
  window.onload = function() {
   
    setTimeout(function() {
      
      var spinner = document.getElementById('loading');
      spinner.style.display = 'none';

     
      window.scrollTo(0, 0);
    }, 500);  
  };
