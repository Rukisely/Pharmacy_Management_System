
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | All Medicine';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
  <?php include 'include/header.php';?>
        <style type="text/css">
          .btn{
            cursor: pointer;
          }
        </style>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-sm-12">
                <?php echo display_msg($msg); ?>
            </div>
              <div class="title_left">
                <h3><i class="fa fa-medkit"></i> Medicine</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Medicines</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add-medicine.php" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Medicine</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 2%;">#</th>
                <th style="width: 15%;"> Product Title </th>
                <th class="text-center" style="width: 10%;"> Categories </th>
                <th class="text-center" style="width: 6%;"> In-Stock </th>
                <th class="text-center" style="width: 10%;"> Buying Price </th>
                <th class="text-center" style="width: 10%;"> Selling Price </th>
                <th class="text-center" style="width: 10%;"> Product Added </th>
                <th class="text-center" style="width: 13%;"> Actions </th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center">
                      <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i> Edit</a>
                    <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
             <?php endforeach; ?>
                      </tbody>
                    </table>
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
