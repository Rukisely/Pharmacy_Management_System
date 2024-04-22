


<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Add Cashier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password','level' );
   validate_fields($req_fields);

   if(empty($errors)){
        $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
      // $email   = remove_junk($db->escape($_POST['email']));
       $user_level = (int)$db->escape($_POST['level']);
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '2','0'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"User account has been creted! ");
          redirect('cashier.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add-cashier.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add-cashier.php',false);
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
                <h3><i class="fa fa-user-plus"></i> Add Cashier</h3>
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
                  <form method="post" action="add-cashier.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <label><i class="fa fa-user"></i> Cashier Information</label>
                  </div>
                </div>
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="text" class="form-control has-feedback-left" name="full-name" placeholder="Full Name">
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
                    <input type="text" name="username" class="form-control has-feedback-left" placeholder="Username">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
                
                <div class="item form-group">
                  <div class="col-md-8 col-sm-8 offset-md-2">
                    <input type="password" name="password" class="form-control has-feedback-left" placeholder="************">
                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
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
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="add_user" class="btn btn-success">Submit</button>
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
