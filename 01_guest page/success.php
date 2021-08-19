<?php
session_start();

$title = 'Guest page';
$article = 'Guest page';
require_once 'parth/head.php';
?>
<link rel="stylesheet" href="css/main.css" />
<?php
require_once 'parth/body-header.php';
?>
<main>
  <div class="container">
    <?php
    if ($_GET["send"] == 1) {
      echo "<div>You sent a message</div>";
    }
    ?>
  </div>
</main>
<?php
require_once 'parth/footer.php';
?>
<script>
let index = document.getElementById('index');
index.classList.add('active');
</script>
<!-- <script src="js/admin.js"></script> -->
</body>

</html>