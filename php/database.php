<?php
$servernimi = "localhost";
$kasutaja  = "root";
$parool = "";
$andmebaas = "raamatukogu";
$connect = new mysqli($servernimi,$kasutaja,$parool,$andmebaas);
$connect-> set_charset("utf8");
?>
