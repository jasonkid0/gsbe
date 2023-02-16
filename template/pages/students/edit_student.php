<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
$ID=$_GET['user_id'];
if($_SESSION['role'] == "Administrator")
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
                      $query=mysqli_query($con,"select * from user where user_id='$ID'")or die(mysql_error());
                      $row=mysqli_fetch_array($query);
                    ?>

                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="id-no">ID Number</label>
                      <input type="text" value="<?php echo $row['student_number']; ?>" name="student_number" id="id-no" class="form-control">
                    </div>
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
                      <label for="contact-no">Contact Number</label>
                      <input type="tel" value="<?php echo $row['contact']; ?>" autocomplete="off"  maxlength="11" name="contact"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="e-mail">e-Mail Address</label>
                      <input type="email"  value="<?php echo $row['email']; ?>" autocomplete="off" name="email" id="e-mail" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender</label>
                        <select name="gender" tabindex="-1" class="form-control">
                          <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?>
                          </option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" value="<?php echo $row['address']; ?>" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="type">Type</label>
                        <select name="type" class="form-control" tabindex="-1">
                          <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                          <option value="Student">Student</option>
                          <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="level">Level</label>
                        <select name="level" class="form-control" tabindex="-1" >
                          <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                          <option value="Elementary">Elementary</option>
                          <option value="Highschool">High School</option>
                          <option value="Senior Highschool">Senior Highschool</option>
                          <option value="College">College</option>
                          <option value="Faculty">Faculty</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="section">Section</label>
                      <input type="text" name="section" value="<?php echo $row['section']; ?>" placeholder="Section..." id="section" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="activation_code" value="<?php echo $row['activation_code']; ?>"  id="activation_code" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="pass" name="username" value="<?php echo $row['username']; ?>" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary me-2" >Submit</button>
                    <a href="student_search.php"><button type="button" class="btn btn-light">Cancel</button> </a>
                  </form>
                <?php
                  $id =$_GET['user_id'];
                  if (isset($_POST['update'])) {
                    $student_number = mysqli_real_escape_string($con,$_POST['student_number']);
                    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                    $middlename = mysqli_real_escape_string($con,$_POST['middlename']);
                    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                    $contact = mysqli_real_escape_string($con,$_POST['contact']);
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $gender = mysqli_real_escape_string($con,$_POST['gender']);
                    $address = mysqli_real_escape_string($con,$_POST['address']);
                    $type = mysqli_real_escape_string($con,$_POST['type']);
                    $level = mysqli_real_escape_string($con,$_POST['level']);
                    $section = mysqli_real_escape_string($con,$_POST['section']);
                    $activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
                    $username = mysqli_real_escape_string($con,$_POST['username']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    
                    mysqli_query($con," UPDATE user SET student_number='$student_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', email='$email', 
                    gender='$gender', address='$address', type='$type', level='$level', section='$section',activation_code='$activation_code', username='$username', password='$hashedPwd' WHERE user_id = '$id' ")or die(mysqli_error());                 
                    
                    echo "<script>alert('Successfully Updated User Info!'); window.location='student_search.php'</script>";
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