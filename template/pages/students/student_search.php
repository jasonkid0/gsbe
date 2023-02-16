<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
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
              <div class="col-xs-6">
                  <form method="GET" class="form-horizontal">
                      <div>
                        <input type="text" style="height: 31px; width: 500px;" name="search" placeholder="Search for User FN / MN / LN, Type, Level, Section/Course" aria-label="Search" aria-describedby="search-addon">
                        <button type="submit" name="submit" class="btn btn-outline-danger">Search</button>
                      
                        <br>
                  </form>
              </div>
              </div>

<!-- BUTTON ORIGINAL

        <div class="content-wrapper">
          <div class="input-group">
          <div class="col-xs-6">
            <button type="button" class="btn btn-outline-danger">Search</button>
          <div class="col-xl-6">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
          </div>

-->
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">User's Information</h4>
                          <div class="table-responsive">
                          <table id="bookstable" class="table table-bordered"style="width: 100%; white-space: nowrap;">
                      <thead style="background: #c83418">
                        <tr style="color:white;">
                          <th >School ID</th>
                          <th >Member Full Name</th>
                          <th >Type</th>
                          <th >Level</th>
                          <th >Contact</th>
                          <th >Address</th>
                          <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:50px;">Section/Course</th>
                          <th >Date Added</th>
                          <?php if($_SESSION['role'] == "Administrator"){ 
                              echo ' <th >Action</th>'; } ?>
                        </tr>
                      </thead>
                          
                      <tbody>
                        <?php
                            if (isset($_GET['submit'])) {

                              $return_query= mysqli_query($con,
                              "SELECT * FROM user 
                              WHERE firstname LIKE '%$_GET[search]%' 
                              OR middlename LIKE '%$_GET[search]%' 
                              OR lastname LIKE '%$_GET[search]%'
                              OR type LIKE '%$_GET[search]%'
                              OR level LIKE '%$_GET[search]%'
                              OR section LIKE '%$_GET[search]%' ") 
                              or die (mysqli_error($con));
                              while ($row= mysqli_fetch_array ($return_query) ){
                              $id=$row['user_id'];
                        ?>
                      <tr>
                        <td><?php echo $row['student_number']; ?></td> 
                          <td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
                          <td style="white-space: nowrap; overflow: auto; max-width:100px;"><?php echo $row['type']; ?></td> 
                          <td><?php echo $row['level']; ?></td> 
                          <td><?php echo $row['contact']; ?></td>
                          <td style="white-space: nowrap; overflow: auto; max-width:100px;"><?php echo $row['address']; ?></td>
                          <td><?php echo $row['section']; ?></td>
                          <td ><?php echo $row['user_added']; ?></td>
                          <?php if($_SESSION['role'] == "Administrator"){ ?>   
                            <td>
                              <a class="btn btn-primary" for="ViewAdmin" href="edit_student.php<?php echo '?user_id='.$id; ?>">
                              <i class="fa fa-edit"></i> Edit
                              </a><br>
                              <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id;?>">
                                  <i class="fa fa-trash"></i> Delete
                              </a>
      
                              <!-- delete modal user -->
                              <div class="modal fade" id="delete<?php  echo $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Delete User</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                          <div class="alert alert-danger"> <center>
                                            <p class="text-truncate"> Are you sure you want to delete <br><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?>? </p></center>
                                          </div>
                                          <div class="modal-footer">
                                          <a href="delete_student.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</a>
                                          <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-hidden="true">No</button>
                                          
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </td> 
                          <?php } ?>
                      </tr>
                      <?php } }?>
                  </tbody>
                  </table>
                </div>
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