<?php
$title = 'ГІОЦ ВП ХК';
$article = 'Інформаційний ресурс відділу ХКВП';
require_once 'pages/head.php';
?>
<link rel="stylesheet" href="css/main.css" />
<?php
require_once 'pages/body-header.php';
?>
<main>
  <div class="container">
    <ol class="list-group">
      <h4>
        <span class="label label-primary">
          <a href="_index.php">/Головна</a>
        </span>
      </h4>
      <li class="list-group-item">
        <a href="_instr.php">
          <div class="mainli">
            <img class="hicon-main" src="img/headers/instruction1.svg" />
            <span>Інструкції з роботи відділу</span>
          </div>
        </a>
      </li>
      <li id="link" class="list-group-item">
        <div id="mainli" class="mainli">
          <img class="hicon-main" src="img/Software-48.png" />
          <span>Інсталяційні пакети браузерів для коректної роботи ЄКІП УЗ (у
            т.ч. АРМ ПРО-Є)</span>
        </div>
        <ul id="list" class="list5">
          <li>
            <a href="instr/vsz/browsers/GoogleChromeStandaloneEnterprise64.msi">
              <img src="img/google_chrome-logo.svg" width="40px" />
              Google Chrome v. 92.0.4515.159 x64
            </a>
          </li>
          <li>
            <a href="instr/vsz/browsers/GoogleChromeStandaloneEnterprise32.msi">
              <img src="img/google_chrome-logo.svg" width="40px" />
              Google Chrome v. 92.0.4515.159 x32
            </a>
          </li>
          <li>
            <a href="instr/vsz/browsers/Firefox Setup 91.0.2.msi">
              <img src="img/firefox_logo.svg" width="40px" />
              Mozilla Firefox 91.0.2 x64
            </a>
          </li>
          <li>
            <a href="instr/vsz/browsers/Firefox Setup 91.0.2 (32).msi">
              <img src="img/firefox_logo.svg" width="40px" />
              Mozilla Firefox 91.0.2 x32
            </a>
          </li>
        </ul>
      </li>
      <li class="list-group-item">
        <a href="_pidg.php">
          <div class="mainli">
            <img class="hicon-main" src="img/docum_edit.svg" />
            <span>Підготовка видачі документів для керівництва залізниці та
              служб</span>
          </div>
        </a>
      </li>
      <!-- <li class="list-group-item">
        <a href="http://10.5.113.146/ctuz/">
          <div class="mainli">
            <img class="hicon-main" src="img/docum_done.svg" />
            <span>Видача документів для керівництва залізниці та служб</span>
          </div>
        </a>
      </li> -->
    </ol>
  </div>
  <?php
  require_once 'pages/aside.php';
  ?>
</main>
<?php
require_once 'pages/footer.php';
?>
<script>
  let index = document.getElementById('index');
  index.classList.add('active');
</script>
<script src="js/main.js"></script>
</body>

</html>