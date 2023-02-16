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
                          <h4 class="card-title">Search Inactive Books</h4>
                          <div class="table-responsive">
                          <table id="bookstable" class="table table-bordered">
                      <thead style="background: #c83418">
                      <tr style="color:white;">
                          <th>Acc No./Bcode</th>
                          <th>Call Number</th>
                          <th>Author/s</th>
                          <th>Title</th>
                          <th>Editor</th>
                          <th>Edition</th>
                          <th>Place of Publ.</th>
                          <th>Publisher</th>
                          <th>Date of Publ.</th>
                          <th>No. of Pages</th>
                          <th>Series</th>
                          <th>Notation 1</th>
                          <th>Notation 2</th>
                          <th>ISBN No.</th>
                          <th>ISSN No.</th>
                          <th>Subject</th>
                          <th>Abstract</th>
                          <th>Moa</th>
                          <th>Remarks</th>
                          <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>'; } ?>
                        </tr>
                      </thead>
                          
                      <tbody>
                        <?php
                            if (isset($_GET['submit'])) {

                              $return_query= mysqli_query($con,"SELECT * from archive 
                              LEFT JOIN tbl_moa ON tbl_moa.moa_id = archive.moa_id
                              LEFT JOIN tbl_publishers ON tbl_publishers.publisher_id = archive.publisher_id
                              LEFT JOIN tbl_placeofpublications ON tbl_placeofpublications.pop_id = archive.pop_id
                              where call_no LIKE '%$_GET[search]%' or title LIKE '%$_GET[search]%' or subject LIKE '%$_GET[search]%' or author LIKE '%$_GET[search]%' or accession_no LIKE '%$_GET[search]%' or remarks LIKE '%$_GET[search]%' ") or die (mysqli_error($con));
                              while ($row= mysqli_fetch_array ($return_query) ){
                              $id=$row['archive_id'];
                        ?>
                      <tr>
                        <td><?php echo $row['accession_no'];?></td>
                        <td><?php echo $row['call_no']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['editor']; ?></td>   
                        <td><?php echo $row['edition']; ?></td>
                        <td><?php echo $row['placeofpublication']; ?></td> 
                        <td><?php echo $row['publisher']; ?></td> 
                        <td><?php echo $row['date_of_publ']; ?></td> 
                        <td><?php echo $row['page_no']; ?></td> 
                        <td><?php echo $row['series']; ?></td> 
                        <td><?php echo $row['notation1']; ?></td> 
                        <td><?php echo $row['notation2']; ?></td> 
                        <td><?php echo $row['isbn_no']; ?></td> 
                        <td><?php echo $row['issn_no']; ?></td> 
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['abstract']; ?></td> 
                        <td><?php echo $row['moa']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                          <?php if($_SESSION['role'] == "Administrator"){ ?>   
                              <td>
                                <a class="btn btn-info" for="ViewAdmin" href="view_archive.php<?php echo '?archive_id='.$id; ?>">
                                  <i class="fa fa-eye"></i> View
                                </a><br>
                                <a class="btn btn-primary" for="ViewAdmin" href="restore_book.php<?php echo '?archive_id='.$id; ?>">
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
                                      <h5 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Delete Book</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                              <div class="modal-body">
                                <div class="alert alert-danger"> <center>
                                  <p class="text-truncate"> Are you sure you want to delete <br><?php echo $row['title']; ?>?</p></center>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="delete_archive.php<?php echo '?archive_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</a>
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