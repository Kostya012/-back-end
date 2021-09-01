<?php
$title = 'Дні народження';
$article = 'Дні народження відділу';
require_once 'pages/head.php';
?>
<link rel="stylesheet" href="css/birth.css" />
<?php
require_once 'pages/body-header.php';
?>
<main id="main">
  <?php
  $data = date("d");
  $month = date("m");
  $year = date("Y");
  echo "<div id=\"birth\"data-day-current=\"$data\"data-month-current=\"$month\"data-year-current=\"$year\">";
  ?>
  <div class="container">
    <table id="calendar2">
      <thead>
        <tr class="green">
          <td id="prevCalen">‹‹‹</td>
          <!-- style="visibility: hidden;" -->
          <td colspan="5"></td>
          <td id="nextCalen">›››</td>
          <!-- style="visibility: hidden;" -->
        </tr>
        <tr>
          <td>Пн</td>
          <td>Вт</td>
          <td>Ср</td>
          <td>Чт</td>
          <td>Пт</td>
          <td>Сб</td>
          <td>Нд</td>
        </tr>
      <tbody></tbody>
    </table>
  </div>
  <div class="header-birth" id="headerBirth"></div>
  <div id="wishes">
  </div>
  <?php
  function getCountWishes($name)
  {
    $excel = PHPExcel_IOFactory::load($name);
    $countColumns = 0;
    for ($i = 0; $i <= 150; $i++) {
      if (gettype($excel->getActiveSheet()->getCellByColumnAndRow($i, 1)->getValue()) === "NULL") break;
      $countColumns++;
    }
    $excel->disconnectWorksheets();
    unset($excel);
    return $countColumns;
  };

  function createJSONs($name, $num)
  {
    $excel = PHPExcel_IOFactory::load($name);
    for ($i = 1; $i <= $num; $i++) {
      $mas = array();
      $countRows = 8;
      for ($j = 0; $j < $countRows; $j++) {
        $mas[$j] = $excel->getActiveSheet()->getCellByColumnAndRow($i - 1, $j + 1)->getValue();
      }
      $result = json_encode($mas, JSON_UNESCAPED_UNICODE);
      file_put_contents("json/wishes/$i.json", $result);
    }
    $excel->disconnectWorksheets();
    unset($excel);
  }
  $fileName = 'tables/wishes_hb.xls';
  if (file_exists($fileName)) {
    require_once 'Classes/PHPExcel.php';
    $fN_changes_xls = "statistics/fN_changes_wishes_hb_xls.txt";
    if (file_exists($fN_changes_xls)) {
      $fileLust = file_get_contents($fN_changes_xls);
      $fileCurrent = date("F d Y H:i:s.", filemtime($fileName));
      if ($fileLust === $fileCurrent) {
        unset($fileLust);
        unset($fileCurrent);
      } else {
        $file = fopen($fN_changes_xls, "w+");
        fwrite($file, $fileCurrent);
        fclose($file);
        $file = file_get_contents($fN_changes_xls);
        unset($file);
        unset($fileLust);
        unset($fileCurrent);
        $numWishes = getCountWishes($fileName);
        createJSONs($fileName, $numWishes);
      }
    } else {
      $file = fopen($fN_changes_xls, "a+");
      fwrite($file, date("F d Y H:i:s.", filemtime($fileName)));
      fclose($file);
      $file = file_get_contents($fN_changes_xls);
      unset($file);
      $numWishes = getCountWishes($fileName);
      createJSONs($fileName, $numWishes);
    }
  } else {
    echo "<br>Нажаль файла: $fileName немає. Необхідно завантажити файл.";
  }
  ?>
  </div>
  <?php
  function createJSON($name)
  {
    $excel = PHPExcel_IOFactory::load($name);
    $mas = array(array());
    $countRows = 0;
    for ($i = 1; $i <= 150; $i++) {
      if (gettype($excel->getActiveSheet()->getCellByColumnAndRow(0, $i)->getValue()) === "NULL") break;
      $countRows++;
    }
    $countColumns = 0;
    for ($i = 0; $i <= 150; $i++) {
      if (gettype($excel->getActiveSheet()->getCellByColumnAndRow($i, 1)->getValue()) === "NULL") break;
      $countColumns++;
    }
    for ($i = 1; $i <= $countRows; $i++) {
      for ($j = 0; $j <= $countColumns - 1; $j++) {
        $mas[$i - 1][$j] = $excel->getActiveSheet()->getCellByColumnAndRow($j, $i)->getValue();
      }
    }
    $result = json_encode($mas, JSON_UNESCAPED_UNICODE);
    file_put_contents('json/contacts.json', $result);
    $excel->disconnectWorksheets();
    unset($excel);
  }
  $fileName = 'tables/contacts.xls';
  if (file_exists($fileName)) {
    require_once 'Classes/PHPExcel.php';
    $fN_changes_xls = "statistics/fN_changes_contacts_xls.txt";
    if (file_exists($fN_changes_xls)) {
      $fileLust = file_get_contents($fN_changes_xls);
      $fileCurrent = date("F d Y H:i:s.", filemtime($fileName));
      if ($fileLust === $fileCurrent) {
        unset($fileLust);
        unset($fileCurrent);
      } else {
        $file = fopen($fN_changes_xls, "w+");
        fwrite($file, $fileCurrent);
        fclose($file);
        $file = file_get_contents($fN_changes_xls);
        unset($file);
        unset($fileLust);
        unset($fileCurrent);
        createJSON($fileName);
      }
    } else {
      $file = fopen($fN_changes_xls, "a+");
      fwrite($file, date("F d Y H:i:s.", filemtime($fileName)));
      fclose($file);
      $file = file_get_contents($fN_changes_xls);
      unset($file);
      createJSON($fileName);
    }
  } else {
    echo "<br>Нажаль файла: $fileName немає. Необхідно завантажити файл.";
  }
  ?>
</main>
<?php
require_once 'pages/footer.php';
?>
<script>
let birthday = document.getElementById('birthday');
birthday.classList.add('active');
</script>
<script src="js/birthday.js"></script>
<script src="js/calendar.js"></script>
</body>

</html>