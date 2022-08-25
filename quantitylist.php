<?php
require("header.php");
include('database_connection.php');
include('session.php');
$stmt = $connect->prepare("SELECT islem_id, item_name, islem_quantity, transaction_type, kullanici_name, guncel_stok FROM islem");
$stmt->execute();



?>
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LOG DATA TABLE</h3>
            </div>

            <div class="card-body">

              <table id="example2" class="table table-bordered table-hover">
              
                <thead>
                  <tr>
                    <th>İşlem Id</th>
                    <th>Ürün İsmi</th>
                    <th>Eklenen/Çıkarılan Sayı</th>
                    <th>İşlem Türü</th>
                    <th>Kullanıcı İsmi</th>
                    <th>Güncel Stok</th>
                    <!-- <th>Sifre</th> -->
                    <th>EDIT</th>
                    <th colspan="2" align="center">DELETE</th>
                  </tr>
                </thead>
                <tbody>
                 <!-- belki html inside php kodu burada da kullanılabilir.   -->
                 <?php 
            if ($stmt->rowCount() != 0){


              //eğer alt satır çalışmazsa whilein içine bunu deneyebilirsin $result = $stmt->fetchAll(); 
              while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            
                echo "
                <tr>
                <td>".$result['islem_id']."</td>
                <td>".$result['item_name']."</td>
                <td>".$result['islem_quantity']."</td>
                <td>".$result['transaction_type']."</td>
                <td>".$result['kullanici_name']."</td>
                <td>".$result['guncel_stok']."</td>
                <td><a href='updatequantity.php? islem_id=$result[islem_id] & item_name=$result[item_name] & islem_quantity=$result[islem_quantity] & transaction_type=$result[transaction_type] & kullanici_name=$result[kullanici_name] & guncel_stok=$result[guncel_stok]'>Edit/ Update</a></td>
                <td><a href='updatequantity.php? islem_id=$result[islem_id] & item_name=$result[item_name] & islem_quantity=$result[islem_quantity] & transaction_type=$result[transaction_type] & kullanici_name=$result[kullanici_name] & guncel_stok=$result[guncel_stok]'>Delete</a></td>


               
                  
                ";
            
              }
            
            }


            // Buradan  edit butonuna devam
            
            
            ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>

<?php
require("footer.php");
?>