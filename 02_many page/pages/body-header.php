<?php
$time = date("H:i:s");
$data = date("d");
$month = date("m");
$year = date("Y");

$lastMonth = date("m", strtotime("-1 months"));
$lastYear = date("Y");

$documRoot = $_SERVER['DOCUMENT_ROOT'];

$fullUrl = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$fullUrl = explode('?', $fullUrl);
$fullUrl = $fullUrl[0];
$masName = array($documRoot . '/statistics/', 'lists/', $year . '/', $month . '/', $data . '.csv');
$fileName = implode($masName);


$folderStat = $masName[0];
$folderLists = $masName[0] . $masName[1];
$folderYear = $masName[0] . $masName[1] . $masName[2];
$folderMonth = $masName[0] . $masName[1] . $masName[2] . $masName[3];

if (!file_exists($folderStat)) {
  mkdir($folderStat, 0777, true);
}
if (!file_exists($folderLists)) {
  mkdir($folderLists, 0777, true);
}
if (!file_exists($folderYear)) {
  mkdir($folderYear, 0777, true);
}
if (!file_exists($folderMonth)) {
  mkdir($folderMonth, 0777, true);
}

if ($lastMonth == "12") {
  $lastYear = date("Y", strtotime("-1 year"));
  $masNameLast = array($documRoot . '/statistics/', 'lists/', $lastYear . '/', $lastMonth . '/');

  $folderYearLast = $masNameLast[0] . $masNameLast[1] . $masNameLast[2];
  $folderMonthLast = $masNameLast[0] . $masNameLast[1] . $masNameLast[2] . $masNameLast[3];
} else {
  $lastYear = $year;
  $masNameLast = array($documRoot . '/statistics/', 'lists/', $lastYear . '/', $lastMonth . '/');

  $folderYearLast = $masNameLast[0] . $masNameLast[1] . $masNameLast[2];
  $folderMonthLast = $masNameLast[0] . $masNameLast[1] . $masNameLast[2] . $masNameLast[3];
}

if (!file_exists($folderYearLast)) {
  if (!file_exists($folderMonthLast)) {
    for ($i = 1; $i <= 31; $i++) {
      $j = $i;
      if ($i < 10) {
        $j = "0" . "$i";
      }
      $masNameLast = array($documRoot . '/statistics/', 'lists/', $lastYear . '/', $lastMonth . '/', $j . '.csv');
      $fileNameLast = implode($masNameLast);
      if (file_exists($fileNameLast)) {
        unlink($fileNameLast);
      }
    }
    rmdir($folderMonthLast);
  }
}

if (isset($_SESSION["auth"])) {
  $domain = $_SESSION["nameInDomen"];
} else {
  $domain = "none";
}

if (!file_exists($fileName)) {
  $list = array(
    array("Date", "Month", "Year", "Time", "Page address", "IP", "Domain"),
    array($data, $month, $year, $time, $fullUrl, $ip, $domain)
  );
  $fp = fopen($fileName, 'w');
  // BOM (Byte Order Mark)
  // fputs($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));
  foreach ($list as $fields) {
    fputcsv($fp, $fields, ';');
  }
  fclose($fp);
} else {
  $list = array($data, $month, $year, $time, $fullUrl, $ip, $domain);

  $fp = fopen($fileName, 'a');
  fputcsv($fp, $list, ';');
  fclose($fp);
}

$ipCheck = false;
$ipCheckAp = false;


if ($ip == "::1") {
  $ipName = "Костянтин Олегович ::1";
  $ipCheck = true;
  $ipCheckAp = true;
}

unset($ip);
unset($time);
unset($data);
unset($month);
unset($year);
unset($fullUrl);
unset($masName);
unset($fileName);
unset($folderStat);
unset($folderLists);
unset($folderYear);
unset($folderMonth);
unset($list);
unset($fp);
?>
</head>

<body id="body">
  <?php
  $cook = isset($_COOKIE["numuz"]);
  $auth = isset($_SESSION["auth"]);
  if (true !== $cook && $ipCheck && true !== $ipPasCheck && !$auth && !$error) {
    echo "<form action='' accept-charset='UTF-8' method='post' id='login'><span class='auth'>Будь ласка авторизуйтесь <span class='spanRed'>$ipName </span><input type='password' name='password' id='password'><input type='submit' name='send' value='Увійти'></span></form>";
  }
  if ($auth) {
    echo "<form action='' accept-charset='UTF-8' method='post' id='login'><span class='auth'>Вітаємо Вас <span class='spanRed'>" . $_SESSION["nameInDomen"] . "</span><input type='submit' name='quit' value='Вийти'></span></form>";
  }
  if ($error) {
    echo `<form action="" accept-charset="UTF-8" method="POST" id="login"><span class="auth">Авторизація: Ім'я-<input type="text" id="login" name="login"><span class="auth"> Пароль-</span><input type="password" id="pass" name="pass"><span class="spanRed"> $err</span><input type="submit" id="send" name="send" value="Увійти"></span></form>`;
  }
  ?>
  <header>
    <div class="log">
      <div class="logo3" id="logo">
        <div class="gi">
          <h5 class="logogioc">ІОЦ</h5>
        </div>
        <h6>Виробничий<br />підрозділ<br />"Харківське<br />відділення"</h6>
        <!-- </a> -->
      </div>
    </div>
    <div class="nav" id="slow_nav">
      <ul class="navbar">
        <li class="blog-nav">
          <a class="blog-nav-item" id="index" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_index.php' ?>">
            <div class="hicon-index"></div>
            Головна
          </a>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="instr" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_instr.php' ?>">
            <div class="hicon-instr"></div>
            Інструкції
          </a>
          <ul class="submenu submenu-margTop">
            <li>
              <a href="#">Сектор впровадження систем і задач</a>
              <ul class="submenu">
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASKVP-E/pro/_pro.php' ?>">ЄКІП УЗ</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/askvp-e/ASK_manual.htm' ?>">Інструкція
                    по використанню Автоматизованого робочого місця
                    користувача системи АСК ВП УЗ-Є (АРМ
                    ПРО-Є)</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASKVP-E/tk/_index.php' ?>">Технологічні
                    карти системи АСК ВП УЗ-Є</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASKVP-E/mess_in_out/index.htm' ?>">Вхідні
                    повідомлення та вихідні документи системи
                    АСК ВП УЗ-Є</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASKVP-E/technologies/_index.php' ?>">Технології
                    та інструкції</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASKVP-E/lk/_index.php' ?>">Логічний
                    контроль</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASKVP-E/psvnsi/_indnsi.php' ?>">ПСВ
                    НДІ та НДІ рівня залізниці</a>
                </li>

                <li class="other">Інші системи і задачі</li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/ASNIU/_index.php' ?>">АС "НіУ"</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/Vlasni/_index.php' ?>">АРМ та довідки
                    власної розробки</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/PZ-GOV-UA/instr_PZ_gov_ua_rasp.htm' ?>">Автоматизована
                    система "Розклад руху приміських поїздів". Інструкція</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/vsz/don_zal/_index.php' ?>">Інструкційні
                    матеріали по роботі з АС регіональної філії "ДОНЕЦЬКА ЗАЛІЗНИЦЯ"</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Сектор експлуатації систем і задач</a>
              <ul class="submenu">
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/esz/Sisdis/_sisdis.php' ?>">Група
                    ДІСКОР</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Сектор впровадження та експлуатації<br />диспетчерського
                управління</a>
              <ul class="submenu">
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/dcu/arm_dcu/index.htm' ?>">АРМ ДЦУ, АРМ
                    СТ_Д (ДСП), АРМ ДНЦ, АРМ ДГП, АРМ АГВР</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/dcu/arm_asvvp/index.htm' ?>">АРМ АС
                    ВВП</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/dcu/arm_vikna/index.htm' ?>">АРМ
                    ВІКНА</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/dcu/Instr_naliv_pogruzka.htm' ?>">Інструкція
                    по введенню даних для довідок "Обеспечение
                    нефтеналивных станций" та "Обеспечение погрузки"</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/dcu/Upr_PAS_diagnostika.html' ?>">Підтримка
                    роботи ПЕОМ керівництва залізниці</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Технологічні карти для змінних працівників</a>
              <ul class="submenu">
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/smena_tk/Teh_karta1_2020_25.htm' ?>">Технологічна
                    карта інженера зміни відділу ХКВП</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/smena_tk/Teh_karta2_2020.htm' ?>">Технологічна
                    карта змінного інженера відділу ХКВП</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/smena_tk/tehkarta_operatora.htm' ?>">Технологічна
                    карта техніка відділу ХКВП</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/smena_tk/Teh_karta_tehnika_2020.htm' ?>">Технологічна
                    карта змінного техніка відділу
                    ХКВП</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/smena_tk/Техкарта_смены_упр.htm' ?>">Технологічна
                    карта роботи змінного інженера сектора
                    ДУ</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Адміністратори ІС, МПД та ПТК</a>
              <ul class="submenu">
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/admin/Nakaz.doc' ?>">Наказ від 14.08.2020
                    №ГІОЦ ВП ХК-01-08/26</a>
                </li>
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/admin/Dodatok.doc' ?>">Додаток до
                    наказу</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Інструкції з роботи інших відділів</a>
              <ul class="submenu">
                <li>
                  <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/instr/other/Інструкція змінним працівникам щодо відкриття поштових баз на резервному сервері 2021.docx' ?>">Інструкція
                    щодо відкриття баз даних на резервному сервері Lotus Domino</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="arm" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_arm.php' ?>">
            <div class="hicon-arm"></div>
            Перелік АРМ
          </a>
          <ul class="submenu submenu-margTop">
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_arm1.php' ?>">Перелік АРМ</a>
            </li>
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_arm2.php' ?>">Додаток</a>
            </li>
            <li class="new">
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/doc/Краткая инструкция настройки АРМ.doc' ?>">Інструкція по встановленню АРМ ТЧД, ТЧД на базі СВВМ</a>
            </li>
          </ul>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="contacts" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_contacts.php' ?>">
            <div class="hicon-contacts"></div>
            Контакти
          </a>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="kody" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_kody.php' ?>">
            <div class="hicon-kody"></div>
            Коди набору
          </a>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="emr" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_emr.php' ?>">
            <div class="hicon-emr"></div>
            ЄМР станцій
          </a>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="birthday" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_birthday.php' ?>">
            <div class="hicon-birthday"></div>
            Дні народження
          </a>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="graph" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_graph.php' ?>">
            <div class="hicon-graph"></div>
            Графік роботи
          </a>
          <ul class="submenu submenu-margTop">
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_graph2.php' ?>">Щоденний режим роботи</a>
            </li>
            <?php
            $cook = isset($_COOKIE["numuz"]);
            if ($cook && $ipCheck || $ipPasCheck && $ipCheck) {
              echo "<li><a href='http://" . $_SERVER['SERVER_NAME'] . "/_graph_zminu.php'>Змінний режим роботи</a></li>";
            }
            ?>
          </ul>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="telephons" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/_telephons.php' ?>">
            <div class="hicon-telephons"></div>
            Телефони
          </a>
          <ul class="submenu submenu-margTop">
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/telephons/_telephons_UZ.php' ?>">Укрзалізниця</a>
            </li>
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/telephons/_telephons_PZ.php' ?>">Південна
                залізниця</a>
            </li>
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/telephons/_telephons_GIOC.php' ?>">ГІОЦ</a>
            </li>
            <li>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/telephons/_telephons_VPHK.php' ?>">ГІОЦ ВП ХК</a>
            </li>
          </ul>
        </li>
        <?php
        if (isset($_SESSION["auth"])) {
          echo "<li class='blog-nav'>
              <a class='blog-nav-item' id='upr' href='http://" . $_SERVER['SERVER_NAME'] . "/_upr.php'>
                <div class='hicon-upr'></div>
                Управління ПЗ
              </a>
            </li>";
        }
        ?>
      </ul>
      <div class="article">
        <h1 id="article"><?= $article ?></h1>
      </div>
    </div>
  </header>
  <?php
  unset($cook);
  ?>