<?php
require("header.php");
include('database_connection.php');
include('session.php');
$stmt = $connect->prepare("SELECT id, isim, soyisim, email, telefon, adres,sifre FROM users");
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
              <h3 class="card-title">USER DATA TABLE</h3>
            </div>

            <div class="card-body">

              <table id="example2" class="table table-bordered table-hover">
              
                <thead>
                  <tr>
                    <th>Kullanıcı Id</th>
                    <th>Kullanıcı ismi</th>
                    <th>Kullanıcı Soyismi</th>
                    <th>E-mail</th>
                    <th>Telefon</th>
                    <th>Adres</th>
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
                <td>".$result['id']."</td>
                <td>".$result['isim']."</td>
                <td>".$result['soyisim']."</td>
                <td>".$result['email']."</td>
                <td>".$result['telefon']."</td>
                <td>".$result['adres']."</td>
                // <td>".$result['sifre']."</td>
                <td><a href='updatedeleteuser.php? id=$result[id] & isim=$result[isim] & soyisim=$result[soyisim] & email=$result[email] & telefon=$result[telefon] & adres=$result[adres] & sifre=$result[sifre]'>Edit/ Update</a></td>
                <td><a href='Odelete.php?id=$result[id] & isim=$result[isim] & soyisim=$result[soyisim] & email=$result[email]'>DELETE</a></td>
                  
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