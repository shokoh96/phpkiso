<?php

$dsn = 'mysql:dbname=phpkiso;localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT * FROM `survey`';
$stmt = $dbh->prepare($sql);
$stmt->execute();

// while (1) {
//   $rec = [];
//   $rec = $stmt->fetch(PDO::FETCH_ASSOC);
//   if ($rec == false) {
//     break;
//   }

//   echo $rec['code'] . '<br>';
//   echo $rec['nickname'] . '<br>';
//   echo $rec['email'] . '<br>';
//   echo $rec['content'] . '<br>';
//   echo '<hr>';
// }

// fetchAll(); DBの値をすべて取得して格納する
// fetch(); DBの1行を取得して格納する
$rec = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rec as $value) {
  echo $value['code'] . '<br>';
  echo $value['nickname'] . '<br>';
  echo $value['email'] . '<br>';
  echo $value['content'] . '<br>';

  echo '<hr>';
}

$dbh = null;