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
                      $query=mysqli_query($con,"select * from arc_special_collection where thesis_id='$ID'")or die(mysqli_error($con));
                      $row=mysqli_fetch_array($query);
                    ?>

                    <?php
                      $query1=mysqli_query($con,"SELECT * from arc_special_collection 
                      LEFT JOIN categories ON categories.category_id = arc_special_collection.category_id
                      LEFT JOIN courses ON courses.course_id = arc_special_collection.course_id 
                      where thesis_id='$ID'")or die(mysqli_error($con));
                      $row=mysqli_fetch_assoc($query1);
                    ?>

                  <form method="post" class="forms-sample" onsubmit="return confirm('Are you sure you want to mark this as ACTIVE?');">
                    <div class="form-group">
                      <label for="code_no">Code Number</label>
                      <input type="text" name="accession_no" value="<?php echo htmlspecialchars($row['accession_no']); ?>" id="code_no" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="title">Name of Student/s</label>
                      <input type="text" name="nameofstudent" value="<?php echo htmlspecialchars($row['nameofstudent']); ?>" id="title" required="required"  class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="quantity" step="1" min="0" max="1000" value="<?php echo htmlspecialchars($row['quantity']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="pop_id">Course</label>
                        <select name="course" tabindex="-1" class="form-control">
                          <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?>
                          </option>
                        </select>
                    </div>
                      <?php
                        $query1=mysqli_query($con,"SELECT * from arc_special_collection 
                        LEFT JOIN categories ON categories.category_id = arc_special_collection.category_id
                        LEFT JOIN courses ON courses.course_id = arc_special_collection.course_id 
                        where thesis_id='$ID'")or die(mysqli_error($con));
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
                      <label for="moa_id">Category</label>
                        <select name="category" class="form-control" tabindex="-1">
                          <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?>
                          </option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="issn_no">Date</label>
                      <input type="text" name="deyt" id="issn_no" value="<?php echo htmlspecialchars($row['deyt']); ?>" class="form-control">
                    </div>

                    <button type="submit" name="update" class="btn btn-success me-2" >Archive</button>
                    <a href="javascript: history.go(-1)"><button type="submit" name="cancel2"class="btn btn-light">Cancel</button></a>
                  </form>

                <?php
                  if (isset($_POST['update'])) {
                    $accession_no = $_POST['accession_no'];
                    $nameofstudent=$_POST['nameofstudent'];
                    $course=$_POST['course'];
                    $title=$_POST['title'];
                    $category=$_POST['category'];
                    $deyt=$_POST['deyt'];
                    $quantity=$_POST['quantity'];
                    $remarks= 'Available';

                    {
                      mysqli_query($con,"delete from arc_special_collection where thesis_id = '$ID' ")or die(mysql_error());
                      mysqli_query($con," INSERT INTO special_collection (accession_no,nameofstudent,course_id,quantity,title,deyt,category_id,remarks) VALUES ('$accession_no','$nameofstudent','$course','$quantity','$title','$deyt','$category','$remarks') ") or die(mysqli_error($con));
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