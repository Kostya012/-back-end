<?php
$title = 'Контакти';
$article = 'Контакти відділу';
require_once 'pages/head.php';
?>
<link rel="stylesheet" href="css/loader.css" />
<link rel="stylesheet" href="css/contacts.css" />
<?php
require_once 'pages/body-header.php';
?>
<main>
  <div class="container container-cody">
    <div class="list-group">
      <h4>
        <span class="label label-primary">
          <a href="_index.php">/Головна</a>
          <a href="_contacts.php">/Контакти</a>
        </span>
      </h4>
    </div>
    <div class="search-table">
      <div id="searcharea">
        <input type="search" name="search" id="mySearch" placeholder="Пошук" />
      </div>
      <!-- <div class="linkDownload">
        <a href="tables/Телефони ХКВП.docx">
          <div class="linkDown">
            <img class="hicon-down" src="img/ms_word.svg" />
            <span>Завантажити телефони ХКВП.docx</span>
          </div>
        </a>
      </div> -->
      <div id="loader">
        <div class="loader">Loading...</div>
      </div>
      <div id="info">
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
        $chCurrent = date("d.m.Y H:i:s.", filemtime($fileName));
        echo "<br>Останні зміни файла $fileName : " . $chCurrent;
        require_once 'Classes/PHPExcel.php';
        $fN_changes_xls = "statistics/fN_changes_contacts_xls.txt";
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
let contacts = document.getElementById('contacts');
contacts.classList.add('active');
</script>
<script src="js/contacts.js"></script>
</body>

</html>