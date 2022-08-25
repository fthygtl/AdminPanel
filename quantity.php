<?php
require("header.php");
include('database_connection.php');
include('session.php');

if (isset($_POST['existed']) && !empty($_POST['islem_quantity']) && !empty($_POST['kullanici_name'])) {
    $item_name = $_POST['existed'];
    $kullanici_name = $_POST['kullanici_name'];
    $islem_quantity = $_POST['islem_quantity'];
    $transaction_type = "gelen stok";
    if ($islem_quantity < 0) {
        $transaction_type = "giden stok";
    }

    $stmt = $connect->prepare("SELECT item_quantity FROM items Where item_name = ?");
    $stmt->execute([$item_name]);
    $i = $stmt->fetch();
    $item_sayisi = $i[0];
    //burada çekilen stok sayısı eklenen veya çıkarılan stok sayısı eklenerek veya çıkarılarak güncellenir. (Her iki tabloda da)

    $guncelstok = $item_sayisi + $islem_quantity;

    //sonrasnda tüm valueler insert ifadesi ile tabloya aktarılır.
    $Sorgi = $connect->prepare("INSERT INTO islem (item_name, islem_quantity, transaction_type, kullanici_name, guncel_stok) VALUES (?,?,?,?,?)");

    $Sorgi->execute(array($item_name, $islem_quantity, $transaction_type, $kullanici_name, $guncelstok));
    // Buraya item table kısmını update etme

    $Query = "UPDATE items SET item_quantity=? WHERE item_name=?";
    $connect->prepare($Query)->execute([$guncelstok, $item_name]);


    $pink = "islem basarılı";
}
else{
    $pink = "islem basarısız";
}
?>

<!-- <?php
        $query = "SELECT item_id, item_name FROM items";
        $result = $connect->query($query);
        if ($result->rowCount() > 0) {
            $options = $result->fetchAll();
        }
        ?> -->

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
                    <h3 class="card-title">ÜRÜN SEÇ</h3>
                </div>


                <form action="" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ürünler</label>
                                    <select name="existed" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Ürün Seçiniz</option>



                                        <!-- $result = $sth->fetchAll(); -->
                                        <?php
                                        foreach ($options as $option) {
                                        ?>
                                            <option value="<?php echo $option['item_name']; ?>" selected><?php echo $option['item_name']; ?> </option>
                                        <?php
                                        }
                                        $title = $option['item_id'];
                                        ?>

                                    </select>



                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ekle / Çıkar </label>
                                    <input type="number" class="form-control" name="islem_quantity" placeholder="Çıkarmak için başına - yazınız.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ekle">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail adresiniz giriniz</label>
                                    <input type="text" class="form-control" name="kullanici_name" placeholder="example@gmail.com">
                                </div>



                            </div>
                        </div>
                        <!-- <h1><?php echo $title; ?></h1> -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Ekle/Çıkar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- varolan kategori codes goes here -->
    <br><br>



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