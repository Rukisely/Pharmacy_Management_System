<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Profile Update';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
//update user image
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $user_id = (int)$_POST['user_id'];
  $photo->upload($_FILES['file_upload']);
  if($photo->process_user($user_id)){
    $session->msg('s','Profile Pictures Updated Successfully.');
    redirect('profile.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('profile.php');
    }
  }
?>
<?php
 //update user other info
  if(isset($_POST['update'])){
    $req_fields = array('name','username' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$_SESSION['user_id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
    $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Successfully updated ");
            redirect('profile.php', false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('profile.php', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('profile.php',false);
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

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Update Profile Photo</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4">
                <img width="40%" height="50%" style="border-radius:100%;" alt="" src="uploads/users/<?php echo $user['image'];?>" alt="">
            </div>
                  <form id="demo-form2" action="profile.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="file" name="file_upload" class="form-control has-feedback-left" placeholder="Address">
                    <span class="fa fa-camera form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="hidden" name="user_id" value="<?php echo $user['id'];?>">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Update Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" action="profile.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                  <div class="col-md-6 col-sm-4">
                    <input type="text" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>"  class="form-control has-feedback-left" >
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-6 col-sm-4">
                  <input type="text" name="username" value="<?php echo remove_junk(ucwords($user['username'])); ?>"  class="form-control has-feedback-left" >
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <br><br><br><br>
                  <div class="col-md-12 col-sm-12 ">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="update" class="btn btn-success">Submit</button>
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
