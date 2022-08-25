<?php

//index.php

include('database_connection.php');
require('header.php');
include('session.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Remove Dynamic Dependent Select Box using Ajax jQuery with PHP</title>
  <style>
    #errorMs {
      color: #a00;
    }

    .gallery img {
      width: 300px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
$sorgu = $connect->query("SELECT item_id FROM items ORDER BY item_id DESC LIMIT 1");
$row1 = $sorgu->fetch();
$stringlastid  = $row1['item_id'];

?>

<body>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container">
            <h3 align="center">ADD NEW PRODUCT</h3>
            <br />
            <h4 align="center">Enter Item Details</h4>
            <br />
            <form method="post" id="insert_form">
              <div class="table-repsonsive">
                <span id="error"></span>
                <table class="table table-bordered" id="item_table">
                  <thead>
                    <tr>
                      <th>Enter Item Name</th>
                      <th>Enter Item Price</th>
                      <th>Enter Item Quantity</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th><button type="button" name="add" class="btn btn-success btn-xs add"> <span class="glyphicon glyphicon-plus"></span></button></th>

                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
                <div align="center">
                  <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>





    <p id="successMs"></p>
    <p id="errorMs"></p>

    <br>
    <div class="center" style="display: flex; justify-content: center;">
      <form action="upload.php" id="form" method="post" enctype="multipart/form-data">

        <div>
          <input type="file" id="myImage" class="btn btn-primary" style="background-color:#5bc0de;">
        </div>

        <br>
        <div class="a" style="display: flex; justify-content: center;">
          <input type="submit" id="submit" value="Yükle" class="btn btn-primary" style="background-color:#5bc0de; ">
        </div>

      </form>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {

        $("#submit").click(function(e) {
          e.preventDefault();

          let form_data = new FormData();
          let img = $("#myImage")[0].files;

          // Check image selected or not
          if (img.length > 0) {
            form_data.append('my_image', img[0]);

            $.ajax({
              url: 'upload.php',
              type: 'post',
              data: form_data,
              contentType: false,
              processData: false,
              success: function(res) {
                const data = JSON.parse(res);

                if (data.error != 1) {
                  let path = "uploads/" + data.src;
                  $("#preImg").attr("src", path);
                  $("#preImg").fadeOut(1).fadeIn(1000);
                  $("#myImage").val('');

                } else {
                  $("#errorMs").text(data.em);
                }
              }

            });
            $("#successMs").text("Dosya yüklendi.");

          } else {
            $("#errorMs").text("Please select an image.");
          }
        });

      });
    </script>


  </div>





</body>

</html>
<script>
  $(document).ready(function() {

    var count = 0;


    $(document).on('click', '.add', function() {
      count++;
      var html = '';
      html += '<tr>';
      html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
      html += '<td><input type="number" name="item_price[]" class="form-control item_price" /></td>';
      html += '<td><input type="number" name="item_quantity[]" class="form-control item_quantity" /></td>';
      html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="' + count + '"><option value="">Select Category</option><?php echo fill_select_box($connect, "0"); ?></select></td>';
      html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category' + count + '"><option value="">Select Sub Category</option></select></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
      $('tbody').append(html);
    });

    $(document).on('click', '.remove', function() {
      $(this).closest('tr').remove();
    });

    $(document).on('change', '.item_category', function() {
      var category_id = $(this).val();
      var sub_category_id = $(this).data('sub_category_id');
      $.ajax({
        url: "fill_sub_category.php",
        method: "POST",
        data: {
          category_id: category_id
        },
        success: function(data) {
          var html = '<option value="">Select Sub Category</option>';
          html += data;
          $('#item_sub_category' + sub_category_id).html(html);
        }
      })
    });

    $('#insert_form').on('submit', function(event) {
      event.preventDefault();
      var error = '';
      $('.item_name').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Enter Item name at ' + count + ' Row</p>';
          return false;
        }
        count = count + 1;
      });

      $('.item_price').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Enter Item price at ' + count + ' Row</p>';
          return false;
        }
        count = count + 1;
      });

      $('.item_quantity').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Enter Item price at ' + count + ' Row</p>';
          return false;
        }
        count = count + 1;
      });


      $('.item_category').each(function() {
        var count = 1;

        if ($(this).val() == '') {
          error += '<p>Select Item Category at ' + count + ' row</p>';
          return false;
        }

        count = count + 1;

      });

      $('.item_sub_category').each(function() {

        var count = 1;

        if ($(this).val() == '') {
          error += '<p>Select Item Sub category ' + count + ' Row</p> ';
          return false;
        }

        count = count + 1;

      });

      var form_data = $(this).serialize();

      if (error == '') {
        $.ajax({
          url: "insert.php",
          method: "POST",
          data: form_data,
          success: function(data) {
            if (data == 'ok') {
              $('#item_table').find('tr:gt(0)').remove();
              $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
            }
          }
        });
      } else {
        $('#error').html('<div class="alert alert-danger">' + error + '</div>');
      }

    });

  });
</script>