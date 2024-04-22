
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | All Sales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
?>
<?php
$sales = find_all_sale();
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
                <h3><i class="fa fa-desktop"></i> Sales</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Sales</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 50px;">#</th>
                <th> Product name </th>
                <th class="text-center" style="width: 15%;"> Quantity</th>
                <th class="text-center" style="width: 15%;"> Sale price per each </th>
                <th class="text-center" style="width: 15%;"> Total price </th>
                <th class="text-center" style="width: 15%;"> Date </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php foreach ($sales as $sale):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($sale['name']); ?></td>
               <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
               <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
               <td class="text-center"><?php echo remove_junk($sale['total_price']); ?></td>
               <td class="text-center"><?php echo $sale['date']; ?></td>
               <td class="text-center">
                  <div class="btn-group">
                     <a href="edit-sales.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i> Edit</a>
                     </a>
                     <a href="delete-sales.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> Delete</a>
                     </a>
                  </div>
               </td>
             </tr>
             <?php endforeach;?>
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
