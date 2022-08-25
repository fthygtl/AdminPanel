<?php
require("header.php");
include('database_connection.php');
include('session.php');

if (isset($_POST['existed'])) {
    $category_name = $_POST['existed'];
    $sorgu = $connect->prepare("SELECT category_id FROM tbl_category WHERE category_name = ?");
    $sorgu->execute(array($category_name));
    $parent_category_id = $sorgu->fetch();
    $row = $parent_category_id[0];
    //burada seçtiğimiz elemanın sub category idsini buluyoruz
    // $stmt = $connect->prepare("INSERT INTO tbl_category (category_name, parent_category_id) VALUES (?,?)");
    // $stmt->execute(array($category_name, $row));
}

$_SESSION['superhero'] = $row;
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


                <form action="altkatformexistedcat" method="POST">
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
                        <button type="submit" name="submit_existed" class="btn btn-primary">EKLE</button>
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

</div>

</section>

</div>
<?php
require("footer.php");


?>