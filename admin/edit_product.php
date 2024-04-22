



<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Edit product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);

$product = find_by_id('products',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$product){
  $session->msg("d","Missing product id.");
 redirect('medicine.php');
}
?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'selling-price' );
    validate_fields($req_fields);

   if(empty($errors)){
    $id = (int)$product['id'];
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       $p_sale  = remove_junk($db->escape($_POST['selling-price']));
       if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
         $media_id = '0';
       } else {
         $media_id = remove_junk($db->escape($_POST['product-photo']));
       }
       $query   = "UPDATE products SET";
       $query  .=" name ='{$p_name}', quantity ='{$p_qty}',";
       $query  .=" buy_price ='{$p_buy}', sale_price ='{$p_sale}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Product Successfully updated ");
                 redirect('medicine.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_product.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_product.php?id='.$product['id'], false);
   }

 }

?>
<?php include 'include/header.php';?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-sm-12">
                <?php echo display_msg($msg); ?>
            </div>
            </div>

            <div class="clearfix"></div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Medicine Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" method="post" action="edit_product.php?id=<?php echo (int)$product['id'] ?>" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                  <div class="col-md-12 col-sm-4">
                  <select class="form-control" name="product-categorie">
                            <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['name']); ?></option>
                   <?php endforeach; ?>
                    </select>
                  </div>
                  <br><br><br>
                  <div class="col-md-12 col-sm-12">
                    <input type="text" name="product-title" value="<?php echo remove_junk($product['name']);?>" class="form-control has-feedback-left" placeholder="Medicine Name">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br><br>                  
                  <div class="col-md-4 col-sm-4">
                    <input type="text" name="buying-price" value="<?php echo remove_junk($product['buy_price']);?>" class="form-control has-feedback-left" placeholder="Buyying Price">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" name="selling-price" value="<?php echo remove_junk($product['sale_price']);?>" class="form-control has-feedback-left" placeholder="Selling Price">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="number" name="product-quantity" value="<?php echo remove_junk($product['quantity']); ?>" class="form-control has-feedback-left" placeholder="Quantity">
                    <span class="fa fa-hourglass-o form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-12 col-sm-12 ">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="product" class="btn btn-success">Update</button>
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