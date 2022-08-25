<?php 

include('database_connection.php');
require('header.php');
include('session.php');

$lastid = $connect->lastInsertId();

//to find last inserted id
$sorgu = $connect->query("SELECT category_id FROM tbl_category ORDER BY category_id DESC LIMIT 1");
$row1 = $sorgu->fetch();
$stringlastid  = $row1['category_id'];

// $lastid = $connect->lastInsertId();

if (isset($_POST['submit_alt'])) {

    //burada tekrar bir if içinde eğer eklenen kategori ismi daha önce tabloda var ise ekrana "bu kategori zaten ekli" ifadesi basılıcaka ve
    //addcategory.pp sayfasına yönlendirilecektir.


    if (!empty($_POST['sub_category_name'])) {

        $sub_category_name = $_POST['sub_category_name'];
        $parent_id = $stringlastid; 

        // pdo
        //burada yeni kategori ekleriz veya varolan bir kategoriyi seçeriz. ve tablomuza o kategori ismi ile bir adet daha eleman eklemiş oluruz
        $stmt = $connect->prepare("INSERT INTO tbl_category (category_name, parent_category_id) VALUES (?,?)");
        
        $stmt->execute(array($sub_category_name,$parent_id));

        // $lastid = $connect->lastInsertId();

        //echo $lastid;

        // $query ="insert into users(isim,soyisim,email,telefon,adres,sifre) values ('$isim','$soyisim','$email','$telefon','$adres','$sifre')";
        // $run = mysqli_query($connect,$query) or die (mysqli_error());

    } else {
        echo "all fields required";
    }
}


//eğer bir post var ise bunları update value ile databeseye atıcaz

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
    <?php 
     if ($stmt) {
        echo "<h1>Yeni alt kategori eklendi</h1>";
        
    } else {
        echo "Bir hata oluştu";
    }
    ?>

<h1><a href="anasayfa.php">Yeni Ürün Ekle</a></h1>  
<br>
<h1><a href="anasayfa.php">Anasayfaya dönün</a></h1>


</div>
</body>
</html>