<?php
$title = 'Інструкції';
$article = 'НОРМАТИВНО-ДОВІДКОВА ІНФОРМАЦІЯ АСК ВП УЗ';
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
          <a href="_indnsi.php">/ІНФОРМАЦІЯ АСК ВП УЗ</a>
        </span>
      </h4>
      <li id="link1" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/psvnsi/Sp_psvnsi.htm">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Перелік таблиць ПСВ НДІ АСК ВП УЗ (базова схема PSVNSI)</span>
          </div>
        </a>
      </li>
      <li id="link2" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/psvnsi/Sp_nsi.htm">
          <div class="mainli">
            <b class="num">2</b>
            <span>Перелік таблиць НДІ АСК ВП УЗ (базова схема NSI)</span>
          </div>
        </a>
      </li>
      <li id="link3" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/psvnsi/NewPSVNSI.htm">
          <div class="mainli">
            <b class="num">3</b>
            <span>Інструкція з виконання звірки класифікаторів ПСВ НДІ</span>
          </div>
        </a>
      </li>
      <li id="link4" class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/psvnsi/No_sverka.htm">
          <div class="mainli">
            <b class="num">4</b>
            <span>Не підлягають звіркам ПСВ НДІ</span>
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