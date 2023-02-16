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
                <h4 class="card-title"><i class="fa fa-book"></i> Borrowed Books Monitoring</h4>

            <div class="table-responsive">
            <table id="deus" class="table table-bordered table-striped">                         
                                
                            <thead style="background: #c83418">
                                <tr style="color:white;">
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Accession No./Barcode</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Borrower Name</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Title</th>
                                <!---   <th>Author</th>
                                    <th>ISBN</th>   -->
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Date Borrowed</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Due Date</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Date Returned</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                LEFT JOIN book ON borrow_book.book_id = book.book_id 
                                LEFT JOIN user ON borrow_book.user_id = user.user_id 
                                WHERE borrowed_status = 'borrowed'
                                ORDER BY borrow_book.borrow_book_id DESC") or die(mysql_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                $id = $borrow_row ['borrow_book_id'];
                                $book_id = $borrow_row ['book_id'];
                                $user_id = $borrow_row ['user_id'];
                            ?>
                            <tr>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"><?php echo $borrow_row['accession_no']; ?></td>
                                <td style="white-space: nowrap; overflow: auto; max-width:100px;"><?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?></td>
                                <td style="white-space: nowrap; overflow: auto; max-width:100px;"><?php echo $borrow_row['title']; ?></td>
                            <!---   <td style="text-transform: capitalize"><?php // echo $borrow_row['author']; ?></td>
                                <td><?php // echo $borrow_row['isbn']; ?></td>  -->
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                <?php
                                 if ($borrow_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;'>".date("M d, Y h:m:s a",strtotime($borrow_row['due_date']))."</td>";
                                 }else {
                                     echo "<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;'>".date("M d, Y h:m:s a",strtotime($borrow_row['due_date']))."</td>";
                                 }
                                
                                ?>
                                <?php
                                 if ($borrow_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;'>".date("M d, Y h:m:s a",strtotime($borrow_row['date_returned']))."</td>";
                                 }else {
                                     echo "<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;'>".date("M d, Y h:m:s a",strtotime($borrow_row['date_returned']))."</td>";
                                 }
                                
                                ?>
                                <?php
                                 if ($borrow_row['borrowed_status'] != 'returned'){
                                     echo "<td class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
                                 }else {
                                     echo "<td class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
                                 }
                                
                                ?>
                            </tr>
                            
                            <?php 
                            }
                            if ($borrow_count <= 0){
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
                </div>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </div>
    <!-- /.content -->
  </div>


<!-- TEMPLATE FOOTER -->
              


                <!-- FOOTER -->
                <?php include '../../includes/footer.php'; ?>
                <!-- FOOTER -->

            </div>
          </div>
        </div>


      </html>


<?php }else{
    header("Location: ../samples/404.php");
} ?>
<?php include '../../includes/scripts.php'; ?>
