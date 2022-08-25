<?php
require("header.php");
include('database_connection.php');
include('session.php');

$uid = 0;


//kullanıcı ekleme php kodları

if (isset($_POST['submit'])) {
    if (!empty($_POST['isim']) && !empty($_POST['soyisim']) && !empty($_POST['email']) && !empty($_POST['telefon']) && !empty($_POST['adres']) && !empty($_POST['sifre'])) {

        $isim = $_POST['isim'];
        $soyisim = $_POST['soyisim'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];
        $adres = $_POST['adres'];
        $sifre = $_POST['sifre'];
      

        // pdo
   
        $stmt1 = $connect->prepare("INSERT INTO kullanici (uid, isim, sifre) VALUES (?,?,?)");

        $stmt1->execute(array($uid, $isim, $sifre));
        
        $stmt = $connect->prepare("INSERT INTO users (isim, soyisim, email,telefon,adres,sifre) VALUES (?,?,?,?,?,?)");

        $stmt->execute(array($isim, $soyisim, $email, $telefon, $adres, $sifre));

      

       



        // $query ="insert into users(isim,soyisim,email,telefon,adres,sifre) values ('$isim','$soyisim','$email','$telefon','$adres','$sifre')";
        // $run = mysqli_query($connect,$query) or die (mysqli_error());

        if ($stmt) {
            echo "Yeni kullanıcı eklendi";
        } else {
            echo "Bir hata oluştu";
        }
    } else {
        echo "all fields required";
    }

   
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ADD USER</h1>
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
                                    <label for="exampleInputEmail1">Kullanıcı Adı</label>
                                    <input type="text" class="form-control" name="isim" placeholder="Kullanıcı Adı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kullanıcı Soyadı</label>
                                    <input type="text" class="form-control" name="soyisim" placeholder="Kullanıcı Soyadı">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kullanıcı E-mail'i</label>
                                    <input type="email" class="form-control" name="email" placeholder="Kullanıcı E-mail'i">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kullanıcı Telefonu</label>
                                    <input type="password" class="form-control" name="telefon" placeholder="Kullanıcı Telefonu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kullanıcı Adresi</label>
                                    <input type="text" class="form-control" name="adres" placeholder="Kullanıcı Adresi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kullanıcı Şifresi</label>
                                    <input type="text" class="form-control" name="sifre" placeholder="Kullanıcı Şifresi">
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
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!-- /.card -->


            <!-- /.card -->

            <!-- general form elements disabled -->

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php
require("footer.php");
?>