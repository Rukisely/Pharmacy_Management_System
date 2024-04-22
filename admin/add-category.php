

<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Add Category';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_categories = find_all('categories')
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories (name)";
      $sql .= " VALUES ('{$cat_name}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Category");
        redirect('add-category.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('add-category.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('add-category.php',false);
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
              <div class="title_left">
                <h3><i class="fa fa-list"></i> Add Category</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" name="categorie-name" placeholder="Category Name">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" placeholder="Address">
                    <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="add_cat" class="btn btn-success">Submit</button>
                  </div>
                </div>
                  </form>
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
