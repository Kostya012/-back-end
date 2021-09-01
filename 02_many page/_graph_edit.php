<?php
$title = 'Графік роботи';
$article = 'Графік роботи працівників відділу ХКВП';
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
          <a href="_graph.php">/Графік роботи</a>
        </span>
      </h4>
      <li id="link1" class="list-group-item">
        <a href="_graph1.php">
          <div id="mainli" class="mainli">
            <b class="num">1</b>
            <span>Графік змінного режима роботи працівників</span>
          </div>
        </a>
      </li>
      <li id="link2" class="list-group-item">
        <a href="_graph2.php">
          <div id="mainli" class="mainli">
            <b class="num">2</b>
            <span>Графік щоденного режима роботи працівників</span>
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
let graph = document.getElementById('graph');
graph.classList.add('active');
</script>
<!-- <script src="js/graph.js"></script> -->
</body>

</html>