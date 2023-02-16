<?php session_start();
include "../../../template/includes/dbcon.php"; 
$code = $_GET['activation_code'];
$username = $_GET['username']; ?>
<!DOCTYPE html>
<html>

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
        <link rel="shortcut icon" href="../../images/favicon.png" />
    </head>
<!--
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg::after {
        content: '';
        height: 100vh;
        width: 100%;
        background-image: url(img/bgimg3.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        display: block;
        filter: blur(0px);
        -webkit-filter: blur(0px);
        transition: all 1000ms;
        }
        .bg:hover::after {
        
        filter: blur(10px);
        -webkit-filter: blur(10px);
        }
        .bg:hover .content {
        filter: blur(0px);
        -webkit-filter: blur(0px);
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
            background: rgba(255, 0, 0, 0.5);
        }

        .content {
        position: absolute;
        z-index: 1;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        filter: blur(10px);
        -webkit-filter: blur(10px);
        }

        .loginBox {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 350px;
        height: 420px;
        padding: 70px 40px;
        box-sizing: border-box;
        background: rgba(0, 0, 0, 0.4);
        }

        .user {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        top: calc(-100px/2);
        left: calc(50% - 50px);
        }

        h2 {
        margin: 0;
        padding: 0 0 26px;
        color: #fff;
        text-align: center;
        }

        h3 {
        margin: 0;
        padding: 0 0 20px;
        color: #fff;
        text-align: center;
        }

        .loginBox p {
        margin: 0;
        padding: 0;
        font-weight: bold;
        color: #fff;
        }

        .loginBox input {
        width: 100%;
        margin-bottom: 20px;
        }

        .loginBox button {
        width: 100%;
        margin-bottom: 20px;
        }


        .loginBox input[type="email"] {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
        }

        ::placeholder
        {
        color: rgba(255, 255, 255, 0.5);
        }

        .loginBox button[type="submit"] {
        border: none;
        outline: none;
        height: 40px;
        color: #eee;
        font-size: 16px;
        cursor: pointer;
        border-radius: 20px;
        margin: 12px 0 18px;
        background: rgba(255,0,0, 0.3);
        }

        .loginBox button[type="submit"]:hover {
        background: rgba(255,0,0, 0.3);
        color: #fff;
        }

        .loginBox a {
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        }
        </style>
-->
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
                        <br>
                        <br>
                        <center><h3>Reset Password</h3></center>
                        
                    </div>
                    <form class="pt-3" method="POST" name="reset">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" id="resetpass" placeholder="Enter New Password" required>
                        </div>
                        <input type="hidden" name="code" value="<?php echo $code;?>" />
                        <div class="mt-3">
                            <center><button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">Submit</button></center>
                        </div>
                    </form>
                    </div>
                        </div>
                    </div>


            <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <?php
        if(isset($_POST['submit'])){
            $code = $_POST['code'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            

                if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                } 
                $admin = mysqli_query($con,"select * from admin where activation_code='".$code."'")or die(mysqli_error($con)); 
                $row = mysqli_num_rows ($admin);

                $user = mysqli_query($con,"select * from user where activation_code='".$code."'")or die(mysqli_error($con)); 
                $row1 = mysqli_num_rows ($user);

                if ($row == 1) {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $query3 = mysqli_query($con,"update admin set password='".$hashedPwd."' where activation_code='".$code."'")or die(mysqli_error($con)); 
                echo "<script>alert('Password successfully changed!'); window.location='login.php'</script>";
                }  
                elseif ($row1 == 1) {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $query3 = mysqli_query($con,"update user set password='".$hashedPwd."' where activation_code='".$code."'")or die(mysqli_error($con)); 
                echo "<script>alert('Password successfully changed!'); window.location='login.php'</script>";
                }   
                else{
                echo "<script>alert('Failed to Reset Password'); window.location='login.php'</script>";
                }
            }
            ?>

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



<!-- (LAZO)
        <div class="footer">
            <p>SFAC-Bacoor Campus | Library Management System | Alrights reserved &copy; <?php echo date('Y') ?><small style="float: right; margin-right: 5px">COMPSOC</small></p>
        </div>
-->

    </body>
</html>
