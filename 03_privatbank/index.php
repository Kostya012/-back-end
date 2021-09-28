<!DOCTYPE html>
<html lang="ru-UA">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="img/faviconPB.ico" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/styleCoach.css" />
  <title>Exchange Rates in Privat bank</title>
  <style>
    header {
      background-image: url(img/backgroundPB.png);
      background-repeat: no-repeat;
      background-size: cover;
    }

    #calendar2 {
      width: 100%;
      line-height: 1.2em;
      font-size: 15px;
      text-align: center;
    }

    #calendar2 thead tr:last-child {
      font-size: small;
      color: rgb(85, 85, 85);
    }

    #calendar2 thead tr:nth-child(1) td:nth-child(2) {
      color: rgb(50, 50, 50);
    }

    #calendar2 thead tr:nth-child(1) td:nth-child(1):hover,
    #calendar2 thead tr:nth-child(1) td:nth-child(3):hover {
      cursor: pointer;
    }

    #calendar2 tbody td {
      color: rgb(44, 86, 122);
    }

    #calendar2 tbody td:nth-child(n + 6),
    #calendar2 .holiday {
      color: rgb(231, 140, 92);
    }

    #calendar2 tbody td.today {
      background: rgb(220, 0, 0);
      color: #fff;
    }
  </style>
</head>

<body>
  <header>
    <a href="/" title="Головна сторінка">
      <img src="img/pb_white.png" alt="Головна сторінка" />
    </a>
    <h1>Курс валют Приват банку</h1>
  </header>
  <main>
    <div class="container py-3">
      <form name="pb" action="" method="POST">
        <div class="row row-cols-1 row-cols-md-3 text-center">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
              <div class="card-header py-3 text-white bg-primary border-primary">
                <h4 class="my-0 fw-normal">Оберіть дату</h4>
              </div>
              <div class="card-body">
                <table id="calendar2">
                  <thead>
                    <tr>
                      <td id="prevCalen" style="visibility: visible">‹‹‹</td>
                      <td colspan="5"></td>
                      <td id="nextCalen" style="visibility: hidden">›››</td>
                    </tr>
                    <tr>
                      <td>Пн</td>
                      <td>Вт</td>
                      <td>Ср</td>
                      <td>Чт</td>
                      <td>Пт</td>
                      <td>Сб</td>
                      <td>Вс</td>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
              <div class="card-header py-3 text-white bg-primary border-primary">
                <h4 class="my-0 fw-normal">Дата запиту довiдки</h4>
              </div>
              <div class="card-body">
                <input id="seldate" type="text" value="" name="seldate" readonly />
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
              <div class="card-header py-3 text-white bg-primary border-primary">
                <h4 class="my-0 fw-normal">Результат:</h4>
              </div>
              <div class="card-body">
                <div>Курс долара</div>
                <?php
                if (isset($_POST['send'])) {
                  if (isset($_POST['seldate'])) {
                    if (htmlspecialchars($_POST['seldate']) !== '') {
                      $seldate = htmlspecialchars($_POST['seldate']);
                      $fileName = "db/$seldate.json";

                      if (file_exists($fileName)) {
                        //если файл есть, тогда показуем что там за курс валют
                        $file = file_get_contents($fileName);
                        $result = json_decode($file, true);
                        if (is_array($result)) {
                          if (in_array($seldate, $result)) {
                            foreach ($result["exchangeRate"] as $curren) {
                              if (isset($curren["currency"])) {
                                if ($curren["currency"] === "USD") {
                                  echo "<div>станом на: " . $seldate . "</div>";
                                  echo "<div>Продажа: " . $curren["saleRate"] . " Покупка: " . $curren["purchaseRate"] . "</div>";
                                }
                              }
                            }
                          } else {
                            foreach ($result as $currency) {
                              if ($currency["ccy"] === "USD") {
                                echo "<div>станом на: " . $seldate . "</div>";
                                echo "<div>Продажа: " . $currency["sale"] . " Покупка: " . $currency["buy"] . "</div>";
                              }
                            }
                          }
                        }
                      } else {
                        $data = date("d");
                        $month = date("m");
                        $year = date("Y");
                        $arrSeldate = explode(".", $seldate);

                        $selDay = $arrSeldate[0];
                        $selMonth = $arrSeldate[1];
                        $selYear = $arrSeldate[2];
                        if ($data === $selDay && $month === $selMonth && $year === $selYear) {
                          $url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
                          //  Initiate curl
                          $cuh = curl_init();
                          // Disable SSL verification
                          curl_setopt($cuh, CURLOPT_SSL_VERIFYPEER, false);
                          // Will return the response, if false it print the response
                          curl_setopt($cuh, CURLOPT_RETURNTRANSFER, true);
                          // Set the url
                          curl_setopt($cuh, CURLOPT_URL, $url);
                          // Execute
                          $result = curl_exec($cuh);
                          // Closing
                          curl_close($cuh);

                          $file = fopen($fileName, "w+");
                          fwrite($file, $result);
                          fclose($file);

                          $result = json_decode($result, true);
                          foreach ($result as $currency) {
                            if ($currency["ccy"] === "USD") {
                              echo "<div>станом на: " . $seldate . "</div>";
                              echo "<div>Продажа: " . $currency["sale"] . " Покупка: " . $currency["buy"] . "</div>";
                            }
                          }
                        } else {
                          if ($selYear < $year - 4) {
                            echo "<div>Архів має дані за останні 4 роки, укажіть будь ласка рік не менше " . $year - 4 . " року.</div>";
                          } else {
                            if ($curl = curl_init()) {
                              $url = "https://api.privatbank.ua/p24api/exchange_rates?json&date=$seldate";
                              //  Initiate curl
                              $cuh = curl_init();
                              // Disable SSL verification
                              curl_setopt($cuh, CURLOPT_SSL_VERIFYPEER, false);
                              // Will return the response, if false it print the response
                              curl_setopt($cuh, CURLOPT_RETURNTRANSFER, true);
                              // Set the url
                              curl_setopt($cuh, CURLOPT_URL, $url);
                              // Execute
                              $result = curl_exec($cuh);
                              // Closing
                              curl_close($cuh);

                              $file = fopen($fileName, "w+");
                              fwrite($file, $result);
                              fclose($file);

                              $result = json_decode($result, true);
                              if (is_array($result)) {
                                if (in_array($seldate, $result)) {
                                  foreach ($result["exchangeRate"] as $curren) {
                                    if (isset($curren["currency"])) {
                                      if ($curren["currency"] === "USD") {
                                        echo "<div>станом на: " . $seldate . "</div>";
                                        echo "<div>Продажа: " . $curren["saleRate"] . " Покупка: " . $curren["purchaseRate"] . "</div>";
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div>
          <input type="submit" name="send" value="Запит звіту" class="w-100 btn btn-lg btn-primary" />
        </div>
      </form>
    </div>
  </main>
  <script src="script.js"></script>
</body>

</html>