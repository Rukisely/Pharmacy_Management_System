

<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | All Category';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_categories = find_all('categories');
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
                <h3><i class="fa fa-medkit"></i> Medicine Category</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Medicine Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add-category.php" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Category</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($all_categories as $cat):?>
                        <tr>
                          <td class="text-center"><?php echo count_id();?></td>
                          <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                          <td>
                              <a href="edit_category.php?id=<?php echo (int)$cat['id'];?>"   class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                              <a href="delete_category.php?id=<?php echo (int)$cat['id'];?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
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
