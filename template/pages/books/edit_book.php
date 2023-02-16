<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
$ID=$_GET['book_id'];
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
                  <h4 class="card-title">Edit Book</h4>
                  <p class="card-description">
                    Edit book elements
                  </p>

                  <!-- content starts here -->
                    <?php
                      $query1=mysqli_query($con,"SELECT * FROM book 
                        LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id
                        where book_id='$ID'")or die(mysql_error());
                    $row=mysqli_fetch_assoc($query1);
                      ?>

                  <form method="post" class="forms-sample">
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
                            <?php $result= mysqli_query($con,"select * from tbl_placeofpublications") or die (mysql_error());
                                            while ($row= mysqli_fetch_array ($result) ){
                                            $id=$row['pop_id'];
                            ?>
                          <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                      <?php
                        $query1=mysqli_query($con,"SELECT * FROM book
                        LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                        where book_id='$ID'")or die(mysql_error());
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="publisher_id">Publisher</label>
                        <select name="publisher_id" tabindex="-1" class="form-control">
                          <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?>
                          </option>
                              <?php
                              $result= mysqli_query($con,"select * from tbl_publishers") or die (mysql_error());
                              while ($row= mysqli_fetch_array ($result) ){
                              $id=$row['publisher_id'];
                              ?>
                          <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?>
                          </option>
                        <?php } ?>
                        </select>
                    </div>
                    <?php
                        $query1=mysqli_query($con,"SELECT * FROM book
                        LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                        where book_id='$ID'")or die(mysql_error());
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
                            <?php
                            $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                            while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['moa_id'];
                            ?>
                          <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                      <?php
                        $query1=mysqli_query($con,"SELECT * FROM book
                        LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                        LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                        LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                        where book_id='$ID'")or die(mysql_error());
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
                      <label for="abstract">Abstract</label>
                      <input type="text" name="abstract" id="abstract" value="<?php echo htmlspecialchars($row['abstract']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="page_no">Page Number/s</label>
                      <input type="text" name="page_no" value="<?php echo htmlspecialchars($row['page_no']); ?>" id="pages" required="required" class="form-control">
                    </div>
                    <button type="submit" name="update11" class="btn btn-primary me-2" >Submit</button>
                    <button type="submit" name="cancel" class="btn btn-light">Cancel</button>
                  </form>
                <?php
                  $id =$_GET['book_id'];
                  if (isset($_POST['update11'])) {
                    $call_no=mysqli_real_escape_string($con,$_POST['call_no']);
                    $title=mysqli_real_escape_string($con,$_POST['title']);
                    $subject=mysqli_real_escape_string($con,$_POST['subject']);
                    $author=mysqli_real_escape_string($con,$_POST['author']);
                    $editor=mysqli_real_escape_string($con,$_POST['editor']);
                    $edition=mysqli_real_escape_string($con,$_POST['edition']);
                    $pop_id=mysqli_real_escape_string($con,$_POST['pop_id']);
                    $publisher_id=mysqli_real_escape_string($con,$_POST['publisher_id']);
                    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                    $date_of_publ=mysqli_real_escape_string($con,$_POST['date_of_publ']);
                    $series=mysqli_real_escape_string($con,$_POST['series']);
                    $isbn_no=mysqli_real_escape_string($con,$_POST['isbn_no']);
                    $accession_no=mysqli_real_escape_string($con,$_POST['accession_no']);
                    $moa_id=mysqli_real_escape_string($con,$_POST['moa_id']);
                    $issn_no=mysqli_real_escape_string($con,$_POST['issn_no']);
                    $notation1=mysqli_real_escape_string($con,$_POST['notation1']);
                    $notation2=mysqli_real_escape_string($con,$_POST['notation2']);
                    $abstract=mysqli_real_escape_string($con,$_POST['abstract']);
                    $page_no=mysqli_real_escape_string($con,$_POST['page_no']);

                  if ($moa_id == 'Lost') {
                      $remark = 'Not Available';
                  } elseif ($moa_id == 'Damaged') {
                      $remark = 'Not Available';
                  } else {
                      $remark = 'Available';
                  }

                    mysqli_query($con," UPDATE book SET call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
                    date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no' WHERE book_id = '$id' ")or die(mysql_error());
                    echo "<script>alert('Successfully Updated Book Info!'); history.go(-2);</script>";   
                   
                    } elseif (isset($_POST['cancel'])) {
                      echo "<script>alert('Editing Canceled!');history.go(-2);</script>";
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