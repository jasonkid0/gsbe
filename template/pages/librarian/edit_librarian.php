<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php'; ?>
<?php
$ID=$_GET['admin_id'];

if($_SESSION['role'] == "Super Admin" OR "Adminstrator")
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
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-description">Fill in the blanks</p>
                  <!-- content starts here -->
                  
                  <?php
                    $query=mysqli_query($con,"select * from admin where admin_id='$ID'")or die(mysql_error());
                    $row=mysqli_fetch_array($query);
                  ?>       
                  <form method="post" class="forms-sample">
                    <?php
                        $query=mysqli_query($con,"select * from admin where admin_id='$ID'")or die(mysql_error());
                        $row=mysqli_fetch_array($query);
                        ?>                       
                                <!-- <div class="form-group">
                                    
                                    <div class="col-md-4">
                                        
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="first-name">First Name </label>
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="middle-name">Middle Name <span style="color:red;">(Optional)</span></label>
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="middle-name" class="form-control">     
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">e-Mail Address:
                                    </label>
                                        <input type="email" value="<?php echo $row['email']; ?>" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                        <input type="text" value="<?php echo $row['username']; ?>" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<span style="color:red;">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirm Password<span style="color:red;">*</span></label>
                                        <input type="password" name="confirm_password" id="confirm-password"  class="form-control" required>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary me-2">Update</button>
                                <a href="javascript:history.back()"><button type="button" class="btn btn-light">Cancel</button></a>
                            </form>

                            <?php
                            $id =$_GET['admin_id'];
                            if (isset($_POST['update'])) {
                                                                    
                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];
                            $lastname = $_POST['lastname'];
                            $email = $_POST['email'];
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $confirm_password = $_POST['confirm_password'];
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                            // $admin_type = $_POST['admin_type'];
                            $still_profile = $row['admin_image'];

                            $result=mysqli_query($con,"select * from admin") or die (mySQL_error());
                            $row=mysqli_num_rows($result);

                            if($password != $confirm_password)
                            {
                                if($_SESSION['role']=='Super Admin'){
                                        echo "<script>alert('Password do not match!'); window.location='../admin/super_admin_home.php'</script>";
                                }else{
                                    echo "<script>alert('Password do not match!'); window.location='../librarian/index.php'</script>";
                                }
                            }else{
                            mysqli_query($con," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email', username='$username', password='$hashedPwd', 
                            confirm_password='$confirm_hashedPwd', admin_image='$still_profile' WHERE admin_id = '$id' ")or die(mysql_error());

                                if($_SESSION['role']=='Super Admin'){
                                        echo "<script>alert('Successfully Update Admin Info!'); window.location='../admin/super_admin_home.php'</script>";
                                }else{
                                    echo "<script>alert('Successfully Update Admin Info!'); window.location='../librarian/index.php'</script>";
                                }
                            
                            }
                        } ?>
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