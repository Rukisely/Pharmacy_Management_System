
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Add Medicine';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
$all_categories = find_all('categories');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-categorie','product-title','product-code','product-quantity','buying-price', 'selling-price' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_code  = remove_junk($db->escape($_POST['product-code']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_sale  = remove_junk($db->escape($_POST['selling-price']));
     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,code,quantity,buy_price,sale_price,categorie_id,media_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}','{$p_code}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"New Medicine Successfully added ");
       redirect('medicine.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('add-medicine.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add-medicine.php',false);
   }

 }

?>
  <?php include 'include/header.php';?>
<?php
  $code = randString();

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-sm-12">
                <?php echo display_msg($msg); ?>
            </div>
              <div class="title_left">
                <h4><i class="fa fa-medkit"></i> Add Medicine</h3>
              </div>
            </div>

            <div class="clearfix"></div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Medicine Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" method="post" action="add-medicine.php" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                  <div class="col-md-6 col-sm-4">
                    <input type="text" name="product-code" class="form-control has-feedback-left" placeholder="Medicine Code" value="<?php echo $code ?>" readonly>
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-6 col-sm-4">
                  <select class="form-control" name="product-categorie">
                            <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <br><br><br>
                  <div class="col-md-12 col-sm-12">
                    <input type="text" name="product-title" class="form-control has-feedback-left" placeholder="Medicine Name">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br><br>                  
                  <div class="col-md-4 col-sm-4">
                    <input type="text" name="buying-price" class="form-control has-feedback-left" placeholder="Buyying Price">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" name="selling-price" class="form-control has-feedback-left" placeholder="Selling Price">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="number" name="product-quantity" class="form-control has-feedback-left" placeholder="Quantity">
                    <span class="fa fa-hourglass-o form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-12 col-sm-12 ">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="add_product" class="btn btn-success">Submit</button>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
