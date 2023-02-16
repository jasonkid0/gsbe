<?php 
ob_start();
include "../../../template/includes/css_plugins.php"; 
include '../../includes/navbar.php';
echo 
$ID=$_GET['archive_id'];
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
                  <h4 class="card-title">Archive Book</h4>
                  <p class="card-description" style="color:green; font-size: 17px;">
                    <b>You are about to send this lists into "ACTIVE STATUS"</b>
                  </p>

                  <!-- content starts here -->
                    <?php
                      $query=mysqli_query($con,"select * from archive where archive_id='$ID'")or die(mysqli_error($con));
                      $row=mysqli_fetch_array($query);
                    ?>

                    <?php
                      $query1=mysqli_query($con,"SELECT * FROM archive
                      LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                      LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                      LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                      where archive_id='$ID'")or die(mysql_error());
                      $row=mysqli_fetch_assoc($query1);
                    ?>

                  <form method="post" class="forms-sample" onsubmit="return confirm('Are you sure you want to mark this as ACTIVE?');">
                    <div class="form-group">
                      <label for="call_no">Call Number</label>
                      <input type="text" name="call_no" value="<?php echo htmlspecialchars($row['call_no']); ?>" id="call_no" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" id="title" required="required"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="subject_id">Subjects</label>
                      <input type="text" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>" id="subject" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="author_id">Author</label>
                      <input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" id="author" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="editor">Editor</label>
                      <input type="text" name="editor" id="editor" value="<?php echo htmlspecialchars($row['editor']); ?>"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="edition">Edition</label>
                      <input type="text" name="edition" id="edition" value="<?php echo htmlspecialchars($row['edition']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="pop_id">PlaceOfPublication</label>
                        <select name="pop_id" tabindex="-1" class="form-control">
                          <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?>
                          </option>
                        </select>
                    </div>
                      <?php
                        $query1=mysqli_query($con,"SELECT * FROM archive
                        LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                        where archive_id='$ID'")or die(mysql_error());
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="publisher_id">Publisher</label>
                        <select name="publisher_id" tabindex="-1" class="form-control">
                          <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?>
                          </option>
                        </select>
                    </div>
                    <?php
                        $query1=mysqli_query($con,"SELECT * FROM archive
                        LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                        where archive_id='$ID'")or die(mysql_error());
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="date_of_publ">Date of Publication</label>
                      <input type="text" name="date_of_publ" id="date_of_publ" value="<?php echo htmlspecialchars($row['date_of_publ']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="series">Series</label>
                      <input type="text" name="series" id="series" value="<?php echo htmlspecialchars($row['series']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="isbn_no">ISBN Number</label>
                      <input type="text" name="isbn_no" id="isbn_no" value="<?php echo htmlspecialchars($row['isbn_no']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="accession_no">Accession</label>
                      <input type="text" name="accession_no" id="accession_no" value="<?php echo htmlspecialchars($row['accession_no']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="moa_id">Moa</label>
                        <select name="moa_id" class="form-control" tabindex="-1">
                          <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?>
                          </option>
                        </select>
                    </div>
                      <?php
                        $query1=mysqli_query($con,"SELECT * FROM archive
                        LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                        where archive_id='$ID'")or die(mysql_error());
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="issn_no">ISSN Number</label>
                      <input type="text" name="issn_no" id="issn_no" value="<?php echo htmlspecialchars($row['issn_no']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="notation1">Notation1</label>
                      <input type="text" name="notation1" id="notation1" value="<?php echo htmlspecialchars($row['notation1']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="notation2">Notation2</label>
                      <input type="text" name="notation2" id="notation2" value="<?php echo htmlspecialchars($row['notation2']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="quantity" step="1" min="0" max="1000" value="<?php echo htmlspecialchars($row['quantity']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="abstract">Abstract</label>
                      <input type="text" name="abstract" id="abstract" value="<?php echo htmlspecialchars($row['abstract']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="page_no">Page Number/s</label>
                      <input type="text" name="page_no" value="<?php echo htmlspecialchars($row['page_no']); ?>" id="pages" required="required" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-success me-2" >Restore</button>
                    <button type="submit" name="cancel2"class="btn btn-light">Cancel</button>
                  </form>
                <?php
                  if (isset($_POST['update'])) {
                    $book_id = $_POST['book_id'];
                    $call_no=$_POST['call_no'];
                    $title=$_POST['title'];
                    $subject=$_POST['subject'];
                    $author=$_POST['author'];
                    $editor=$_POST['editor'];
                    $edition=$_POST['edition'];
                    $place_of_publ=$_POST['pop_id'];
                    $publisher=$_POST['publisher_id'];
                    $quantity=$_POST['quantity'];
                    $date_of_publ=$_POST['date_of_publ'];
                    $series=$_POST['series'];
                    $isbn_no=$_POST['isbn_no'];
                    $accession_no=$_POST['accession_no'];
                    $moa=$_POST['moa_id'];
                    $issn_no=$_POST['issn_no'];
                    $notation1=$_POST['notation1'];
                    $notation2=$_POST['notation2'];
                    $abstract=$_POST['abstract'];
                    $remark= 'Available';
                    $page_no=$_POST['page_no'];

                    {
                      mysqli_query($con,"delete from archive where archive_id = '$ID' ")or die(mysql_error());
                      mysqli_query($con," INSERT INTO book (call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks,page_no) VALUES ('$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark', '$page_no') ") or die(mysqli_error($con));
                      echo "<script>alert('Restore Successful!');history.go(-2);</script>";              
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