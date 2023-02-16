<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
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
                  <h4 class="card-title">Add Librarian</h4>
                  <p class="card-description">
                    Add user elements
                  </p>

                  <!-- content starts here -->
                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="first-name">First Name<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="firstname" id="first-name" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="middle-name">Middle Name</label>
                      <input type="text" name="middlename" placeholder="MI / Middle Name....."  id="middle-name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="last-name">Last Name<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="lastname" id="last-name" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="e-mail">e-Mail Address</label>
                      <input type="email" autocomplete="off" name="email" id="e-mail" placeholder="e.g. sample@email.com" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="pass" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password">Password<span class="required" style="color:red;">*</span></label>
                      <input type="password" name="password" id="password" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password">Confirm Password<span class="required" style="color:red;">*</span></label>
                      <input type="password" name="confirm_password" id="password" required="required" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                      <label for="password">Librarian Image</label>
                      <input type="file" name="image" id="password" class="form-control">
                    </div> -->
                    <button type="submit" name="update" class="btn btn-primary me-2" >Submit</button>
                    <a href="../admin/super_admin_home.php"><button type="button" class="btn btn-light">Cancel</button> </a>
                  </form>
                <?php 
                  if (isset($_POST['update'])) {
                    // $check = getimagesize($_FILES["image"]["tmp_name"]);
                    // if($check !== false){
                    //     $image = $_FILES['image']['tmp_name'];
                    //     $imgContent = addslashes(file_get_contents($image));
                        $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                        $middlename = mysqli_real_escape_string($con,$_POST['middlename']);
                        $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                        $activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
                        $email = mysqli_real_escape_string($con,$_POST['email']);
                        $username =mysqli_real_escape_string($con,$_POST['username']);
                        $password = mysqli_real_escape_string($con,$_POST['password']);
                        $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);                        
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                    
                    
                        if($password != $confirm_password){
                          echo "<script>alert('Password do not match!'); window.location='super_admin_home.php'</script>";

                        }else{
                          mysqli_query($con,"INSERT into admin (firstname, middlename, lastname, activation_code, email, username, password, confirm_password, admin_image, admin_added)
                          values ('$firstname', '$middlename', '$lastname', '$activation_code', '$email','$username','$hashedPwd', '$confirm_hashedPwd','$image', NOW() )")or die(mysql_error());
                          echo "<script>alert('Librarian successfully added!'); window.location='librarian_list.php'</script>";
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