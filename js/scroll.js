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

function navigateOrScroll(targetClass) {
  if (window.location.pathname.endsWith("index.php")) {
    var elemento = document.querySelector('.' + targetClass);
    if (elemento) {
      elemento.scrollIntoView({ behavior: "smooth" });
    }
  } else {
    window.location.href = "index.php#" + targetClass;
  }
}

window.onload = function () {
  setTimeout(function () {
    var spinner = document.getElementById('loading');
    if (spinner) spinner.style.display = 'none';
    window.scrollTo(0, 0);

    if (window.location.hash) {
      let targetClass = window.location.hash.substring(1);
      let elemento = document.querySelector('.' + targetClass);
      if (elemento) {
        elemento.scrollIntoView({ behavior: "smooth" });
      }
    }
  }, 500);
};
