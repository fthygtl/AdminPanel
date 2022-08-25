




<?php

//girişi başlattığımız yer
session_start();
//burada ayar php dosyasını include ettik
include('database_connection.php');

if ($_POST) {
 
    $isim = $_POST["isim"];
    $sifre = $_POST["sifre"];

$stmt = $connect->prepare("SELECT uid, isim , sifre FROM kullanici WHERE isim = ? AND sifre = ?");
$stmt->execute(array($isim, $sifre));
$arr = $stmt->fetch();
$row = $arr[0];
$_SESSION['username'] = $isim;
$_SESSION['usersifre'] = $sifre;
$_SESSION['mal1'] = $row;



// we select the logged user uid to display any of the data

if ($stmt->rowCount() > 0){
  
  //kullanıcı 1 saatten fazla hareketsiz kalırsa siteden atılır.
        setcookie("kullanici","msb",time()+60*60);

        //eğer bir kullanıcı girişi varsa bu kullanıcıyı daha sonra da kontrol edebilmek için bir session değişkeninde saklayabiliriz.
        $_SESSION["giris"] = sha1(md5("a"));
        
        //girdikten sonra bir sayfaya yönlendirebiliriz
        echo " <script> window.location.href='anasayfa.php'; </script>";
        
        
    } else {
        echo "<script>
        alert('HATALI KULLANICI BİLGİSİ!'); window.location.href='giris.php';
        </script>";
    }
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yönetici Paneli</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<H4>ADMIN PANEL</H4>
</div>
<!-- /.login-logo -->
<div class="card">
<div class="card-body login-card-body">
  <p class="login-box-msg">Sign in to start your session</p>

  <form action="" method="post">
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="isim" placeholder="Email">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" class="form-control" name="sifre" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

 
<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>



<!-- Bu da kullanilabilir bir css modeli -->
<!-- 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Yönetim Paneli Giriş</title>
</head>
<link rel="stylesheet" href="css/style.css">


<div class="login">
<h1>Login</h1>
<form action="" method="post">
    <b>Kullanıcı Adı:</b><br>
    <input type="text" name="kullanici" size="30" required><br><br>
    <b>Parola:</b><br>
    <input type="password" name="sifre" size="30" required><br><br><br>
   
    <input type="submit" class="btn" value="Giriş Yap">
</form>
</div>




</body>
</html> -->
