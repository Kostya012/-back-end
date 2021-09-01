<?php
$title = 'Інструкції';
$article = 'Технологічні карти системи АСК ВП УЗ-Є';
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
          <a href="_index.php">/Технологічні карти системи АСК ВП УЗ-Є</a>
        </span>
      </h4>
      <li id="link1" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/tk/Karta_operatora_2021.htm">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Технологічна карта по розрахункам в системі АСК ВП УЗ-Є з 28.03.2021</span>
          </div>
        </a>
      </li>
      <li id="link2" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/tk/Karta_operatora_UPV_2021.htm">
          <div class="mainli">
            <b class="num">2</b>
            <span>Технологічна карта розрахунку УПВ на системі АСК ВП УЗ-Є з 28.03.2021</span>
          </div>
        </a>
      </li>
      <li id="link3" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/tk/Svodn_texkart.htm">
          <div class="mainli">
            <b class="num">3</b>
            <span>Зведена технологічна карта проведення робіт на ПАК "Залізниця"</span>
          </div>
        </a>
      </li>
      <li id="link4" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/tk/Zapusk_zadach_2021.htm">
          <div class="mainli">
            <b class="num">4</b>
            <span>Послідовність запуску задач в системі АСК ВП УЗ-Є з 28.03.2021</span>
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