<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
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
                  <h4 class="card-title">Add User</h4>
                  <p class="card-description">
                    Add user elements
                  </p>

                  <!-- content starts here -->
                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="id-no">ID Number<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="student_number" id="id-no" required="required" class="form-control">
                    </div>
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
                      <label for="contact-no">Contact Number</label>
                      <input type="tel" autocomplete="off"  maxlength="11" name="contact"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="e-mail">e-Mail Address</label>
                      <input type="email" autocomplete="off" name="email" id="e-mail" placeholder="e.g. sample@email.com" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender<span class="required" style="color:red;">*</span></label>
                        <select name="gender" tabindex="-1" class="form-control" required="required">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="type">Type<span class="required" style="color:red;">*</span></label>
                        <select name="type" class="form-control" tabindex="-1" required="required">
                          <option value="Student">Student</option>
                          <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="level">Level<span class="required" style="color:red;">*</span></label>
                        <select name="level" class="form-control" tabindex="-1" required="required">
                          <option value="Elementary">Elementary</option>
                          <option value="Highschool">High School</option>
                          <option value="Senior Highschool">Senior Highschool</option>
                          <option value="College">College</option>
                          <option value="Faculty">Faculty</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="section">Section</label>
                      <input type="text" name="section" placeholder="Section or Course" id="section" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="activation_code" id="activation_code" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="username">Username<span class="required" style="color:red;">*</label>
                      <input type="pass" name="username" id="username" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                      <label for="password">Password<span class="required" style="color:red;">*</label>
                      <input type="password" name="password" id="password" required="required" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary me-2" >Submit</button>
                    <a href="student_search.php"><button type="button" class="btn btn-light">Cancel</button> </a>
                  </form>
                <?php 
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
                    $username =mysqli_real_escape_string($con,$_POST['username']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);
                    
                    $result=mysqli_query($con,"SELECT * from user WHERE student_number='$student_number' ") or die (mySQLi_error());
                    $row=mysqli_num_rows($result);
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    
                    if ($row > 0)
                    {
                    echo "<script>alert('ID Number already active!'); window.location='add_student.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"INSERT into user (student_number,firstname, middlename, lastname, contact, email, gender, address, type, level, section, status, user_added, activation_code,  username, password)
                        values ('$student_number','$firstname', '$middlename', '$lastname', '$contact', '$email', '$gender', '$address', '$type', '$level', '$section', 'Active', NOW(), '$activation_code', '$username','$hashedPwd')")or die(mysql_error());
                        echo "<script>alert('User successfully added!'); window.location='add_student.php'</script>";
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