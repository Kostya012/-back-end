<footer>
  <div class="wrapper">
    <h2>Контактна інформація:</h2>
    <ul>
      <li class="footerli">
        <h3>Адреса:</h3>
        <p>61052, Україна, м. Харків, вул. Євгена Котляра, 15</p>
      </li>
      <li class="footerli">
        <h3>Телефон:</h3>
        <p>(057)724-48-79</p>
      </li>
      <li class="footerli">
        <h3>Факс:</h3>
        <p>(057)724-48-79</p>
      </li>
      <li class="footerli">
        <h3>Розробник:</h3>
        <p>Шевцов К.О.</p>
      </li>
      <!-- <li class="footerli">
        <h3>Email:</h3>
        <img src="../img/footer/email_ivc.png" alt="email" />
      </li> -->
    </ul>
    <a class="back_to_top" title="Наверх"></a>
    <!-- <div class="back_to_top" title="Наверх"></div> -->
  </div>
</footer>
<?php
echo "<script>
'use strict';
/* begin begin Back to Top button  */
(function() {
  function trackScroll() {
    var scrolled = window.pageYOffset;
    var coords = document.documentElement.clientHeight;

    if (scrolled > coords) {
      goTopBtn.classList.add('back_to_top-show');
    }
    if (scrolled < coords) {
      goTopBtn.classList.remove('back_to_top-show');
    }
  }

  function backToTop() {
    if (window.pageYOffset > 0) {
      window.scrollBy(0, -80);
      setTimeout(backToTop, 0);
    }
  }

  var goTopBtn = document.querySelector('.back_to_top');

  window.addEventListener('scroll', trackScroll);
  goTopBtn.addEventListener('click', backToTop);
})();
</script>";
if (!isset($_SESSION["auth"])) {
  echo "<script>
  let logo = document.getElementById('logo');
  logo.addEventListener('dblclick', function () {
    let formOld = document.getElementById('login');
    if (formOld) {
      formOld.remove();
    }
    let body = document.getElementById('body');
    let form = document.createElement('form');
    // form.setAttribute('name', 'quit');
    form.setAttribute('action', '');
    form.setAttribute('accept-charset', 'UTF-8');
    form.setAttribute('method', 'POST');
    form.setAttribute('id', 'login');
    let spanAuth = document.createElement('span');
    spanAuth.setAttribute('class', 'auth');
    spanAuth.innerText = 'Авторизація: Ім\'я-';
    let inputLogin = document.createElement('input');
    inputLogin.setAttribute('type', 'text');
    inputLogin.setAttribute('id', 'login');
    inputLogin.setAttribute('name', 'login');
    let spanPas = document.createElement('span');
    spanPas.setAttribute('class', 'auth');
    spanPas.innerText = ' Пароль-';
    let inputPass = document.createElement('input');
    inputPass.setAttribute('type', 'password');
    inputPass.setAttribute('id', 'pass');
    inputPass.setAttribute('name', 'pass');
    // let spanError = document.createElement('span');
    let btn = document.createElement('input');
    btn.setAttribute('type', 'submit');
    btn.setAttribute('id', 'send');
    btn.setAttribute('name', 'send');
    btn.setAttribute('value', 'Увійти');
  
    body.prepend(form);
    form.append(spanAuth);
    spanAuth.append(inputLogin);
    spanAuth.append(spanPas);
    spanAuth.append(inputPass);
    spanAuth.append(btn);
  });
  </script>";
}
if ($ipCheck) {
  unset($ipName);
}
unset($ipCheck);
unset($ipPasCheck);
unset($cook);
?>