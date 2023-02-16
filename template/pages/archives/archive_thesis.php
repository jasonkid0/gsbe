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
                        <input type="text" style="height: 31px; width: 500px;" name="search" placeholder="Search for Title, Author, Call Number..." aria-label="Search" aria-describedby="search-addon">
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
                          <h4 class="card-title">Search Inactive Special Collection</h4>
                          <div class="table-responsive">
                          <table id="bookstable" class="table table-bordered">
                      <thead style="background: #c83418">
                      <tr style="color:white;">
                          <th>Code #/Bcode</th>
                          <th>Name of Student/s</th>
                          <th>Course</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Remarks</th>
                          <th>Date Archived</th>
                          <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>'; } ?>
                        </tr>
                      </thead>
                          
                      <tbody>
                        <?php
                            if (isset($_GET['submit'])) {

                              $return_query= mysqli_query($con,"SELECT * from arc_special_collection 
                              LEFT JOIN categories ON categories.category_id = arc_special_collection.category_id
                              LEFT JOIN courses ON courses.course_id = arc_special_collection.course_id
                              where accession_no LIKE '%$_GET[search]%' or title LIKE '%$_GET[search]%' or nameofstudent LIKE '%$_GET[search]%' or course_name LIKE '%$_GET[search]%' ") or die (mysqli_error($con));
                              while ($row= mysqli_fetch_array ($return_query) ){
                              $id=$row['thesis_id'];
                        ?>
                      <tr>
                          <td><?php echo $row['accession_no'];?></td> 
                          <td style="word-wrap: break-word; width: 10em;"><?php echo $row['nameofstudent']; ?></td>
                          <td><?php echo $row['course_name']; ?></td>
                          <td style="word-wrap: break-word; width: 10em;"><?php echo $row['title']; ?></td>
                          <td><?php echo $row['categories']; ?></td>
                          <td><?php echo $row['deyt']; ?></td>
                          <td><?php echo $row['remarks']; ?></td>
                          <td><?php echo $row['oras']; ?></td>
                          <?php if($_SESSION['role'] == "Administrator"){ ?>   
                              <td>
                                <a class="btn btn-primary" for="ViewAdmin" href="restore_thesis.php<?php echo '?thesis_id='.$id; ?>">
                                <i class="fa fa-edit"></i> Restore
                                </a><br>
                                <a class="btn btn-danger" for="DeleteBook" href="#delete<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id;?>">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                               <br> 
                                  
                              <!-- delete modal book -->
                              <div class="modal fade" id="delete<?php  echo $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Delete Special Collection</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                              <div class="modal-body">
                                <div class="alert alert-danger"> <center>
                                  <p class="text-truncate"> Are you sure you want to delete <br><?php echo $row['title']; ?>?</p></center>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="delete_archive_thesis.php<?php echo '?thesis_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</a>
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-hidden="true"> No</button>
                                  
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