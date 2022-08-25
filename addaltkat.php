
<?php
require("header.php");
include('database_connection.php');
include('session.php');

if (isset($_POST['submit'])) {

    //burada tekrar bir if içinde eğer eklenen kategorli ismi daha önce tabloda var ise ekrana "bu kategori zaten ekli" ifadesi basılıcaka ve
    //addcategory.pp sayfasına yönlendirilecektir.


    if (!empty($_POST['category_name'])) {

        $category_name = $_POST['category_name'];
        $parent_category_id = 0;

        // pdo
        //burada yeni kategori ekleriz veya varolan bir kategoriyi seçeriz. ve tablomuza o kategori ismi ile bir adet daha eleman eklemiş oluruz
        $stmt = $connect->prepare("INSERT INTO tbl_category (category_name, parent_category_id) VALUES (?,?)");

        $stmt->execute(array($category_name,$parent_category_id));

        $lastid = $connect->lastInsertId();

        //echo $lastid;

        // $query ="insert into users(isim,soyisim,email,telefon,adres,sifre) values ('$isim','$soyisim','$email','$telefon','$adres','$sifre')";
        // $run = mysqli_query($connect,$query) or die (mysqli_error());

        if ($stmt) {
            echo "Yeni kategori eklendi";
        } else {
            echo "Bir hata oluştu";
        }
    } else {
        echo "all fields required";
    }
}


//burada eklenen kategori ismi ile gidip min id yi bulucaz bunu da sonraında 


?>



<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SUB CATEGORY</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">SUB CATEGORY</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">ADD SUB CATEGORY</h3>
                </div>


                <form action="altkatform.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alt kategori</label>
                                    <input type="text" class="form-control" name="sub_category_name" placeholder="Alt  Kategori ismi">
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="submit_alt" class="btn btn-primary">EKLE</button>
                    </div>
                </form>



                <!--  -->

                <!--  -->

            </div>
        </div>
    </section>

    <?php
    // $st = $connect->query("SELECT katisim FROM categories ORDER BY id DESC LIMIT 1");
    // $row = $st->fetch();
    // $lastaddedname = $row['katisim'];
    // $sacma = $connect->prepare("SELECT MIN(id) FROM categories Where katisim = ?");
    // $sacma->execute(array($lastaddedname));
    // $lol = $sacma->fetch();
    // foreach ($lol as $value) {
    //     echo $value . ' ';
    // }


    
    ?>
    <!--<h1><?php //echo $lastaddedname; ?></h1>  -->
</div>

</section>

</div>
<?php
require("footer.php");
?>