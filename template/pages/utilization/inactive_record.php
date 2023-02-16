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
}
</style>
          </head>

          <div class="main-panel">
            <div class="content-wrapper">
              <div class="input-group">
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title"><i class="fa fa-book"></i> Utilization Active Records</h4>

                        <form method="POST" action="inactive_record_search.php" class="form-horizontal">
                            <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                        <select name="remarks" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Transferred">Transferred</option>
                                            <option value="Donated">Donated</option>
                                            <option value="Weeded">Weeded</option>
                                            <option value="Archived">Archived</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <br>

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
            <table id="deus" class="table table-bordered table-striped">
                            
                            <thead style="background: #c83418">
                                <tr style="color:white;">
                                    <th>Accession NO./Barcode</th>
                                    <th>Call Number</th>
                                    <th>Title of Book / Author / Date</th>
                                    <th>Remarks</th>
                                    <th>Date Archived</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                                $borrow_query = mysqli_query($con,"SELECT * FROM archive
                                ORDER BY deyt DESC") or die(mysql_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                $id = $borrow_row ['archive_id'];
                              ?>         
                                
                            <tr>
                                <td><?php echo $borrow_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize; "><?php echo $borrow_row['call_no']; ?></td>
                                <td><?php echo $borrow_row['title'].' / '.$borrow_row['author'].' / '.$borrow_row['date_of_publ']; ?></td>
                                <td><?php echo $borrow_row['remarks']; ?></td>
                                <td><?php echo $borrow_row['deyt']; ?></td>
                            </tr>
                            
                            <?php } 
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
