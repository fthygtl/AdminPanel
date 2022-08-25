<?php

require("header.php");
include("database_connection.php");
include('session.php');
$username = $_SESSION['username'];
//burada get ile tıklanılan userin bilgilerini forma aktardık
$id = $_GET['id'];
$isim = $_GET['isim'];
$soyisim = $_GET['soyisim'];
$email = $_GET['email'];
$telefon = $_GET['telefon'];
$adres = $_GET['adres'];
$sifre = $_GET['sifre'];

//burada post metodu ile yeni bilgileri yazarak update ettik
if (isset($_POST['submit'])) {
    if (!empty($_POST['isim']) && !empty($_POST['soyisim']) && !empty($_POST['email']) && !empty($_POST['telefon']) && !empty($_POST['adres']) && !empty($_POST['sifre'])) {

        $isimyeni = $_POST['isim'];
        $soyisimyeni = $_POST['soyisim'];
        $emailyeni = $_POST['email'];
        $telefonyeni = $_POST['telefon'];
        $adresyeni = $_POST['adres'];
        $sifreyeni = $_POST['sifre'];

        // pdo


        $stmt = $baglan->prepare("UPDATE users SET isim=?, soyisim=?, email=? , telefon=? , adres=? , sifre=? WHERE id=?");
        $stmt->execute([$isimyeni, $soyisimyeni, $emailyeni, $telefonyeni, $adresyeni, $sifreyeni, $id]);

        if ($stmt) {
            echo "kullanıcı update eklendi";
           
        } else {
            echo "Bir hata oluştu";
        }
    } else {
        echo "all fields required";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>UPDATE USER</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User Informations:</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Kullanıcı Adı</label>
                                        <input type="text" class="form-control" value="<?php echo "$isim" ?>" name="isim" placeholder="Kullanıcı Adı">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kullanıcı Soyadı</label>
                                        <input type="text" class="form-control" value="<?php echo "$soyisim" ?>" name="soyisim" placeholder="Kullanıcı Soyadı">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kullanıcı E-mail'i</label>
                                        <input type="email" class="form-control" value="<?php echo "$email" ?>" name="email" placeholder="Kullanıcı E-mail'i">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kullanıcı Telefonu</label>
                                        <input type="password" class="form-control" value="<?php echo "$telefon" ?>" name="telefon" placeholder="Kullanıcı Telefonu">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kullanıcı Adresi</label>
                                        <input type="text" class="form-control" value="<?php echo "$adres" ?>" name="adres" placeholder="Kullanıcı Adresi">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kullanıcı Şifresi</label>
                                        <input type="text" class="form-control" value="<?php echo "$sifre" ?>" name="sifre" placeholder="Kullanıcı Şifresi">
                                    </div>
                                    <!-- burası file uploading için güzel bir html kodu -->
                                    <!-- <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div> -->

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.card -->

                </div>


            </div>
        </section>
        <!-- /.content -->




    </div>
</body>

</html>