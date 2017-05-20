<?php
  $pdo = new PDO("mysql:host=localhost;dbname=ycc", "root", "root");
  $fpdo = new FluentPDO($pdo);
?>
