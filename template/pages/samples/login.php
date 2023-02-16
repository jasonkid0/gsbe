<?php session_start();
include "../../../template/includes/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GSBE </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../css/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../css/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../css/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../css/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../css/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../css/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../template/images/logo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <center><img src="../../../template/images/logo.png" alt="logo"></center>
                <p></p>
                <center><h2>GSBE Library System</h2></center>
                
                
              </div>
              
              <center><h6 class="fw-light">Sign in to continue.</h6></center>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Password" required>

                </div>

                <center><div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn_login">SIGN IN</a>
                </div></center>

                <center><div class="">
                  <a href="forgot_pass.php" class="auth-link text-black">Forgot password?</a>
                </div></center>

<!-- (HIDDEN) LAZO
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook me-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
<--

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

<?php
        include "../../includes/dbcon.php";
        if(isset($_POST['btn_login'])) 
        { 
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $password = mysqli_real_escape_string($con, $_POST['password']);


            $super_admin = mysqli_query($con, "SELECT * from tbl_super_admins where username = '$username' ");
            $numrow2 = mysqli_num_rows($super_admin);

            $admin = mysqli_query($con, "SELECT * from admin where username = '$username' ");
            $numrow = mysqli_num_rows($admin);

            $student = mysqli_query($con, "SELECT * from user where username = '$username' ");
            $numrow1 = mysqli_num_rows($student);

            if($numrow > 0)
            {   
                while($row = mysqli_fetch_array($admin))
                {
                  $hashedPwdCheck = password_verify($password, $row['password']);
                  if ($hashedPwdCheck == false) 
                  {
                    echo "<script>alert('Username or Password do not match!'); window.location='login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck == true) 
                  {
                    $_SESSION['role'] = "Administrator";
                    $_SESSION['userid'] = $row['admin_id'];
                  }    
                  echo "<script>alert('Login Successfully!'); window.location='../librarian/index.php'</script>";
                }
            }
            elseif($numrow1 > 0)
              {   
                while($row = mysqli_fetch_array($student))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Username or Password do not match!'); window.location='login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Student";
                   $_SESSION['userid'] = $row['user_id'];
                  } 
                  echo "<script>alert('Login Successfully!'); window.location='../students/students_home.php'</script>";
                }
              }
            elseif($numrow2 > 0)
              {   
                while($row = mysqli_fetch_array($super_admin))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Username or Password do not match!'); window.location='login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Super Admin";
                   $_SESSION['userid'] = $row['sa_id'];
                  } 
                  echo "<script>alert('Login Successfully!'); window.location='../admin/super_admin_home.php'</script>";
                }
              }
             else
                {
                echo "<script>alert('Invalid Account!'); window.location='login.php'</script>";
                }
             
        }
        
      ?>

</html>
