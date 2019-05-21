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

  window.addEventListener("scroll", function () {
    if (window.scrollY > 90) {
      $('.navbar').css('opacity', '0.6');
    } else {
      $('.navbar').css('opacity', '1');
    }
  }, false);

})();