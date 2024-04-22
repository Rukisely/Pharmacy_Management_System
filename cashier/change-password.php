<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Change Password';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php $user = current_user(); ?>
<?php
  if(isset($_POST['update'])){

    $req_fields = array('new-password','id' );
    validate_fields($req_fields);

    if(empty($errors)){


            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['new-password'])));
            $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $session->msg('s',"Login with your new password.");
                  redirect('../index.php', false);
                else:
                  $session->msg('d',' Sorry failed to updated!');
                  redirect('change-password.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('change-password.php',false);
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
                <h3></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form method="post" action="change-password.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <label><i class="fa fa-user"></i> Cashier Change Password</label>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="password" name="new-password" class="form-control has-feedback-left" placeholder="New password">
                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="update" class="btn btn-success">Update</button>
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
