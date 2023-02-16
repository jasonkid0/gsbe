<?php include 'session.php';
      include 'dbcon.php';
      ?>

<?php
if($_SESSION['role'] == "Administrator"){
      echo '
 
          <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row ">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                  <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                      <span class="icon-menu"></span>
                    </button>
                  </div>
                  <div>
                    <a class="navbar-brand brand-logo" href="../../pages/librarian/index.php">
                      <img src="../../images/logo.png" alt="logo"/><p>GSBE</p>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="../../pages/librarian/index.php">
                      <img src="../../images/logo.png" alt="logo"/>
                    </a>
                  </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-top"> 
                  <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">

                      <!--Name Catch for the index page-->
                      <h1 class="welcome-text">Good Day, <span class="text-black fw-bold">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Administrator"){
                                              $user = mysqli_query($con,"SELECT * from admin where admin_id = '".$_SESSION['userid']."' ");
                                              while($row = mysqli_fetch_array($user)){
                                                  $_SESSION['user'] = $row['firstname'];
                                                  echo $row['firstname'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></h1>


                      <h3 class="welcome-sub-text">Welcome to GSBE Library Management System </h3>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto">
                    
                    
                    <li class="nav-item dropdown d-lg-block user-dropdown">
                      <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <h1 class="welcome-text"> <span class="fw-light text-muted mb-0">';  ?>
                      <?php
                                        if($_SESSION['role'] == "Administrator"){
                                            $user = mysqli_query($con,"SELECT * from admin where admin_id = '".$_SESSION['userid']."' ");
                                            while($row = mysqli_fetch_array($user)){
                                                $_SESSION['user'] = $row['firstname'];
                                                echo $row['firstname'];
                                            }
                                        }
                                        ?>
                                        <?php echo'</span></h1> </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                          <!--Name Catch for the index page-->
                      <h4> <span class="fw-light text-muted mb-0">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Administrator"){
                                              $user = mysqli_query($con,"SELECT * from admin where admin_id = '".$_SESSION['userid']."' ");
                                              while($row = mysqli_fetch_array($user)){
                                                  $_SESSION['user'] = $row['firstname'];
                                                  echo $row['firstname'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></h4>

                      <p> <span class="fw-light text-muted mb-0">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Administrator"){
                                              $user = mysqli_query($con,"SELECT * from admin where admin_id = '".$_SESSION['userid']."' ");
                                              while($row = mysqli_fetch_array($user)){
                                                  $_SESSION['user'] = $row['firstname'];
                                                  echo $row['email'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></p>


                        </div>'; 
                        if ($_SESSION['role'] == "Administrator") {
                          $result= mysqli_query($con,"select * from admin where admin_id = '".$_SESSION['userid']."' ") or die (mysql_error());
                        while ($row= mysqli_fetch_array ($result) ){
                          $id=$row['admin_id'];
                        echo '
                        <a href="../librarian/edit_librarian.php?admin_id='.$id.'" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Edit Profile </a>

                        <!-- Signout/Logout Button -->
                        <a class="dropdown-item" href="../../pages/samples/logout.php"> <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Sign Out</a>


                      </div>
                    </li>
                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>

              

    '; }
    }
  }

elseif($_SESSION['role'] == "Super Admin"){
      echo '
 
          <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row ">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                  <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                      <span class="icon-menu"></span>
                    </button>
                  </div>
                  <div>
                    <a class="navbar-brand brand-logo" href="../../pages/admin/super_admin_home.php">
                      <img src="../../images/logo.png" alt="logo"/><p>GSBE</p>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="../../pages/admin/super_admin_home.php">
                      <img src="../../images/logo.png" alt="logo"/>
                    </a>
                  </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-top"> 
                  <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">

                      <!--Name Catch for the index page-->
                      <h1 class="welcome-text">Good Day, <span class="text-black fw-bold">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Super Admin"){
                                              $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ");
                                              while($row = mysqli_fetch_array($user)){
                                                  $_SESSION['user'] = $row['super_admin'];
                                                  echo $row['super_admin'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></h1>


                      <h3 class="welcome-sub-text">Welcome to GSBE Library Management System </h3>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto">
                                     
                    <li class="nav-item dropdown d-lg-block user-dropdown">
                      <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <h1 class="welcome-text"> <span class="fw-light text-muted mb-0">';  ?>
                      <?php
                                        if($_SESSION['role'] == "Super Admin"){
                                            $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ");
                                            while($row = mysqli_fetch_array($user)){
                                                $_SESSION['user'] = $row['super_admin'];
                                                echo $row['super_admin'];
                                            }
                                        }
                                        ?>
                                        <?php echo'</span></h1> </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                          <!--Name Catch for the index page-->
                      <h4> <span class="fw-light text-muted mb-0">';  ?>
                        <?php
                                          $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ");
                                          while($row = mysqli_fetch_array($user)){
                                              $_SESSION['user'] = $row['super_admin'];
                                              echo $row['super_admin'];
                                              }
                                          ?>
                                          <?php echo'</span></h4>

                      <p> <span class="fw-light text-muted mb-0">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Super Admin"){
                                              $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ");
                                              while($row = mysqli_fetch_array($user)){
                                                  $_SESSION['user'] = $row['super_admin'];
                                                  echo $row['email'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></p>


                        </div>';
                        if ($_SESSION['role'] == "Super Admin") {
                          $result= mysqli_query($con,"select * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ") or die (mysql_error());
                        while ($row= mysqli_fetch_array ($result) ){
                          $id=$row['sa_id'];
                        echo '
                        <a href="../admin/edit_superadmin.php?user_id='.$id.'" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Edit Profile </a>

                        <!-- Signout/Logout Button -->
                        <a class="dropdown-item" href="../../pages/samples/logout.php"> <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Sign Out</a>


                      </div>
                    </li>
                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>

              
    '; }
  }
}
    
    elseif($_SESSION['role'] == "Student"){
      echo '
 
          <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row ">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                  <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                      <span class="icon-menu"></span>
                    </button>
                  </div>
                  <div>
                    <a class="navbar-brand brand-logo" href="../../pages/students/students_home.php">
                      <img src="../../images/logo.png" alt="logo"/><p>GSBE</p>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="../../pages/students/students_home.php">
                      <img src="../../images/logo.png" alt="logo"/>
                    </a>
                  </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-top"> 
                  <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">

                      <!--Name Catch for the index page-->
                      <h1 class="welcome-text">Good Day, <span class="text-black fw-bold">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Student"){
                                            $user = mysqli_query($con,"SELECT * from user where user_id = '".$_SESSION['userid']."' ");
                                            while($row = mysqli_fetch_array($user)){
                                                $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
                                                echo $row['firstname'].' '.$row['lastname'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></h1>


                      <h3 class="welcome-sub-text">Welcome to GSBE Library Management System </h3>
                    </li>
                  </ul>
                  <ul class="navbar-nav ms-auto">                   
                    
                    <li class="nav-item dropdown d-lg-block user-dropdown">
                      <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <h1 class="welcome-text"> <span class="fw-light text-muted mb-0">';  ?>
                      <?php
                                        if($_SESSION['role'] == "Student"){
                                          $user = mysqli_query($con,"SELECT * from user where user_id = '".$_SESSION['userid']."' ");
                                          while($row = mysqli_fetch_array($user)){
                                              $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
                                              echo $row['firstname'].' '.$row['lastname'];
                                            }
                                        }
                                        ?>
                                        <?php echo'</span></h1> </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                          <!--Name Catch for the index page-->
                      <h4> <span class="fw-light text-muted mb-0">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Student"){
                                            $user = mysqli_query($con,"SELECT * from user where user_id = '".$_SESSION['userid']."' ");
                                            while($row = mysqli_fetch_array($user)){
                                                $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
                                                echo $row['firstname'].' '.$row['lastname'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></h4>

                      <p> <span class="fw-light text-muted mb-0">';  ?>
                        <?php
                                          if($_SESSION['role'] == "Student"){
                                            $user = mysqli_query($con,"SELECT * from user where user_id = '".$_SESSION['userid']."' ");
                                            while($row = mysqli_fetch_array($user)){
                                                $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
                                                echo $row['email'];
                                              }
                                          }
                                          ?>
                                          <?php echo'</span></p>


                        </div>';
                        if ($_SESSION['role'] == "Student") {
                          $result= mysqli_query($con,"select * from user where user_id = '".$_SESSION['userid']."' ") or die (mysql_error());
                        while ($row= mysqli_fetch_array ($result) ){
                          $id=$row['user_id'];
                        echo '
                        <a href="../students/edit_user.php?user_id='.$id.'" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Edit Profile </a>

                        <!-- Signout/Logout Button -->
                        <a class="dropdown-item" href="../../pages/samples/logout.php"> <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Sign Out</a>


                      </div>
                    </li>
                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>

    '; } 
    }
  } ?>    

