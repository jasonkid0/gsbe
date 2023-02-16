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
              <section>
                  <ul style="float:right;">
                      <li class="col-12 grid-margin stretch-card">
                        <a href="javascript:history.back()" style="background:none;">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                      </li>
                  </ul>
                </section>
              <div class="input-group">
              <div class="col-xs-6">
                <h2 class="col-xs-10"><i class="fa fa-info"></i> Book Information</h2>
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
                    <div class="col-md-10 grid-margin stretch-card">
                      <div class="card">
                        
                        <div class="card-body">
                          <div class="table-responsive">
                          <table class="table table-bordered">
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
                        </tr>
                      </thead>
                          
                      <tbody>
                        <?php
                             if (isset($_GET['book_id']))
                             $id=$_GET['book_id'];
                             $result1 = mysqli_query($con,"SELECT * FROM book 
                             LEFT JOIN tbl_moa ON tbl_moa.moa_id = book.moa_id
                             LEFT JOIN tbl_publishers ON tbl_publishers.publisher_id = book.publisher_id
                             LEFT JOIN tbl_placeofpublications ON tbl_placeofpublications.pop_id = book.pop_id
                             WHERE book_id='$id'");
                             while($row = mysqli_fetch_array($result1)){
                        ?>
                      <tr>
                      <td><?php echo $row['accession_no']; ?></td>
                                <td><?php echo $row['call_no']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['title']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['editor']; ?></td>
                                <td><?php echo $row['edition']; ?></td>
                                <td><?php echo $row['placeofpublication']; ?></td> 
                                <td><?php echo $row['publisher']; ?></td> 
                                <td><?php echo $row['date_of_publ']; ?></td> 
                                <td><?php echo $row['series']; ?></td>
                                <td><?php echo $row['isbn_no']; ?></td>
                                <td><?php echo $row['moa']; ?></td>
                                <td><?php echo $row['issn_no']; ?></td>
                                <td><?php echo $row['notation1']; ?></td>
                                <td><?php echo $row['notation2']; ?></td>
                                <td><?php echo $row['abstract']; ?></td>
                                <td><?php echo $row['page_no']; ?></td>
                                <td><?php echo $row['remarks']; ?></td>
                      </tr>
                      <?php }?>
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
