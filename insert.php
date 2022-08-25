<?php

//insert.php;
include('session.php');

if(isset($_POST["item_name"]))
{
 include('database_connection.php');

 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {
  $data = array(
   ':item_name'   => $_POST["item_name"][$count],
   ':item_price'   => $_POST["item_price"][$count],
   ':item_quantity'   => $_POST["item_quantity"][$count],
   ':item_category_id'  => $_POST["item_category"][$count],
   ':item_sub_category_id' => $_POST["item_sub_category"][$count]
  );

  $query = "
   INSERT INTO items 
       (item_name, item_price ,item_quantity,item_category_id, item_sub_category_id) 
       VALUES (:item_name, :item_price,:item_quantity, :item_category_id, :item_sub_category_id)
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);
 }

 echo 'ok';
}


?>
