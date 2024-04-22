
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | All Cashier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_users = find_all_cashier();
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
                <h3><i class="fa fa-user"></i> Cashier</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Cashiers</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add-cashier.php" class="btn btn-sm btn-info text-white"><i class="fa fa-user-plus"></i> Add Cashier</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 10px;">#</th>
                          <th>Name </th>
                          <th>Username</th>
                          <th class="text-center" style="width: 15%;">User Role</th>
                          <th class="text-center" style="width: 10%;">Status</th>
                          <th class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <?php foreach($all_users as $a_user): ?>
                        <td class="text-center"><?php echo count_id();?></td>
                        <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
                        <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
                        <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
                        <td class="text-center">
                        <?php if($a_user['status'] === '1'): ?>
                          <span class="btn btn-sm btn-success text-white"><?php echo "Active"; ?></span>
                        <?php else: ?>
                          <span class="btn btn-sm btn-danger text-white"><?php echo "Deactive"; ?></span>
                        <?php endif;?>
                        </td>
                        <?php //echo read_date($a_user['last_login'])?>
                          <td>
                              <a href="edit-cashier.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                              <a href="delete-cashier.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
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
