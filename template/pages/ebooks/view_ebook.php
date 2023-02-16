<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
$ID=$_GET['ebook_id'];
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
                <h2 class="col-xs-10"><i class="fa fa-info"></i> E-Book Information</h2>
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
                          <?php
                            $sql="SELECT fileName FROM ebooks WHERE ebook_id = " . $_GET['ebook_id'];
                            $query=mysqli_query($con,$sql);
                            while ($info=mysqli_fetch_array($query)) {

                                // This line is the PATH for checking and viewing PDF Files.
                              if (file_exists("../../../../ebooks/" . $info['fileName'])){ ?> 
                                <embed type="application/pdf" src="../../../../ebooks/<?php echo $info['fileName'] ; ?>" width="1270" height="950"> 

                                <?php
                              }
                                else {
                                  echo 'File not found.'; 
                                }
                                ?>
                           
                          <?php
                            }
                          ?>
                </div>         
              </div>
            </div>

                <!-- FOOTER -->
                <?php include '../../includes/footer.php'; ?>
                <!-- FOOTER -->


        <!-- container-scroller -->

        <!-- plugins:js -->
            <?php include '../../includes/scripts.php'; ?>
        <!-- End custom js for this page-->

      </html>
