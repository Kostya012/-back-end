<?php
$title = 'АРМ';
$article = 'Автоматизоване робоче місце';
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
        <span class="label">
          <a href="_index.php">/Головна</a>
          <a href="_arm.php">/АРМ</a>
        </span>
      </h4>
      <li id="link1" class="list-group-item">
        <a href="_arm1.php">
          <div class="mainli">
            <b class="num">1</b>
            <span>Перелік АРМ</span>
          </div>
        </a>
      </li>
      <li id="link2" class="list-group-item">
        <a href="_arm2.php">
          <div class="mainli">
            <b class="num">2</b>
            <span>Додаток</span>
          </div>
        </a>
      </li>
      <li id="link3" class="list-group-item new">
        <a href="doc/Краткая инструкция настройки АРМ.doc">
          <div class="mainli">
            <!-- <b class="num">3</b> -->
            <div class="hicon-word hicon-main"></div>
            <span>Інструкція по встановленню АРМ ТЧД, ТЧД на базі СВВМ</span>
          </div>
        </a>
      </li>
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
  let arm = document.getElementById('arm');
  arm.classList.add('active');
</script>
<!-- <script src="js/graph.js"></script> -->
</body>

</html>