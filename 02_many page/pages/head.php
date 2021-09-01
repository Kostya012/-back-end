<?php
$auth = isset($_SESSION["auth"]);

if (!$auth) {
  session_start();
}

$err = '';
$error = false;

if (isset($_POST['send'])) {
  if (isset($_POST['password'])) {
    if (htmlspecialchars($_POST['password']) !== '') {
      $password = htmlspecialchars($_POST['password']);
    }
  }
  if (isset($_POST['login']) && isset($_POST['pass'])) {
    if (htmlspecialchars($_POST['login']) !== '' && htmlspecialchars($_POST['pass']) !== '') {
      $login = htmlspecialchars($_POST['login']);
      $pass = htmlspecialchars($_POST['pass']);
      $_SESSION["login"] = $login;
      $_SESSION["pass"] = $pass;
      $err = '';
      $error = false;

      $user = $login;
      $ldap_pass = $pass;
      $domain = '@ukr.zal';
      $ldap_userName = $user . $domain;
      $memberof = "cn=PV_ACL,ou=Access,ou=Groups,ou=PV,ou=KHARKIV,dc=ukr,dc=zal";
      $filter = "sAMAccountName=";
      $ldap_host = "10.10.10.10";
      $ldap_host2 = "10.10.10.11";
      $base_dn = "DC=ukr,DC=zal";
      $ldap_port = "389";


      function ldapConn($connect, $ldap_userName, $ldap_pass)
      {
        global $err, $error, $base_dn, $memberof, $filter, $user;
        ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
        $bind = @ldap_bind($connect, $ldap_userName, $ldap_pass);
        if ($bind) {
          if (ldap_get_option($connect, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error)) {
            $err = "Error Binding to LDAP: $extended_error";
            $error = true;
          } else {
            $read = ldap_search($connect, $base_dn, "(&(memberOf=" . $memberof . ")(" . $filter . $user . "))");
            $info = ldap_get_entries($connect, $read);
            ldap_close($connect);

            if ($info['count'] != 0) {
              $_SESSION["auth"] = "34";
              $ii = 0;
              for ($i = 0; $ii < $info[$i]["count"]; $ii++) {
                $data = $info[$i][$ii];
                if ($data === "name") {
                  $_SESSION["nameInDomen"] = $info[$i][$data][0];
                }
              }
            } else {
              $_SESSION["noauth"] = "0";
            }
            $err = "";
            $error = false;
          }
        } else {
          ldap_close($connect);
          $err = ">>Не верно ввели логин или пароль<<";
          $error = true;
        }
      }

      define(LDAP_OPT_DIAGNOSTIC_MESSAGE, 0x0032);

      $connect = ldap_connect($ldap_host, $ldap_port);

      if ($connect) {
        ldapConn($connect, $ldap_userName, $ldap_pass);
      } else {
        $connect = ldap_connect($ldap_host2, $ldap_port);
        ldapConn($connect, $ldap_userName, $ldap_pass);
      }
    } else {
      $err = 'Введите корректное имя в домене и пароль';
      $errorLogPas = true;
    }
  }
} else if (isset($_POST['quit'])) {
  session_destroy();
}

$ip = $_SERVER["REMOTE_ADDR"];
$ipPasCheckAp = false;
$ipPasCheck = false;
if (isset($password)) {
  if (($ip == "::1") && ($password == "123")) {
    $ipPasCheck = true;
    $$ipPasCheckAp = true;
    setcookie("numuz", 10);
    unset($password);
  }
}
?>
<!DOCTYPE html>
<html lang="ru-UA">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Kostiantyn Shevtsov">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="-1">
  <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/css/reset.css' ?>" />
  <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/css/header.css' ?>" />
  <link rel="shortcut icon" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/img/train1.ico' ?>" type="image/x-icon" />
  <title><?= $title ?></title>