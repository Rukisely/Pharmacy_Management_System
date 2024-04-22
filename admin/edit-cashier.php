<?php
  error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Edit Cashier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('users',(int)$_GET['id']);
  $groups  = find_all('user_groups');
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('cashier.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('name','username','level');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
       //$email = remove_junk($db->escape($_POST['email']));
          $level = (int)$db->escape($_POST['level']);
       $status   = remove_junk($db->escape($_POST['status']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='2',status='{$status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cashier Acount Successfull Updated ");
            redirect('cashier.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('cashier.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit-cashier.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
// Update user password
if(isset($_POST['update-pass'])) {
  $req_fields = array('password');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_user['id'];
     $password = remove_junk($db->escape($_POST['password']));
     $h_pass   = sha1($password);
          $sql = "UPDATE cashier SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"User password has been updated ");
          redirect('cashier.php?id='.(int)$e_user['id'], false);
        } else {
          $session->msg('d',' Sorry failed to updated user password!');
          redirect('edit-cashier.php?id='.(int)$e_user['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('edit-cashier.php?id='.(int)$e_user['id'],false);
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
                <h3><i class="fa fa-user-plus"></i> Back</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashier Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form method="post" action="edit-cashier.php?id=<?php echo (int)$e_user['id'];?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <label><i class="fa fa-user"></i> Cashier Information</label>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" name="name" value="<?php echo remove_junk(ucwords($e_user['name'])); ?>">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" placeholder="ex. 0687655432">
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <label><i class="fa fa-key"></i> Account Information</label>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" name="username" value="<?php echo remove_junk(ucwords($e_user['username'])); ?>">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" name="level" class="form-control has-feedback-left" value="cashier" readonly>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <select class="form-control" name="status">
                  <option <?php if($e_user['status'] === '1') echo 'selected="selected"';?>value="1">Active</option>
                  <option <?php if($e_user['status'] === '0') echo 'selected="selected"';?> value="0">Deactive</option>
                </select>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="update" class="btn btn-success">Update Cashier</button>
                  </div>
                </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>



            <!-- change-->
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashier Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="edit-cashier.php?id=<?php echo (int)$e_user['id'];?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span><i class="fa fa-user"></i>
                        Change <?php echo remove_junk(ucwords($e_user['name'])); ?> password
                        </strong>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="password" class="form-control has-feedback-left" name="password" placeholder="Type new password">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="update-pass" class="btn btn-success">Change Password</button>
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