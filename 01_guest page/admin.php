<?php
$title = 'Admin';
$article = 'Administrator information';
require_once 'parth/head.php';
?>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/loader.css" />
<?php
require_once 'parth/body-header.php';
?>
<main>
  <div id="loader">
    <div class="loader">Loading...</div>
  </div>
  <div class="container">
    <div id="info"></div>
  </div>
</main>
<?php
require_once 'parth/footer.php';
?>
<script>
let admin = document.getElementById('admin');
admin.classList.add('active');
</script>
<script src="js/admin.js"></script>
</body>

</html>