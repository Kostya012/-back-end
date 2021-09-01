<?php
$title = 'Інструкції';
$article = 'Інструкції до довідок власної розробки ГІОЦ ВП ХК (ІОЦ ПЗ)';
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
          <a href="_index.php">/Інструкції до довідок ГІОЦ ВП ХК (ІОЦ ПЗ)</a>
        </span>
      </h4>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/Vlasni/zalyshki_2106.htm">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Інструкція по формуванню комплексу довідок «Залишки вагонiв, якi не вивантаженi»</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/Vlasni/RABOTA_STANSII.htm">
          <div class="mainli">
            <b class="num">2</b>
            <span>Інструкція по формуванню довідки «Робота станції з вагонами»</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/Vlasni/Instr_1604.htm">
          <div class="mainli">
            <b class="num">3</b>
            <span>Інструкція по формуванню довідки 1604 «Виконання середньої ваги та середнього складу поїзда по
              станції»</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/Vlasni/UGOL.htm">
          <div class="mainli">
            <b class="num">4</b>
            <span>Інструкція по формуванню довідки «Довідка про вивантаження енергетичного вугілля за добу»</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/Vlasni/instruction%20ARM%20roz_vag.htm">
          <div class="mainli">
            <b class="num">5</b>
            <span>Інструкція до АРМ «Облік надходження на залізницю розобладнаних вагонів» <span
                class="spanRed">+Презентація АРМу</span></span>
          </div>
        </a>
      </li>
    </ol>
    <ol class="list-group marginTop">
      <li class="list-group-item">
        <h4 class="new">
          <span class="label-primary">Запити Міністерства юстиції України:</span>
        </h4>
      </li>
      <!-- <li class="other new"></li> -->
      <li class="list-group-item">
        <a href="http://acum.pv.ukr.zal/formpoisk.php">
          <div class="mainli">
            <b class="num">1</b>
            <span>Довідка про кількість власних вагонів</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://10.1.100.16/pls/kart/gruz.SOB.main">
          <div class="mainli">
            <b class="num">2</b>
            <span>Власники вантажних вагонів</span>
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