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
                  <h4 class="card-title">Add Book</h4>
                  <p class="card-description">
                    Add book elements
                  </p>

                  <!-- content starts here -->

                  <form method="post" autocomplete="on" enctype="multipart/form-data" class="forms-sample">
                  <input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
                    <div class="form-group">
                      <label for="call_no">Call Number<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="call_no" id="call_no" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="title">Title<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="title" id="title" required="required"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="subject_id">Subject<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="subject" id="subject" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="author_id">Author<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="author" id="author" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="editor">Editor</label>
                      <input type="text" name="editor" id="editor" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="edition">Edition</label>
                      <input type="text" name="edition" id="edition" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="pop_id">PlaceOfPublication</label>
                        <select name="place_of_publ" tabindex="-1" class="form-control">
                          <option selected disabled>-- Select Place Of Publ. --
                          </option>
                            <?php $result= mysqli_query($con,"select * from tbl_placeofpublications") or die (mysql_error());
                              while ($row= mysqli_fetch_array ($result) ){
                              $id=$row['pop_id'];
                            ?>
                          <option value="<?php echo $row['pop_id']; ?>"><?php echo $row['placeofpublication']; ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="publisher">Publisher</label>
                        <select name="publisher" tabindex="-1" class="form-control">
                          <option selected disabled>-- Select Publisher --
                          </option>
                              <?php
                              $result= mysqli_query($con,"select * from tbl_publishers") or die (mysql_error());
                              while ($row= mysqli_fetch_array ($result) ){
                              $id=$row['publisher_id'];
                              ?>
                          <option value="<?php echo $row['publisher_id']; ?>"><?php echo $row['publisher']; ?>
                          </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="date_of_publ">Date of Publication</label>
                      <input type="text" name="date_of_publ" id="date_of_publ" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="series">Series</label>
                      <input type="text" name="series" id="series" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="isbn_no">ISBN Number</label>
                      <input type="text" name="isbn_no" id="isbn_no" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="quantity" step="1" min="0" max="1000" value="1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="accession_no">Accession<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="accession_no" id="accession_no" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="moa">MOA<span class="required" style="color:red;">*</span></label>
                        <select name="moa" class="form-control" tabindex="-1" required="required">
                          <option selected disabled>-- Select MOA --
                          </option>
                            <?php
                            $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                            while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['moa_id'];
                            ?>
                          <option value="<?php echo $row['moa_id']; ?>"><?php echo $row['moa']; ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="issn_no">ISSN Number</label>
                      <input type="text" name="issn_no" id="issn_no" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="notation1">Notation1</label>
                      <input type="text" name="notation1" id="notation1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="notation2">Notation2</label>
                      <input type="text" name="notation2" id="notation2" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="abstract">Abstract</label>
                      <input type="text" name="abstract" id="abstract" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="page_no">Page Number/s</label>
                      <input type="text" name="page_no" id="pages" class="form-control">
                    </div>
                    <button type="submit" name="update11" class="btn btn-primary me-2" >Submit</button>
                    <a href="../librarian/index.php">
                    <button type="button" class="btn btn-light">Cancel</button></a>
                  </form>
                <?php
                  if (isset($_POST['update11'])) {
                    $call_no=mysqli_real_escape_string($con,$_POST['call_no']);
                    $title=mysqli_real_escape_string($con,$_POST['title']);
                    $subject=mysqli_real_escape_string($con,$_POST['subject']);
                    $author=mysqli_real_escape_string($con,$_POST['author']);
                    $editor=mysqli_real_escape_string($con,$_POST['editor']);
                    $edition=mysqli_real_escape_string($con,$_POST['edition']);
                    $place_of_publ=mysqli_real_escape_string($con,$_POST['place_of_publ']);
                    $publisher=mysqli_real_escape_string($con,$_POST['publisher']);
                    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                    $date_of_publ=mysqli_real_escape_string($con,$_POST['date_of_publ']);
                    $series=mysqli_real_escape_string($con,$_POST['series']);
                    $isbn_no=mysqli_real_escape_string($con,$_POST['isbn_no']);
                    $accession_no=mysqli_real_escape_string($con,$_POST['accession_no']);
                    $moa=mysqli_real_escape_string($con,$_POST['moa']);
                    $issn_no=mysqli_real_escape_string($con,$_POST['issn_no']);
                    $notation1=mysqli_real_escape_string($con,$_POST['notation1']);
                    $notation2=mysqli_real_escape_string($con,$_POST['notation2']);
                    $abstract=mysqli_real_escape_string($con,$_POST['abstract']);
                    $page_no=mysqli_real_escape_string($con,$_POST['page_no']);

                    $pre = "SFAC";
                    $mid = mysqli_real_escape_string($con,$_POST['new_barcode']);
                    $suf = "LMS";
                    $gen = $pre.$mid.$suf;
                    
                    if ($quantity == 0 ) {
                        $remark = 'Not Available';
                    }else{
                        $remark = 'Available';
                    }
                    $chk = mysqli_query($con,"SELECT * FROM book WHERE accession_no = '".$accession_no."' ");
                    $ct = mysqli_num_rows($chk);
 
                    if($ct == 0){

                      mysqli_query($con,"INSERT INTO book (call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks,page_no)
                      VALUES('$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark','$page_no')")OR die(mysqli_error($con));
                      echo "<script>alert('Successfully Added!'); window.location='add_book.php'</script>";
                      
                      mysqli_query($con,"INSERT INTO barcode (pre_barcode,mid_barcode,suf_barcode) VALUES ('$pre', '$mid', '$suf') ") OR die (mysqli_errOR());

                      }else{
                      echo "<script>alert('Accession No. already exist!');</script>";
                      }  
                   
                    }
                  ?>
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
} ?>