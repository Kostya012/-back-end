<?php
$title = 'Інструкції';
$article = 'Інструкційні матеріали по роботі з АС регіональної філії "ДОНЕЦЬКА ЗАЛІЗНИЦЯ"';
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
          <a href="_index.php">/Інструкційні матеріали з АС "ДОНЕЦЬКА ЗАЛІЗНИЦЯ"</a>
        </span>
      </h4>
      <li class="list-group-item">
        <a href="http://iocv.pv.ukr.zal/instr/vsz/askvp-e/mess_out/222_212_08_01.htm">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Нові стикові пункти регіональної філії «Донецька залізниця».</span>
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