<div class="col-md-4 col-md-offset-4">
    <center><h2>Transfer Saldo</h2></center>
    <?php
        if (isset($_POST['transfer'])) {
            $user_del = $_POST['user_del'];
            $jumlah = $_POST['jumlah'];
            if ($saldo < $jumlah) {
                echo "<div class='alert alert-danger'>Gagal, saldo anda kurang.</div>";
            } else {
            mysql_query("UPDATE users SET saldo = saldo+$jumlah WHERE username = '$user_del'");
            mysql_query("UPDATE users SET saldo = saldo-$jumlah WHERE username = '$username'");
?>
    <div class="alert alert-success">
        <p><b><i class="fa fa-check-square"></i> Saldo telah di Transfer.</b></p>
        <p><b>Target :</b> <?=$user_del?></p>
        <p><b>Jumlah :</b> Rp. <?=number_format($jumlah);?></p>
    </div>
<?php
            }
        }
    ?>
    <form method="post">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="form-group">
                    <label>Username :</label>
                    <select name="user_del" class="form-control" required>
                        <?php
                            $select = mysql_query("SELECT * FROM users");
                            while ($data = mysql_fetch_array($select)) {
                                echo "<option value=".$data['username'].">".$data['username']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah :</label>
                    <input type="number" name="jumlah" class="form-control" min="1" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="transfer" class="btn btn-primary pull-right">Transfer</button>
                </div>
            </div>
        </div>
    </form>
</div>