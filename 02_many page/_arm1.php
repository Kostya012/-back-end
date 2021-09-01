<?php
$title = 'Перелік АРМ';
$article = 'Перелік АРМ';
require_once 'pages/head.php';
?>
<link rel="stylesheet" href="css/contacts.css" />
<link rel="stylesheet" href="css/loader.css" />
<?php
require_once 'pages/body-header.php';
?>
<main>
  <div class="container container-cody">
    <div class="list-group">
      <h4>
        <span class="label label-primary">
          <a href="_index.php">/Головна</a>
          <a href="_arm.php">/АРМ</a>
          <a href="_arm1.php">/Перелік АРМ</a>
        </span>
      </h4>
    </div>
    <div class="search-table">
      <div id="searcharea">
        <input type="search" name="search" id="mySearch" placeholder="Пошук" />
      </div>
      <div class="linkDownload">
        <a href="tables/arm.xls">
          <div class="linkDown">
            <img class="hicon-down" src="img/ms_excel.svg" />
            <span>Скачати перелік АРМ.xls</span>
          </div>
        </a>
      </div>
      <!-- <h2>ГРАФІК змінної роботи</h2> -->
      <div id="loader">
        <div class="loader">Loading...</div>
      </div>
      <h2 id="h2"></h2>
      <div id="info">
      </div>
      <?php
      function createJSONs($name, $sheetByName)
      {
        $excel = PHPExcel_IOFactory::load($name);
        $mas = array(array());
        $countRows = 0;
        for ($i = 1; $i <= 150; $i++) {
          if (gettype($excel->getSheetByName("$sheetByName")->getCellByColumnAndRow(0, $i)->getValue()) === "NULL") break;
          $countRows++;
        }
        $countColumns = 0;
        for ($j = 0; $j <= 150; $j++) {
          if (gettype($excel->getSheetByName("$sheetByName")->getCellByColumnAndRow($j, 2)->getValue()) === "NULL") break;
          $countColumns++;
        }

        $mas[0][0] = $excel->getSheetByName("$sheetByName")->getCellByColumnAndRow(0, 1)->getValue();
        for ($i = 1; $i < $countRows; $i++) {
          for ($j = 0; $j <= $countColumns - 1; $j++) {
            $mas[$i][$j] = $excel->getSheetByName("$sheetByName")->getCellByColumnAndRow($j, $i + 1)->getCalculatedValue();
          }
        }
        $result = json_encode($mas, JSON_UNESCAPED_UNICODE);
        file_put_contents("json/arm/$sheetByName.json", $result);
        $excel->disconnectWorksheets();
        unset($excel);
      }

      $fileName = 'tables/arm.xls';
      $sheetSl = 'sl';
      $sheetHkvp = 'hkvp';
      $sheetHkmpd = 'hkmpd';
      $sheetHkpp = 'hkpp';
      $sheetHkrd = 'hkrd';
      $sheetHkst = 'hkst';
      $sheetHkfs = 'hkfs';
      $sheetHkter = 'hkter';

      if (file_exists($fileName)) {
        $chCurrent = date("d.m.Y H:i:s.", filemtime($fileName));
        echo "<br>Останні зміни файла $fileName : " . $chCurrent;
        require_once 'Classes/PHPExcel.php';
        $fN_changes_xls = "statistics/fN_changes_arm_xls.txt";
        if (file_exists($fN_changes_xls)) {
          $fileLust = file_get_contents($fN_changes_xls);
          $fileCurrent = date("F d Y H:i:s.", filemtime($fileName));
          if ($fileLust === $fileCurrent) {
            unset($fileLust);
            unset($fileCurrent);
          } else {
            echo "<br>Файл змінено: " . $fileCurrent . ", а перед цим останні зміни були: " . $fileLust;
            $file = fopen($fN_changes_xls, "w+");
            fwrite($file, $fileCurrent);
            fclose($file);
            $file = file_get_contents($fN_changes_xls);
            unset($file);
            unset($fileLust);
            unset($fileCurrent);
            createJSONs($fileName, $sheetSl);
            createJSONs($fileName, $sheetHkvp);
            createJSONs($fileName, $sheetHkmpd);
            createJSONs($fileName, $sheetHkpp);
            createJSONs($fileName, $sheetHkrd);
            createJSONs($fileName, $sheetHkst);
            createJSONs($fileName, $sheetHkfs);
            createJSONs($fileName, $sheetHkter);
          }
        } else {
          $file = fopen($fN_changes_xls, "a+");
          fwrite($file, date("F d Y H:i:s.", filemtime($fileName)));
          fclose($file);
          $file = file_get_contents($fN_changes_xls);
          unset($file);
          createJSONs($fileName, $sheetSl);
          createJSONs($fileName, $sheetHkvp);
          createJSONs($fileName, $sheetHkmpd);
          createJSONs($fileName, $sheetHkpp);
          createJSONs($fileName, $sheetHkrd);
          createJSONs($fileName, $sheetHkst);
          createJSONs($fileName, $sheetHkfs);
          createJSONs($fileName, $sheetHkter);
        }
      } else {
        echo "<br>Нажаль файла: $fileName не має. Необхідно завантажити файл.";
      }
      ?>
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
let arm = document.getElementById('arm');
arm.classList.add('active');
</script>
<script src="js/arm1.js"></script>
</body>

</html>