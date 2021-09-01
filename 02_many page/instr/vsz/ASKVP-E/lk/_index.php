<?php
$title = 'Інструкції';
$article = 'Логічний контроль';
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
          <a href="_index.php">/Логічний контроль</a>
        </span>
      </h4>
      <li class="list-group-item new">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/Logkontrol_SGR.htm">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Відключення логічного контролю на сервері СВР-Є</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/Log_kontrol_s02.htm">
          <div class="mainli">
            <b class="num">2</b>
            <span>Логічний контроль натурного листа поїзда</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/lk_4770_1109.htm">
          <div class="mainli">
            <b class="num">3</b>
            <span>Логічний контроль ППВ на заборону приймання вагонів з кодом власника на 85 прідпрємств "Крымская
              железная дорога"</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/lk_4770_966.htm">
          <div class="mainli">
            <b class="num">4</b>
            <span>Логічний контроль ППВ на заборону приймання вагонів, відремонтованих вагонним депо Джанкой</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/Ins_4770_konv_zaborona.htm">
          <div class="mainli">
            <b class="num">5</b>
            <span>Логічний контроль ППВ на заборону приймання вагонів власності компаній, що підпадають під санкції за
              Указом Президента України від 16.09.2015 № 549/215</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/INST_NEPR.htm">
          <div class="mainli">
            <b class="num">6</b>
            <span>Логічний контроль на заборону включення до складу поїздів неприйнятих та затриманих вагонів</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/Ins_4770_konv_zaborona2.htm">
          <div class="mainli">
            <b class="num">7</b>
            <span>Логічний контроль ППВ на заборону приймання вагонів,які підпадають під санкції за Указом Президента
              України від 27.10.2016 №-Ц2-1/1146</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/kon_zaborona.htm">
          <div class="mainli">
            <b class="num">8</b>
            <span>Логічний контроль ППВ на заборону приймання вагонів,які підпадають під санкції за Указом Президента
              України від 18.05.2017 №Ц-1-29/249-17</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/ZABORONA_RGD.htm">
          <div class="mainli">
            <b class="num">9</b>
            <span>Логічний контроль ППВ на заборону приймання вагонів, які заборонені до прийому на РЖД</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/lk_pereadresuvannya.htm">
          <div class="mainli">
            <b class="num">10</b>
            <span>Логічний контроль поїзних повідомлень на наявність у поїзді вагонів, на які видано накази на
              переадресування по станції</span>
          </div>
        </a>
      </li>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/ASKVP-E/lk/Logkontrol_gruz_P.htm">
          <div class="mainli">
            <b class="num">11</b>
            <span>Логічний контроль щодо порядку присвоєння нумерації вантажним поїздам</span>
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