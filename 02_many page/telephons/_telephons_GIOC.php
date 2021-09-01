<?php
$title = 'Телефони УЗ';
$article = 'Телефони ГІОЦ';
require_once '../pages/head.php';
?>
<link rel="stylesheet" href="../css/main_two.css" />
<link rel="stylesheet" href="../css/loader.css" />
<?php
require_once '../pages/body-header.php';
?>
<main>
  <div class="container">
    <div class="list-group">
      <h4>
        <span class="label">
          <a href="../_index.php">/Головна</a>
          <a href="../_telephons.php">/Телефони</a>
          <a id="currentPage" href="_telephons_GIOC.php">/Телефони ГІОЦ</a>
        </span>
      </h4>
    </div>
    <div class="container2">
      <div class="cont-left">
        <ol class="list-group">
          <li id="link1" class="list-group-item">
            <div class="mainli">
              <b class="num">1</b>
              <span>Укрзалізниця</span>
            </div>
          </li>
          <li id="link2" class="list-group-item">
            <div class="mainli">
              <b class="num">2</b>
              <span>Регіональна філія "Південна залізниця"</span>
            </div>
          </li>
          <li id="link3" class="list-group-item">
            <div class="mainli">
              <b class="num">3</b>
              <span>Головний інформаційно-обчислювальний центр (ГІОЦ)</span>
            </div>
          </li>
          <li id="link4" class="list-group-item">
            <div class="mainli">
              <b class="num">4</b>
              <span>ГІОЦ ВП ХК</span>
            </div>
          </li>
        </ol>
      </div>
      <div id="content" class="content">
        <div id="loader">
          <div class="loader">Loading...</div>
        </div>
        <div id="content2"></div>
      </div>
    </div>
  </div>
  <?php
  require_once '../pages/aside.php';
  ?>
</main>

<?php
require_once '../pages/footer.php';
?>
<script src="../js/telephones.js"></script>
<script>
let telephons = document.getElementById('telephons');
telephons.classList.add('active');
// let link1 = document.getElementById('link1');
link3.classList.add('active-li');

getOtherPage(url3);
</script>

</body>

</html>