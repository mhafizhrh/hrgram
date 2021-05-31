
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
            <!--
            Tanpa navbar
            ->
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


    <div class="container">
        <div class="col-md-4 col-md-offset-4">
        <center><h2>Daftar</h2></center>
        <?php
            session_start();
            if (isset($_POST['daftar'])) {
                require_once 'koneksi.php';
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $konpass = $_POST['konpass'];
                $q = mysql_query("SELECT * FROM users WHERE username = '$username'");
                $a = mysql_fetch_array($q);
                $r = mysql_num_rows($q);
                $join_date = date('Y-m-d');
                if (!$username || !$password || !$email || !$konpass) {
                    echo "<div class='alert alert-danger'>Masukan data terlebih dahulu.</div>";
                } else {
                    if ($r <> 0) {
                        echo "<div class='alert alert-danger'>Username sudah ada!</div>";
                    } else if ($password <> $konpass) {
                        echo "<div class='alert alert-danger'>Konfirmasi Password salah!</div>";
                    } else {
                        mysql_query("INSERT INTO users (username,password,email,saldo,level,join_date) VALUES ('$username','$konpass','$email','0','Member','$join_date')");
                        $_SESSION['username'] = $username;
                        header("location:/");
                    }
                }
            }
        ?>
            <form method="post">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control" placeholder="Email anda" required>
                        </div>
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" name="username" class="form-control" placeholder="Username anda" required>
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" name="password" class="form-control" placeholder="Password anda" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password :</label>
                            <input type="password" name="konpass" class="form-control" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="form-group">
                            <a href="login.php" class="btn btn-success">Login</a>
                            <button type="submit" class="btn btn-primary pull-right" name="daftar">Daftar</button>
                        </div>
                        <div class="form-group">
                            <a href="lupa-password.php" class="btn btn-default btn-block">Lupa Password</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
    <script src="assets/js/order.js"></script>
  </body>
</html>