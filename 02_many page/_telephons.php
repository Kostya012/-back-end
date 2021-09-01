<?php
$title = 'Телефони УЗ';
$article = 'Телефони УЗ';
require_once 'pages/head.php';
?>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/loader.css" />
<?php
require_once 'pages/body-header.php';
?>
<main>
  <div class="container">
    <ol class="list-group">
      <h4>
        <span class="label">
          <a href="_index.php">/Головна</a>
          <a href="_telephons.php">/Телефони</a>
        </span>
      </h4>
      <li id="link1" class="list-group-item">
        <a href="telephons/_telephons_UZ.php">
          <div class="mainli">
            <b class="num">1</b>
            <span>Укрзалізниця</span>
          </div>
        </a>
      </li>
      <li id="link2" class="list-group-item">
        <a href="telephons/_telephons_PZ.php">
          <div class="mainli">
            <b class="num">2</b>
            <span>Регіональна філія "Південна залізниця"</span>
          </div>
        </a>
      </li>
      <li id="link3" class="list-group-item">
        <a href="telephons/_telephons_GIOC.php">
          <div class="mainli">
            <b class="num">3</b>
            <span>Головний інформаційно-обчислювальний центр (ГІОЦ)</span>
          </div>
        </a>
      </li>
      <li id="link4" class="list-group-item">
        <a href="telephons/_telephons_VPHK.php">
          <div class="mainli">
            <b class="num">4</b>
            <span>ГІОЦ ВП ХК</span>
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
let telephons = document.getElementById('telephons');
telephons.classList.add('active');
</script>
<!-- <script src="js/x.js"></script> -->
</body>

</html>