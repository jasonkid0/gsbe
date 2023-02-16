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
                  <h4 class="card-title"><i class= "fa fa-cog fa-spin"></i> Settings</h4>

    <!-- Main content -->
    <section class="content">
           <div class="row">
        
                <?php include ('settings_function/allowed_qntty.php'); ?>
                
                <?php include ('settings_function/penalty.php'); ?>
                
                <?php include ('settings_function/allowed_days.php'); ?>
                
                    
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