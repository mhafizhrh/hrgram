<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else {
$username = $_SESSION['username'];
require_once 'koneksi.php';
$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
$query2 = mysql_query("SELECT * FROM users");
$query3 = mysql_query("SELECT SUM(harga) AS total FROM riwayat_order");
$query4 = mysql_query("SELECT * FROM riwayat_order WHERE username = '$username'");
$rows = mysql_num_rows($query2);
$array = mysql_fetch_array($query);
$saldo = number_format($array['saldo']);
$date = date('Y-m-d');
$join = mysql_query("SELECT * FROM users WHERE join_date = '$date'");
$new_user = mysql_num_rows($join);
$level = $array['level'];
$password = $array['password'];
$array3 = mysql_fetch_array($query3);
$array4 = mysql_fetch_array($query4);
$saldo_terpakai = $array3['total'];
$saldo_terpakai_user = $array4['harga'];
$order = mysql_num_rows($query4);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Web Panel SMM termasuk Instagram, Youtube, Facebook, Twitter, dan Vine dengan harga yang murah.">
    <meta name="author" content="Hafizh Rahman">
    <link rel="icon" href="favicon.png">

    <title>HR GRAM</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">HR GRAM</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <?php
                if (!isset($_SESSION['username'])) {
            ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="daftar.php">Daftar</a></li>
            <li><a href="?konten=harga-layanan">Harga Layanan</a></li>
            <?php
                } else {
            ?>
            <li><a href="javascript:;"><b>Saldo : Rp. <?=$saldo?></b></a></li>
            <li><a href="?konten=order">Order Baru</a></li>
            <li><a href="?konten=riwayat-order">Riwayat Order</a></li>
            <li><a href="?konten=deposit-saldo">Deposit Saldo</a></li>
            <li><a href="?konten=harga-layanan">Harga Layanan</a></li>
            <?php
                if ($level == "Admin") {
            ?>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown">Kelola Website <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="?konten=tambah-layanan">Tambah Layanan</a></li>
                    <li><a href="?konten=hapus-user">Hapus User</a></li>
                    <li><a href="?konten=edit-layanan">Edit Layanan</a></li>
                    <li><a href="?konten=transfer-saldo">Transfer Saldo</a></li>
                </ul>
            </li>
            <?php
                }
            ?>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><b><?=$username?> <span class="caret"></span></b></a>
                <ul class="dropdown-menu">
                    <li><a href="?konten=pengaturan">Pengaturan</a></li>
                    <li><a href="?konten=keluar">Keluar</a></li>
                </ul>
            </li>
            <?php
                }
            ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


    <div class="container">
        <?php
            if (isset($_GET['konten'])) {
                $konten = $_GET['konten'];
                if ($konten == "order") {
                    include_once 'konten/order.php';
                } else if ($konten == "riwayat-order") {
                    include_once 'konten/riwayat-order.php';
                } else if ($konten == "deposit-saldo") {
                    include_once 'konten/deposit-saldo.php';
                } else if ($konten == "harga-layanan") {
                    include_once 'konten/harga-layanan.php';
                } else if ($konten == "tambah-layanan") {
                    if ($level == "Member") {
                        header("location:?konten=Salah-Link-Coyyy");
                    } else {
                        include_once 'konten/tambah-layanan.php';
                    }
                } else if ($konten == "hapus-user") {
                    if ($level == "Member") {
                        header("location:?konten=Salah-Link-Coyyy");
                    } else {
                        include_once 'konten/hapus-user.php';
                    }
                } else if ($konten == "edit-layanan") {
                    if ($level == "Member") {
                        header("location:?konten=Salah-Link-Coyyy");
                    } else {
                        include_once 'konten/edit-layanan.php';
                    }
                } else if ($konten == "transfer-saldo") {
                    if ($level == "Member") {
                        header("location:?konten=Salah-Link-Coyyy");
                    } else {
                        include_once 'konten/transfer-saldo.php';
                    }
                } else if ($konten == "pengaturan") {
                    include_once 'konten/pengaturan.php';
                } else if ($konten == "keluar") {
                    unset($_SESSION['username']);
                    header("location:login.php");
                } else {
                    echo "<center><h1>Apalotega?</h1></center>";
                }
            } else {

        ?>
        <center><h3>Selamat datang, <?=$username?></h3></center>
        <div class="col-md-3">
            <div class="panel panel-success text-center">
                <div class="panel-heading">
                    <h3><?=$new_user?> User Baru</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success text-center">
                <div class="panel-heading">
                <?php
                if ($level == "Admin") {
                ?>
                    <h3>Total Belanja Semua User <b>Rp. <?=number_format($saldo_terpakai)?></b></h3>
                <?php
                } else {
                ?>
                    <h3>Total Belanja Anda <b>Rp. <?=number_format($saldo_terpakai_user)?></b></h3>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success text-center">
                <div class="panel-heading">
                    <h3><?=$order?>x Order</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info text-center">
                <div class="panel-heading">Kontak Admin</div>
                <div class="panel-body">
                    <center>
                        <p><b>WhatsApp: </b>0821-3377-9498</p>
                        <p><b>ID Line : </b>mhafizhrh</p>
                        <p><b>Facebook :</b> <a href="http://facebook.com/hafizh.rh" target="blank">Add Me+</a></p>
                    </center>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div><!--/.container-->
<script>
function rate() {
    var jumlah = $("#jumlah").val();
    var layanan = $("#layanan").val();
    if (layanan == 1) {
        var satuan = 9;
    } else if (layanan == 2) {
        var satuan = 5.5;
    } else if (layanan == 3) {
        var satuan = 3.5;
    } else if (layanan == 4) {
        var satuan = 60.5;
    } else if (layanan == 5) {
        var satuan = 11.5;
    } else if (layanan == 6) {
        var satuan = 11.5;
    } else if (layanan == 8) {
        var satuan = 11.5;
    } else if (layanan == 9) {
        var satuan = 11.5;
    } else if (layanan == 10) {
        var satuan = 5.5;
    } else if (layanan == 12) {
        var satuan = 17.5;
    } else if (layanan == 13) {
        var satuan = 11.5;
    } else if (layanan == 14) {
        var satuan = 17.5;
    } else if (layanan == 15) {
        var satuan = 10.5;
    } else if (layanan == 16) {
        var satuan = 13.5;
    } else if (layanan == 17) {
        var satuan = 11.5;
    } else if (layanan == 18) {
        var satuan = 9.5;
    } else if (layanan == 19) {
        var satuan = 10.5;
    } else if (layanan == 11) {
        var satuan = 8.5;
    } else if (layanan == 20) {
        var satuan = 14.5;
    } else if (layanan == 21) {
        var satuan = 11.5;
    } else if (layanan == 22) {
        var satuan = 13.5;
    } else {
        var satuan = 0;
    }
    var hasil = jumlah * satuan;
    $("#harga").html(hasil);
}
</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
    <!--
    <script src="assets/js/order.js"></script>
    -->
  </body>
</html>