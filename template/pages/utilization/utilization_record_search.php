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
            }
            </style>
          </head>


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
                <h4 class="card-title"><i class="fa fa-book"></i> Monthly Library Resources Utilization
                  <a style="float: right" href="utilization_record.php"><button class="btn btn-primary"><i class="fa fa-reply"></i> All Reports</button></a></h4>
                  
                  <form method="POST" action="utilization_record_search.php" class="form-inline">
                  <br><br>

                    <table>
                        <th>                        
                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                            <span class="form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>

                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                            <span class="form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </th>

                        <th>
                        <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-calendar"></i> Search Inactive</button>               
                        </th>
                    </table>


                    </form>


<!-- TEMPLATE HEADER -->

    <div class="card">
      <!-- Main row -->
      <div class="card-body">
        <!-- Left col -->
            <div class="table-responsive">
                <section class="content-header">
                    <h1></h1>
                    <ul style="float:right ;" class="nav navbar-right panel_toolbox">
                        <li class="col-xs-2">
                            <a href="utilization_record_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </section>
                <br>
            <table id="deus" class="table table-bordered table-striped">
                        <?php
                            $_SESSION['datefrom'] = $_POST['datefrom'];
                            $_SESSION['dateto'] = $_POST['dateto'];
                        ?>
                            <?php
                            $datefrom = $_POST['datefrom'];
                            $dateto = $_POST['dateto'];
                            $return_query= mysqli_query($con,"SELECT * from borrow_book 
                            LEFT JOIN book ON borrow_book.book_id = book.book_id 
                            LEFT JOIN user ON borrow_book.user_id = user.user_id 
                            where borrow_book.date_borrowed BETWEEN '".$_POST['datefrom']." 00:00:01' and '".$_POST['dateto']." 23:59:59' OR borrow_book.borrowed_status = 'borrowed'
                            order by borrow_book.borrow_book_id DESC") or die (mysql_error());
                            $return_count = mysqli_num_rows($return_query);
                            ?>
                                
                            <thead style="background: #c83418">
                                <tr style="color:white;"> 
                                <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Accession No./Barcode</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Borrower Name</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Title of Book / Author / Date</th>
                                <!---   <th>Author</th>
                                    <th>ISBN</th>   -->
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Date Borrowed</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Date Returned</th>
                                    <th style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                            while ($return_row= mysqli_fetch_array ($return_query) ){
                                $id=$return_row['borrow_book_id'];
?>
                            <tr>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"><?php echo $return_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize; white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
                                <td style="white-space: nowrap; overflow: auto; max-width:100px;"><?php echo $return_row['title'].' / '.$return_row['author'].' / '.$return_row['date_of_publ']; ?></td>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
                                
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;"><?php echo ($return_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a",strtotime($return_row['date_returned'])); ?></td>
                                <?php
                                    if ($return_row['borrowed_status'] != 'returned') {
                                        echo "<td class='alert alert-danger'>".$return_row['borrowed_status']."</td>";
                                    } else {
                                        echo "<td  class='alert alert-success'>".$return_row['borrowed_status']."</td>";
                                    }
                                ?>
                            </tr>
                            
                            <?php 
                            }
                            if ($return_count <= 0){
                                echo '
                                    <table style="float:right;">
                                        <tr>
                                            <td style="padding:10px;" class="alert alert-danger">No Books returned at this Date</td>
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
                        <!-- content starts here -->

                        
                        
                        <!-- content ends here -->
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
              

                </div>
              </div>
            </div>

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
