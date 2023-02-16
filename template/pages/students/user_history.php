<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
if($_SESSION['role'] == "Student")
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
              <div class="col-xs-6">
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

                <?php 
                    $return_query= mysqli_query($con,"select * from return_book 
                    LEFT JOIN book ON return_book.book_id = book.book_id 
                    LEFT JOIN user ON return_book.user_id = user.user_id 
                    where user.user_id = $id_session order by return_book.return_book_id DESC") or die (mysql_error());
                    $return_count = mysqli_num_rows($return_query);
                    $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book where user_id = $id_session ")or die(mysql_error());
                    $count_penalty_row = mysqli_fetch_array($count_penalty);       
                ?>
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title"><i class="fa fa-book"></i> Returned Book Monitoring</h4>
                          <div style="float:left; text-align: center;">
                            <div class="span"><div class="alert alert-info"><i class="icon-credit-card"></i>Total Amount of Penalty:&nbsp;<strong><?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div> </strong></div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="table-responsive">
                          <table id="bookstable" class="table table-striped table-bordered">
                      <thead style="background: #c83418">
                      <tr style="color:white;">
                        <th>Accession No./Barcode</th>
                        <th>Borrower Name</th>
                        <th>Title</th>
                        <th>Date Borrowed</th>
                        <th>Due Date</th>
                        <th>Date Returned</th>
                        <th>Penalty</th>

                          <?php 
                                while ($return_row= mysqli_fetch_array ($return_query) ){
                                  $id=$return_row['return_book_id'];
                          ?>      

                        </tr>
                      </thead>
                          
                      <tbody>
                      <tr>
                                
                                <td><?php echo $return_row['accession_no']; ?></td>
                                <td><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
                                <td><?php echo $return_row['title']; ?></td>
                            <!---   <td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
                                <td><?php // echo $return_row['isbn']; ?></td>  -->
                                <td><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
                                <?php
                                 if ($return_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='' >".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
                                 }else {
                                     echo "<td >".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
                                 }
                                
                                ?>
                                <?php
                                 if ($return_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='' >".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
                                 }else {
                                     echo "<td >".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
                                 }
                                
                                ?>
                                <?php
                                 if ($return_row['book_penalty'] != 'No Penalty'){
                                     echo "<td style='width:100px; background: #F39C12; color: white;'>Php ".$return_row['book_penalty'].".00</td>";
                                 }else {
                                     echo "<td>".$return_row['book_penalty']."</td>";
                                 }
                                
                                ?>
                      </tr>
                      <?php 
                            }
                            if ($return_count <= 0){
                                echo '
                                    <table style="float:right;">
                                        <tr>
                                            <td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
                                        </tr>
                                    </table>
                                ';
                            }                           
                            ?>
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
<?php }else{
    header("Location: ../samples/404.php");
      } 
?>