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
                    $user_query = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id_session' ");
                    $user_row = mysqli_fetch_array($user_query);
                    $sql = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id_session' ");
                    $row = mysqli_fetch_array($sql);
                ?>
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Borrower Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span></h4>
                          <div class="table-responsive">
                          <table id="bookstable" class="table table-striped table-bordered">
                      <thead style="background: #c83418">
                      <tr style="color:white;">
                          <th>Accession No./Barcode</th>
                          <th>Call No.</th>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Date Borrowed</th>
                          <th>Due Date</th>
                          <th>Penalty</th>
                          <th>Status</th>

                          <?php 
                                $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                    LEFT JOIN book ON borrow_book.book_id = book.book_id
                                    WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysql_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                    $due_date= $borrow_row['due_date'];
                                
                                $timezone = "Asia/Manila";
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                $cur_date = date("Y-m-d H:i:s");
                                $date_returned = date("Y-m-d H:i:s");
                                //$due_date = strtotime($cur_date);
                                //$due_date = strtotime("+3 day", $due_date);
                                //$due_date = date('F j, Y g:i a', $due_date);
                                ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
                                
                                $penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysql_error());
                                $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
                                    
                                    if ($date_returned > $due_date) {
                                        $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                    } elseif ($date_returned < $due_date) {
                                        $penalty = 'No Penalty';
                                    } else {
                                        $penalty = 'No Penalty';
                                    }
                            ?>      
                        </tr>
                      </thead>
                          
                      <tbody>
                      <tr>
                                
                                <td><?php echo $borrow_row['accession_no']; ?></td>
                                <td><?php echo $borrow_row['call_no']; ?></td>
                                <td><?php echo $borrow_row['title']; ?></td>
                                <td><?php echo $borrow_row['author']; ?></td>
                                <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                <?php
                                    if ($borrow_row['moa_id'] != 'Hardbound') {
                                        echo "<td>".date('M d, Y h:m:s a',strtotime($borrow_row['due_date']))."</td>";
                                    } else {
                                        echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                    }
                                ?>
                            <!---   <td><?php // echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>    -->
                                <?php
                                    if ($borrow_row['moa_id'] != 'Hardbound') {
                                        echo "<td>".$penalty."</td>";
                                    } else {
                                        echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                    }
                                ?>
                            <!---   <td><?php // echo $penalty; ?></td> -->
                                <td style="background: #e35d6a; color: white; white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:100px;">
                                <form method="post" action="">
                                <input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
                                <input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
                                <input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
                                <input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
                                <input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
                                <input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
                                </form>
                                <strong>Not Returned</strong>
                                </td>
                      </tr>
                      <?php } ?>
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