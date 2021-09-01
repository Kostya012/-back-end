<?php
$title = 'Коди набору';
$article = 'Коди набору телефонів';
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
          <a href="_kody.php">/Коди набору</a>
        </span>
      </h4>
    </div>
    <div class="search-table">
      <div id="searcharea">
        <input type="search" name="search" id="mySearch" placeholder="Пошук" />
      </div>
      <div id="loader">
        <div class="loader">Loading...</div>
      </div>
      <div id="info">
      </div>
      <?php
      function createJSON_parse_csv_file($file_path, $file_encodings = ['cp1251', 'UTF-8'], $col_delimiter = '', $row_delimiter = "")
      {
        if (!file_exists($file_path))
          return false;
        $cont = trim(file_get_contents($file_path));
        $encoded_cont = mb_convert_encoding($cont, 'UTF-8', mb_detect_encoding($cont, $file_encodings));
        unset($cont);

        if (!$row_delimiter) {
          $row_delimiter = "\r\n";
          if (false === strpos($encoded_cont, "\r\n"))
            $row_delimiter = "\n";
        }

        $lines = explode($row_delimiter, trim($encoded_cont));
        $lines = array_filter($lines);
        $lines = array_map('trim', $lines);

        // авто-определим разделитель из двух возможных: ';' или ','. 
        // для расчета берем не больше 30 строк
        if (!$col_delimiter) {
          $lines10 = array_slice($lines, 0, 30);

          // если в строке нет одного из разделителей, то значит другой точно он...
          foreach ($lines10 as $line) {
            if (!strpos($line, ',')) $col_delimiter = ';';
            if (!strpos($line, ';')) $col_delimiter = ',';
            if ($col_delimiter) break;
          }

          // если первый способ не дал результатов, то погружаемся в задачу и считаем кол разделителей в каждой строке.
          // где больше одинаковых количеств найденного разделителя, тот и разделитель...
          if (!$col_delimiter) {
            $delim_counts = array(';' => array(), ',' => array());
            foreach ($lines10 as $line) {
              $delim_counts[','][] = substr_count($line, ',');
              $delim_counts[';'][] = substr_count($line, ';');
            }

            $delim_counts = array_map('array_filter', $delim_counts); // уберем нули

            // кол-во одинаковых значений массива - это потенциальный разделитель
            $delim_counts = array_map('array_count_values', $delim_counts);

            $delim_counts = array_map('max', $delim_counts); // берем только макс. значения вхождений

            if ($delim_counts[';'] === $delim_counts[','])
              return array('Не удалось определить разделитель колонок.');

            $col_delimiter = array_search(max($delim_counts), $delim_counts);
          }
        }

        $data = [];
        foreach ($lines as $key => $line) {
          $data[] = str_getcsv($line, $col_delimiter); // linedata
          unset($lines[$key]);
        }
        $result = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents('json/kody.json', $result);
      }

      $fileName = 'tables/kody.csv';
      if (file_exists($fileName)) {
        $chCurrent = date("d.m.Y H:i:s.", filemtime($fileName));
        echo "<br>Останні зміни файла $fileName : " . $chCurrent;
        $fN_changes_csv = "statistics/fN_changes_kody_csv.txt";
        if (file_exists($fN_changes_csv)) {
          $fileLust = file_get_contents($fN_changes_csv);
          $fileCurrent = date("F d Y H:i:s.", filemtime($fileName));
          if ($fileLust === $fileCurrent) {
            unset($fileLust);
            unset($fileCurrent);
          } else {
            echo "<br>Файл змінено: " . $fileCurrent . ", а перед цим останні зміни були: " . $fileLust;
            $file = fopen($fN_changes_csv, "w+");
            fwrite($file, $fileCurrent);
            fclose($file);
            $file = file_get_contents($fN_changes_csv);
            unset($file);
            unset($fileLust);
            unset($fileCurrent);
            createJSON_parse_csv_file($fileName);
          }
        } else {
          $file = fopen($fN_changes_csv, "a+");
          fwrite($file, date("F d Y H:i:s.", filemtime($fileName)));
          fclose($file);
          $file = file_get_contents($fN_changes_csv);
          unset($file);
          createJSON_parse_csv_file($fileName);
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
let kody = document.getElementById('kody');
kody.classList.add('active');
</script>
<script src="js/kody.js"></script>
</body>

</html>