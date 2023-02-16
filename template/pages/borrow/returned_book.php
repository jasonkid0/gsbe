<?php
    include ('../../includes/dbcon.php');

    if (isset($_POST['student_number'])) {

    $student_number = $_POST['student_number'];

    $sql = mysqli_query($con,"SELECT * FROM user WHERE student_number = '$student_number' ");
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);

        if($count <= 0){
            echo "<div class='alert alert-success'>".'No match found for the School ID Number'."</div>";
        }else{
            $student_number = $_POST['student_number'];
            header('location:borrow_book.php?student_number='.$student_number);
           
        }
    }
?>

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

          <head>
             <style> 
                .date1 {
                background-color: #589AFF;
                border: none;
                color: white;
                padding: 3px 10px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 4px;
                display: flex;
                }
            </style>
          </head>

          <div class="main-panel">
            <div class="content-wrapper">
              <div class="input-group">
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title"><i class="fa fa-book"></i> Returned Books Monitoring</h4>


                        <form method="POST" action="returned_book_search.php" class="form-horizontal">

                        <div class="table-responsive">
                        <table class="col-xs-6">
                            <th>                        
                                <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                <span class="form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>

                                <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                <span class="form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </th>
                            <th>
                            <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-calendar"></i> Search By Date Returned</button>               
                            </th>
                        </table>

</form>   
                                
                                
                        </form>


      <!-- Main row -->
      <div class="card-body">
        <!-- Left col -->
            <div class="table-responsive">
            <table id="deus" class="table table-bordered table-striped">  
                                        
                            <?php
                            $return_query= mysqli_query($con,"select * from return_book 
                            LEFT JOIN book ON return_book.book_id = book.book_id 
                            LEFT JOIN user ON return_book.user_id = user.user_id 
                            where return_book.return_book_id order by return_book.return_book_id DESC") or die (mysql_error());
                                $return_count = mysqli_num_rows($return_query);
                                
                            $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysql_error());
                            $count_penalty_row = mysqli_fetch_array($count_penalty);
                            
                            ?>
                                
                                <div style="text-align: center; float:left;">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty Received & Paid:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>            
                                <section class="content-header">
                                    <ul style="float:right ;" class="nav navbar-right panel_toolbox">
                                        <li class="col-xs-2">
                                            <a href="print_returned_book.php" target="_blank" style="background:none;">
                                            <button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
                                            </a>
                                        </li>
                                    </ul>
                                  <div class="clearfix"></div>
                                </section>

                                
                            <thead style="background: #c83418">
                                <tr style="color:white;">
                                    <th>Accession No./Barcode</th>
                                    <th>Borrower Name</th>
                                    <th>Title</th>
                                <!---   <th>Author</th>
                                    <th>ISBN</th>   -->
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Date Returned</th>
                                    <th>Penalty</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                            while ($return_row= mysqli_fetch_array ($return_query) ){
                            $id=$return_row['return_book_id'];
?>
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
                                     echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
                                 }else {
                                     echo "<td style='white-space:pre-wrap; word-break:break-word;'>".$return_row['book_penalty']."</td>";
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
