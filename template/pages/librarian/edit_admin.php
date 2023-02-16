<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
$ID=$_GET['admin_id'];
if($_SESSION['role'] == "Super Admin")
{
?>


      <!DOCTYPE html>
      <html lang="en">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GSBE Library System</title>

        <div class="container-scroller">
          <div class="container-fluid page-body-wrapper">

          <!-- SIDEBAR -->
          <?php include '../../includes/sidebar.php'; ?>     

          <div class="main-panel">
            <div class="content-wrapper">
              <div class="input-group">
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                  <p class="card-description">
                    Edit user elements
                  </p>

                  <!-- content starts here -->
                    <?php
                      $query=mysqli_query($con,"select * from admin where admin_id='$ID'")or die(mysql_error());
                      $row=mysqli_fetch_array($query);
                    ?>

                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="first-name">First Name</label>
                      <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="middle-name">Middle Name</label>
                      <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....."  id="middle-name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="last-name">Last Name</label>
                      <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="e-mail">e-Mail Address</label>
                      <input type="email"  value="<?php echo $row['email']; ?>" autocomplete="off" name="email" id="e-mail" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="pass" name="username" value="<?php echo $row['username']; ?>" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password">Confirm Password</label>
                      <input type="password" name="confirm_password" id="password" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary me-2" >Submit</button>
                    <a href="javascript:history.back()"><button type="button" class="btn btn-light">Cancel</button> </a>
                  </form>
                <?php
                  $id =$_GET['admin_id'];
                  if (isset($_POST['update'])) {
                    $firstname = $_POST['firstname'];
                    $middlename = $_POST['middlename'];
                    $lastname = $_POST['lastname'];
                    $activation_code = $_POST['activation_code'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);

                    $still_profile = $row['admin_image'];

                    $result=mysqli_query($con,"select * from admin") or die (mySQL_error());
                    $row=mysqli_num_rows($result);
                    
                    if($password != $confirm_password){

                        if($_SESSION['role']=='Super Admin'){
                                echo "<script>alert('Password do not match!'); window.location='../admin/super_admin_home.php'</script>";
                        }
                    }else{
                    mysqli_query($con," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname',activation_code='$activation_code', email='$email', username='$username', password='$hashedPwd', 
                    confirm_password='$confirm_hashedPwd', admin_image='$still_profile' WHERE admin_id = '$id' ")or die(mysql_error());

                        if($_SESSION['role']=='Super Admin'){
                                echo "<script>alert('Successfully Update Admin Info!'); window.location='../admin/super_admin_home.php'</script>";
                        }
                    }
                  }
                  ?>
                </div>
              </div>
            </div>

                <!-- FOOTER -->
                <?php include '../../includes/footer.php'; ?>
                <!-- FOOTER -->

            </div>
          </div>
        </div>

        <!-- container-scroller -->

        <!-- plugins:js -->
            <?php include '../../includes/scripts.php'; ?>
        <!-- End custom js for this page-->

      </html>

<?php }else{
  header("Location: ../samples/404.php");
} ?>