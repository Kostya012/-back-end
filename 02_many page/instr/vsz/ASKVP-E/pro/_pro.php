<?php
$title = 'ЄКІП УЗ';
$article = 'ЄКІП УЗ';
require_once '../../../../pages/head.php';
?>
<link rel="stylesheet" href="../../../../css/main.css" />
<?php
require_once '../../../../pages/body-header.php';
?>
<main>
  <div class="container">
    <ol class="list-group">
      <h4>
        <span class="label">
          <a href="../../../../_index.php">/Головна</a>
          <a href="../../../../_instr.php">/Інструкції</a>
          <a href="_pro.php">/ЄКІП УЗ</a>
        </span>
      </h4>
      <li id="link1" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/pro/ekip-setup-3-4.exe">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Скріпт "ekip-setup.exe"</span>
          </div>
        </a>
      </li>
      <li id="link2" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/pro/UZ Root CA.crt">
          <div class="mainli">
            <b class="num">2</b>
            <span>Сертифікат</span>
          </div>
        </a>
      </li>
      <li id="link3" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/pro/NTLM.7z">
          <div class="mainli">
            <b class="num">3</b>
            <span>Налаштування Windows XP</span>
          </div>
        </a>
      </li>
    </ol>
  </div>
  <?php
  require_once '../../../../pages/aside.php';
  ?>
</main>
<?php
require_once '../../../../pages/footer.php';
?>
<script>
let instr = document.getElementById('instr');
instr.classList.add('active');
</script>
<!-- <script src="js/instr.js"></script> -->
</body>

</html>