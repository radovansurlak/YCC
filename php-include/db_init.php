<?php
  //Initialize DB connection
  $pdo = new PDO("mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_d475e5562c46b1e", "b0bce84ae9d41b", "8d036d90");
  $fpdo = new FluentPDO($pdo);
?>
