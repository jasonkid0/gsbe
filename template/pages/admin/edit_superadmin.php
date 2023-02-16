<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php'; ?>
<?php
$ID=$_GET['user_id'];

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

          <!-- SETTINGS PANEL -->
          
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
                    $query=mysqli_query($con,"select * from tbl_super_admins where sa_id='$ID'")or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query);
                  ?>       
                  <form method="post" class="forms-sample">
                      
                                <!-- <div class="form-group">
                                    
                                    <div class="col-md-4">
                                        
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control">
                                    </div>
                                </div> -->
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
                                <button type="submit" name="update" class="btn btn-primary me-2">Update</button>
                                <a href="javascript:history.back()"><button type="button" class="btn btn-light">Cancel</button></a>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {
                                                                    
                                $email = $_POST['email'];                              
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                            {
                                mysqli_query($con," UPDATE tbl_super_admins SET email='$email',username='$username', password='$hashedPwd' WHERE sa_id = '$ID' ")or die(mysqli_error($con));
                                echo "<script>alert('Successfully Update Info!'); window.location='super_admin_home.php'</script>";
                            
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