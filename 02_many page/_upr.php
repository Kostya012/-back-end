<?php
session_start();

$auth = isset($_SESSION["auth"]);

if (!$auth) {
  echo "Error 404 Сторінка не знайдена!";
  echo "<a href=_index.php> Повернутися на головну</a>";
  exit();
}

$title = 'Управління ПЗ';
$article = 'Управління ПЗ';
require_once 'pages/head.php';

?>
<link rel="stylesheet" href="css/upr.css" />
<link rel="stylesheet" href="css/loader.css" />
<?php
require_once 'pages/body-header.php';
?>
<main>
  <div class="container">
    <div class="list-group">
      <h4>
        <span class="label label-primary">
          <a href="_index.php">/Головна</a>
          <a href="_upr.php">/Управління ПЗ</a>
        </span>
      </h4>
    </div>
    <div class="search-table">
      <div id="searcharea">
        <input type="search" name="search" id="search" placeholder="№ кабінету" />
        <ul id="ulmain">
          <li id="li1" class="list-group-item"></li>
          <li id="li2" class="list-group-item"></li>
        </ul>
      </div>
      <div id="result"></div>
    </div>
    <div id="info">
      <div id="map">
        <div id="numRoom" class="blink"></div>
      </div>
    </div>
  </div>
  <?php
  require_once 'pages/aside.php';
  ?>
</main>
<?php
require_once 'pages/footer.php';
?>
<script>
  let upr = document.getElementById('upr');
  upr.classList.add('active');
</script>
<script src="js/upr.js"></script>
</body>

</html>