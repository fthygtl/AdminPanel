<?php
require("header.php");
include('database_connection.php');
include('session.php');

$query = "SELECT category_id, category_name FROM tbl_category";
$result = $connect->query($query);
if ($result->rowCount() > 0) {
    $options = $result->fetchAll();
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CATEGORY</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">CATEGORY</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- varolan kategori codes goes here -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Kategori Ekle</h3>
                </div>


                <form action="subcatforexistedcat.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Varolan kategori</label>
                                    <select name="existed" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Kategori ismi</option>



                                        <!-- $result = $sth->fetchAll(); -->
                                        <?php
                                        foreach ($options as $option) {
                                        ?>
                                            <option value="<?php echo $option['category_name']; ?>" selected><?php echo $option['category_name']; ?> </option>
                                        <?php
                                        }
                                        $title = $option['category_id'];    
                                        ?>

                                    </select>



                                </div>
                            </div>
                        </div>
                    

                       

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">SEÇ</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- varolan kategori codes goes here -->
    <br><br>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Kategori Ekle</h3>
                </div>

                <!--  tbl_category
category_id	
category_name	
parent_category_id	 -->
                <form action="addaltkat.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Yeni kategori ekle</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Kategori ismi">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">EKLE</button>
                    </div>
                </form>



                <!--  -->

                <!--  -->

            </div>
        </div>
    </section>



</div>



<?php
require("footer.php");
// $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
// $stmt->execute([$id]); 
// $user = $stmt->fetch();


// $sacma = $connect->prepare("SELECT min(id) FROM categories Where katisim = ?");
// $sacma->execute([$option]);
// $lol = $sacma->fetch();
// $ty = gettype($lol);
// echo $ty;

?>