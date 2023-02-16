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
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add Place of Publication</h4>
                      <form class="forms-sample" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="category">Place of Publication<span class="required" style="color:red;">*</span></label>
                          <input name="pop" type="text" class="form-control" id="category" required="required" placeholder="--Input Place of Publication--">
                        </div>
                        <center>
                        <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button></Center>
                      </form>
                    </div>
                  </div>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                  $subject = mysqli_real_escape_string($con,$_POST['pop']);
                  $result=mysqli_query($con,"select * from tbl_placeofpublications WHERE placeofpublication='$subject' ") or die (mySQL_error());
                    $row=mysqli_num_rows($result);
                    if ($row > 0){
                      echo "<script>alert('Place of Publication already Exist!'); window.location='pop.php'</script>";
                    }else{       
                      mysqli_query($con,"insert into tbl_placeofpublications (placeofpublication)
                      values ('$subject')")or die(mysql_error());
                      echo "<script>alert('Publisher successfully added!'); window.location='pop.php'</script>";
                    }
                }       
                ?>

                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Place of Publication List</h4>
                      <div class="table-responsive">
                        <table id="deus" class="table table-bordered">
                          <thead style="background: #c83418">
                            <tr style="color:white;">
                              <th>Place of Publication</th>
                              <th>Option</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM tbl_placeofpublications");
                            while ($row= mysqli_fetch_array ($query)){
                                $id=$row['pop_id'];
                            ?>
                              <tr>
                                <td>
                                  <?php echo $row['placeofpublication']; ?></td>
                                      <td><center>
                                      <a class="btn btn-primary" for="ViewAdmin" href="#edit<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id;?>">
                                        <i class="fa fa-edit"></i> Update</a> </center>

                                        <!-- edit modal category -->
                                        <div class="modal fade" id="edit<?php  echo $id;?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Edit POP</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                          <div class="modal-body">
                                              <div class="alert alert-primary">
                                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" action="edit_pop.php<?php echo '?pop_id='.$id; ?>">
                                                  <div class="form-group">
                                                    <label class="control-label" for="tbl_subjects">Place of Publication <span class="required" style="color:red;">*</span>
                                                    </label>
                                                    <div class="">
                                                      <?php echo '
                                                          <input type="text" name="pop1" id="edit<?php  echo $id;?>" required="required" class="form-control" value="'.htmlspecialchars($row['placeofpublication']).'">';
                                                      ?>
                                                    </div>
                                                  </div>
                                              </div>
                                          <div class="modal-footer">
                                            <a href="edit_pop.php<?php echo '?pop_id='.$id; ?>"><button type="submit" name="submit1" style="margin-bottom:5px;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                              <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-hidden="true">No</button>
                                              
                                              </form>
  
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                        <center><a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id;?>">
                                          <i class="fa fa-trash"></i> Delete
                                        </a> </center>

                                        <!-- delete modal category -->
                                        <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="fa fa-folder"></i> Delete Place of Publication</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger"> <center>
                                              <p class="text-truncate">Are you sure you want to delete <br><?php echo $row['placeofpublication']; ?>? </p></center>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-hidden="true">No</button>
                                            <a href="delete_pop.php<?php echo '?pop_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </td> 
                              </tr>
                              <?php } ?>        
                          </tbody>  
                      </div>  
                    </div>
                  </div>

                <!-- FOOTER -->
                <!-- <?php include '../../includes/footer.php'; ?> -->
                <!-- FOOTER -->
                </div>
               </div>
        <!-- container-scroller -->
            </div>
          </div>
        <!-- plugins:js -->
            <?php include '../../includes/scripts.php'; ?>
        <!-- End custom js for this page-->
  </html>

<?php }else{
  header("Location: ../samples/404.php");
} ?>