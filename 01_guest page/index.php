<?php
session_start();
function clean($value = "")
{
  $value = trim($value);
  $value = stripslashes($value);
  $value = strip_tags($value);
  $value = htmlspecialchars($value);
  return $value;
}
function cleanMessage($value = "")
{
  $value = stripslashes($value);
  $value = strip_tags($value);
  $value = htmlspecialchars($value);
  return $value;
}
function check_length($value = "", $min = 2, $max = 11)
{
  $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
  return !$result;
}
$ip = $_SERVER["REMOTE_ADDR"];
$browser = $_SERVER['HTTP_USER_AGENT'];
$time = date("d-m-Y H:i:s");

$error_name = "";
$error_email = "";
$error_message = "";
$error_file = "";
$error_checkbox = "";
$_SESSION["name"] = "";
$_SESSION["email"] = "";
$_SESSION["message"] = "";

if (isset($_POST["send"])) {
  $name = clean($_POST["name"]);
  $email = clean($_POST["email"]);
  $captcha = clean($_POST["captcha"]);
  $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
  $message = cleanMessage($_POST["message"]);
  $file = $_POST["file"];
  $checkbox = isset($_POST["checkbox"]);
  $_SESSION["name"] = $name;
  $_SESSION["email"] = $email;
  $_SESSION["message"] = $message;
  $error_name = "";
  $error_email = "";
  $error_message = "";
  $error_file = "";
  $error_checkbox = "";
  $error = false;
  if (!check_length($name, 2, 11)) {
    $error_name = "Please, enter again, you can only use latin letters and numbers, length characters min=2 max=11";
    $error = true;
    unset($_SESSION["num"]);
  }
  if (!ctype_alnum($name)) {
    $error_name = "Please, enter again, you can only use latin letters and numbers";
    $error = true;
    unset($_SESSION["num"]);
  }
  if (!$email_validate) {
    $error_email = "Enter correctly email";
    $error = true;
    unset($_SESSION["num"]);
  }
  if (!check_length($message, 2, 300)) {
    $error_message = "Please, enter again text, you can only use, length characters min=2 max=300";
    $error = true;
    unset($_SESSION["num"]);
  }
  if (!$checkbox) {
    $error_checkbox = "Please, click me: Check me out";
    $error = true;
    unset($_SESSION["num"]);
  } else if (!$captcha == "12578") {
    $error_checkbox = "Sorry, but you entered the code from the picture incorrectly";
    $error = true;
    unset($_SESSION["num"]);
  }
  if (!$error && isset($_SESSION["num"])) {
    $fileName = 'statistic.csv';
    if (!file_exists($fileName)) {
      $list = array(
        array("Name", "Email", "Message", "Time", "Browser", "IP"),
        array($name, $email, $message, $time, $browser, $ip)
      );
      $fp = fopen($fileName, 'w');
      fprintf($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));
      foreach ($list as $fields) {
        fputcsv($fp, $fields, ';');
      }
      fclose($fp);
    } else {
      $list = array($name, $email, $message, $time, $browser, $ip);
      $fp = fopen($fileName, 'a');
      fprintf($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));
      fputcsv($fp, $list, ';');
      fclose($fp);
    }
    $_SESSION = array();
    unset($name);
    unset($email);
    unset($message);
    unset($file);
    unset($checkbox);
    unset($error);
    unset($error_name);
    unset($error_email);
    unset($error_message);
    unset($error_file);
    unset($error_checkbox);
    unset($browser);
    unset($ip);
    unset($time);
    header("Location: success.php?send=1");
    exit;
  } else if (!$error) {
    $_SESSION["num"] = 1;
  }
}
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
    <form name="feedback" action="" method="POST">
      <div class="form-group">
        <label for="name">Your name</label><br>
        <input type="text" name="name" id="name" value="<?= $_SESSION['name'] ?>"><span>(A..z, 0..9, characters
          2-11)</span><br>
        <span class="spanRed"><?= $error_name ?></span>
      </div>
      <div class="form-group">
        <label for="email">Email address</label><br>
        <input type="email" name="email" id="email"
          value="<?= $_SESSION["email"] ?>"><span>(example@example.com)</span><br>
        <span class="spanRed"><?= $error_email ?></span>
      </div>
      <div class="form-group">
        <label for="message">Message</label><br>
        <textarea name="message" id="message" rows="3" cols="45"><?= $_SESSION["message"] ?></textarea><br>
        <span class="spanRed"><?= $error_message ?></span>
      </div>
      <div class="form-group">
        <label for="file">Example file input</label><br>
        <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png, .gif, .txt"
          onchange="checkFile(this)"><span>(320*240: JPEG, GIF, PNG or *.txt)</span><br>
        <span class="spanRed" id="errorFile"><?= $error_file ?></span>
      </div>
      <div class="form-group">
        <span>
          <input type="checkbox" name="checkbox" id="checkbox">
          <label id="checkLabel" class="form-check-label" for="checkbox"> Check me out</label><br>
          <span class="spanRed"><?= $error_checkbox ?></span>
        </span>
        <div id="captch">
          <img src="img/captcha.png" alt="captcha">
          <input type="text" name="captcha" id="captcha" placeholder="Enter the code">
        </div>
      </div>
      <?php
      if (isset($_SESSION["num"])) {
        echo "<input type='submit' name='send' id='send' class='backtotop' value='Send'>";
      } else {
        echo "<input type='submit' name='send' id='send' class='backtotop orange' value='Check'>";
      }
      ?>
    </form>
  </div>
</main>
<?php
require_once 'parth/footer.php';
?>
<script>
let index = document.getElementById('index');
index.classList.add('active');
</script>
<script src="js/main.js"></script>
</body>

</html>