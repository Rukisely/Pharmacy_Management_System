<?php
error_reporting(0);
  $page_title = 'Add Sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
 
?>
<?php
//$products = join_product_table();
$sale = find_by_id('products',(int)$_GET['s_id']);
$product = find_by_id('products',$sale['id']);

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['price']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();
          $s_tot   =   $s_total * $s_qty;
          $total   =   $product['quantity'] - $s_qty;
          if($product['quantity']===0){
            $session->msg('d',"Quantity Remain Is Not Enough. ");
            redirect('add-sales.php', false);

          }
          /*elseif($s_qty > $product['quantity']){
            $session->msg('d',"Quantity Remain is more little in the stock . ");
            redirect('add-sales.php', false);
          }*/
          else{
          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,total_price,date";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_tot}','{$s_date}'";
          $sql .= ")";

          $query   = "UPDATE products SET";
          $query  .="  quantity ='{$total}',";
          $query  .=" WHERE id ='{$product['id']}'";
                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Sale added successfully. ");
                  redirect('add-sales.php', false);
                } else {
                  $session->msg('d',' Sorry failed to add!');
                  redirect('add-sales.php', false);
                }
        }
        }
        else {
           $session->msg("d", $errors);
           redirect('add-sales.php',false);
        }
  }

?>
<?php
  $code = randOrder();

?>
<?php include 'include/header.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-sm-12">
                <?php echo display_msg($msg); ?>
            </div>
              <div class="title_left">

                <h3><i class="fa fa-shopping-cart"></i> Order</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker"></i> Mabibo, Ubungo, Dar Es-Salaam, Tanzania
                        </li>

                        <li>
                          <i class="fa fa-phone"></i> +255 689 052 127
                        </li>
                        <li>
                          <i class="fa fa-envelope"></i> cashier@gmail.com
                        </li>
                        <li>
                          <i class="fa fa-globe"></i> pharmacare.com.ph
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-9 col-sm-9  profile_left">
                    <form id="sug-form" autocomplete="off" method="post" action="#" 
                     data-parsley-validate class="form-horizontal form-label-left">
                      
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Order Number <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" readonly class="form-control" value="<?php echo $code?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Search product name <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" id="sug_input" name="p_name" class="form-control" placeholder="Enter productname to search">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Payment Type <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="text" required="required" class="form-control" placeholder="Cash" readonly style="border:none">
                    </div>
                  </div>
                    <ul class="nav navbar-left panel_toolbox">
                    <button type="submit" class="btn btn-sm btn-success text-white"> Find It</button>
                    </ul>
                    <div id="result" class="list-group"></div>
                  </form>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                    <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price <span class="required">(Tsh.)</span></th>
                          <th>Quantity</th>
                          <th> Date </th>
                          <th> Action</th>
                        </tr>
                      </thead>
                      <?php
 // Auto suggetion
    $html = '';
   if(isset($_POST['product_name']) && strlen($_POST['product_name']))
   {
     $products = find_product_by_title($_POST['product_name']);
     if($products){
        foreach ($products as $product):
           $html .= "<li class=\"list-group-item\">";
           $html .= $product['name'];
           $html .= "</li>";
         endforeach;
      } else {

        $html .= '<li onClick=\"fill(\''.addslashes().'\')\" class=\"list-group-item\">';
        $html .= 'Not found';
        $html .= "</li>";

      }

      echo json_encode($html);
   }
 ?>
                      <?php
  $html ='';
  if(isset($_POST['p_name']) && strlen($_POST['p_name']))
  {
    $product_title = remove_junk($db->escape($_POST['p_name']));
    if($results = find_all_product_info_by_title($product_title)){
        foreach ($results as $result) {
?>
          <form method="post" action="#">

          <tr>
          <td id="s_name"><input type="text" class="form-control" name="" value="<?= $result['name'] ?>" readonly></td>
          <input type="number" name="s_id" value="<?= $result['id']?>">";
          <td><input type="text" class="form-control" name="price" value="<?=$result['sale_price']?>" readonly></td>
          <td id="s_qty"><input type="text" class="form-control" name="quantity" value="1"></td>
          <td><input type="date" class="form-control datePicker" name="date" data-date data-date-format="yyyy-mm-dd"></td>
          <td><button type="submit" name="add_sale" class="btn btn-primary">Add sale</button></td>";
          </tr>
<?php
        }
    } else {
        echo'<tr><td colspan=9><font color=red><center>product name not registered in database</center></font></td></tr>';
    }

  }
?>
                    </table><br><br><br>
                    </div>
                    <div class="col-md-3 col-sm-3  profile_left">
                    </div>
                    <div class="col-md-9 col-sm-9  profile_left">
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
