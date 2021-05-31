<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "hrgram";
mysql_connect($host,$user,$pass) or die ("Koneksi ke Mysql gagal");
mysql_select_db($db) or die ("Database tidak ditemukan");
?>