(function () {

  window.addEventListener('load', function () {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);

  window.addEventListener("scroll", (e) => {
    if (window.scrollY > 90) {
      $('.navbar').css('opacity', '0.6');
    } else {
      $('.navbar').css('opacity', '1');
    }
  }, false);
document.addEventListener("DOMContentLoaded", (e) => {
  const inputs = document.querySelectorAll('input[type=color]');
  const colorArr = [];
  function handleUpdate() {
    document.documentElement.style.setProperty(`--${this.name}`, this.value);
    colorArr.push(this.value);
    const colorDescription = document.querySelector('textarea[name=colorDescription]');
    colorDescription.value = "wybrane kolory:" + colorArr[0] + ", " + colorArr[1];
  }

  inputs.forEach(input => input.addEventListener('change', handleUpdate));

});

})();

