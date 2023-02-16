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

          
            <div class="content-wrapper">
              <div class="input-group">
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Reader Checkout</h4>
                  <p class="card-description">

                  </p>




                  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <center><h3 class="card-description">Student ID Barcode</h3></center><br>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="container-fluid">
<div class="row">
    <div class="col-md-4"></div>
    
                                             <form method="post">
                                        <div class="card-description">Insert ID Barcode <br>
                                            <input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="student_number" placeholder="Enter barcode here....." autofocus required />
                                        </div>
                                    </form>             

                        



    <div class="col-md-4"></div>
</div>
</div>          
                        <!-- content ends here -->
                            </div>
                        </div>
                        <!-- content starts here -->


                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
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


      </html>


<?php }else{
    header("Location: ../samples/404.php");
} ?>
<?php include '../../includes/scripts.php'; ?>
