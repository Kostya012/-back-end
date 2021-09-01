<?php
$title = 'Інструкції';
$article = 'Довідкова служба ДІСКОР';
require_once '../../../pages/head.php';
?>
<link rel="stylesheet" href="../../../css/main.css" />
<?php
require_once '../../../pages/body-header.php';
?>
<main>
  <div class="container">
    <ol class="list-group">
      <h4>
        <span class="label">
          <a href="../../../_index.php">/Головна</a>
          <a href="../../../_instr.php">/Інструкції</a>
          <a href="_sisdis.php">/Довідкова служба ДІСКОР</a>
        </span>
      </h4>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/СТРПЛАН.htm#KOD">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>СТРУКТУРА ПЛАНОВИХ ПОВІДОМЛЕНЬ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/СТРДИСКОР.htm#KOD">
          <div class="mainli">
            <b class="num">2</b>
            <span>СТРУКТУРА ОПЕРАТИВНИХ ПОВІДОМЛЕНЬ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/STAN.htm">
          <div class="mainli">
            <b class="num">3</b>
            <span>КАТАЛОГ ПЕРЕЛІКУ СТАНЦІЙ ЗА ПОВІДОМЛЕННЯМИ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/КОДГРУЗ.htm">
          <div class="mainli">
            <b class="num">4</b>
            <span>НОМЕНКЛАТУРА ВАНТАЖІВ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/телеграммы.htm">
          <div class="mainli">
            <b class="num">5</b>
            <span>ТЕЛЕГРАМИ ДІСКОР УКРАЇНИ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/dr/zad_dr.htm">
          <div class="mainli">
            <b class="num">6</b>
            <span>ДІСКОР-ПЕОМ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/ZAPROS.htm">
          <div class="mainli">
            <b class="num">7</b>
            <span>ЗАПИТИ ІНФОРМАЦІЇ</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/NEWDIS.htm#NEW">
          <div class="mainli">
            <b class="num">8</b>
            <span>НОВИНИ В СИСТЕМІ ДІСКОР</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/esz/SISDIS/Instrukcii.htm">
          <div class="mainli">
            <b class="num">9</b>
            <span>ІНСТРУКЦІЇ</span>
          </div>
        </a>
      </li>
    </ol>
  </div>
  <?php
  require_once '../../../pages/aside.php';
  ?>
</main>
<?php
require_once '../../../pages/footer.php';
?>
<script>
let instr = document.getElementById('instr');
instr.classList.add('active');
</script>
<!-- <script src="js/instr.js"></script> -->
</body>

</html>