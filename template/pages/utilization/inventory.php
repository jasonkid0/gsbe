<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
if($_SESSION['role'] == "Administrator")
{
?>


      <!DOCTYPE html>
      <html lang="en">
        

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
                <h4 class="card-title"><i class="fa fa-briefcase"></i> Inventory</h4>
                <form method="POST" class="form-sample">

                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group row">
                                <p><strong>Date from:</strong></p>
                                <select name="datefrom" style="color:gray;" class="form-control has-feedback-left" placeholder="Date From" >
                                    <?php for ($i = 2022; $i >= 1960; $i--) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                </div>
                    	</div>
                        
                        <div class="col-md-3">
                        <div class="form-group row">
                            <p><strong>Date to:</strong></p>
                                <select name="dateto" style="color:gray;" class="form-control has-feedback-left" placeholder="Date To" >
                                    <?php for ($i = 2022; $i >= 1960; $i--) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                </div>
                      	</div><br>
                    </div>
                        

                        <input type="text" style="height: 31px; width: 400px;" placeholder="Search subject" name="search" aria-label="Search" aria-describedby="search-addon">
                        <button type="submit" name="submit" class="btn btn-outline-danger">Search</button>
                      
                        <br>
                  </form>


                    
                    </form>



<!-- TEMPLATE HEADER -->
    <div class="card">
      <!-- Main row -->
      <div class="card-body">
        <!-- Left col -->
            <div class="table-responsive">
            <table id="deus" class="table table-bordered table-striped" style="width: 100%; white-space: nowrap;"> 
                <section class="content-header">
                    <h1></h1>
                    <ul style="float:right ;" class="nav navbar-right panel_toolbox">
                        <li class="col-xs-2">
                            <a href="inventory_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger" name="print" type="submit"><i class="fa fa-print"></i> Print</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </section><br>                         
                            
                            <thead style="background: #c83418">
                                <tr style="color:white;">
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Edition</th>
                                    <th>Publication Date</th>
                                    <th>Quantity</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $_SESSION['datefrom'] = $_POST['datefrom'];
                                    $_SESSION['dateto'] = $_POST['dateto'];
                                    $_SESSION['subject'] = $_POST['search'];
                                    $datefrom = $_POST['datefrom'];
                                    $dateto = $_POST['dateto'];


                                    $return_query= mysqli_query($con,
                                    "SELECT *,
                                    COUNT(call_no) AS total_quantity
                                    FROM book
                                    WHERE date_of_publ BETWEEN '$datefrom' AND '$dateto' 
                                    and subject LIKE '%$_POST[search]%' 
                                    GROUP BY call_no
                                    ORDER BY date_of_publ asc ") 
                                    or die (mysqli_error($con));
                                    while ($row= mysqli_fetch_array ($return_query) ){
                                    $id=$row['book_id'];
                            ?>        
                                
                            <tr>
                                <td><?php echo $row['author']; ?></td> 
                                <td><?php echo $row['title']; ?></td> 
                                <td><?php echo $row['edition']; ?></td> 
                                <td><?php echo $row['date_of_publ']; ?></td> 
                                <td><?php echo $row['total_quantity']; ?></td> 
                            <?php if($_SESSION['role'] == "Administrator"){ ?>   
                                <td>
                                <a class="btn btn-info" for="ViewAdmin" href="../books/view_book.php<?php echo '?book_id='.$id; ?>">
                                  <i class="fa fa-eye"></i> View
                                </a><br>
                                <a class="btn btn-primary" for="ViewAdmin" href="../books/edit_book.php<?php echo '?book_id='.$id; ?>">
                                <i class="fa fa-edit"></i> Edit
                                </a><br>
                                <a class="btn btn-success" for="ViewAdmin" href="../books/archive_book.php<?php echo '?book_id='.$id; ?>">
                                <i class="fa fa-send"></i> Put to...
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
                                <a href="../books/delete_book.php<?php echo '?book_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</a>
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
