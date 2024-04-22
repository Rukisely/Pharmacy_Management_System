

<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Edit Category';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  //Display all categories.
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing category id.");
    redirect('category.php');
  }
?>

<?php
if(isset($_POST['edit_cat'])){
  $id = (int)$categorie['id'];
  $req_field = array('categorie-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['categorie-name']));
  if(empty($errors)){
        $sql = "UPDATE categories SET name='{$cat_name}'";
       $sql .= " WHERE id='{$db->escape($id)}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated Category");
       redirect('category.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('edit_category.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('edit_category.php',false);
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
                      <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>Editing <?php echo remove_junk(ucfirst($categorie['name']));?></span>
                      </strong>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" method="post" action="edit_category.php?id=<?php echo (int)$categorie['id'];?>" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" placeholder="Category Name" name="categorie-id" value="<?php echo (int)$categorie['id'];?>" readonly>
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                  <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" placeholder="Category Name" name="categorie-name" value="<?php echo remove_junk(ucfirst($categorie['name']));?>">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="edit_cat" class="btn btn-success">Update Category</button>
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
