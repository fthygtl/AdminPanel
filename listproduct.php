<?php
require("header.php");
include('database_connection.php');
include('session.php');
$stmt = $connect->prepare("SELECT item_id, item_name, item_category_id, item_sub_category_id  FROM items");
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
              <h3 class="card-title">PRODUCT DATA TABLE</h3>
            </div>

            <div class="card-body">

              <table id="example2" class="table table-bordered table-hover">
              
                <thead>
                  <tr>
                    <th>Item Id</th>
                    <th>Item Name</th>
                    <th>Category Id</th>
                    <th>Sub Category Id</th>
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
                <td>".$result['item_id']."</td>
                <td>".$result['item_name']."</td>
                <td>".$result['item_category_id']."</td>
                <td>".$result['item_sub_category_id']."</td>
                <td><a href='updateproduct.php? item_id=$result[item_id] & item_name=$result[item_name] & item_category_id=$result[item_category_id] & item_sub_category_id=$result[item_sub_category_id]'>Edit/ Update</a></td>
                <td><a href='updateproduct.php? item_id=$result[item_id] & item_name=$result[item_name] & item_category_id=$result[item_category_id] & item_sub_category_id=$result[item_sub_category_id]'>Delete</a></td>
                  
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