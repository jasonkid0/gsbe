<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
$ID=$_GET['thesis_id'];
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
                <h4 class="card-title">Archive Thesis</h4>
                  <p class="card-description" style="color:red; font-size: 17px;">
                    <b>You are about to send this lists into "INACTIVE STATUS"</b>
                  </p>

                  <!-- content starts here -->
                  <?php
                  $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
                    LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
                  $row=mysqli_fetch_array($query);
                  ?>

                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="code_no">Code Number</label>
                      <input type="text" name="code" value="<?php echo $row['accession_no']; ?>" id="call_no" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="students_name">Student's Name</label>
                      <input type="text" name="name" value="<?php echo $row['nameofstudent']; ?>" id="title" required="required"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="course">Course</label>
                        <select name="course" tabindex="-1" class="form-control">
                          <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?>
                          </option>
                          <?php
                            $result= mysqli_query($con,"select * from courses where course_id not in ('".$row['course_id']."')") or die (mysqli_error($con));
                            while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['course_id'];
                          ?>
                          <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <?php
                      $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
                        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
                      $row=mysqli_fetch_array($query);
                    ?>
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" value="<?php echo $row['title']; ?>" id="title" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="category">Category</label>
                        <select name="category" tabindex="-1" class="form-control">
                          <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?>
                          </option>
                          <?php
                            $result= mysqli_query($con,"select * from categories where category_id not in ('".$row['category_id']."')") or die (mysqli_error($con));
                            while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['category_id'];
                          ?>
                          <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <?php
                      $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
                        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
                      $row=mysqli_fetch_array($query);
                    ?>
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="text" name="date" id="edition" value="<?php echo $row['deyt']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="reason">Reason:</label>
                        <select name="reason" required="required" tabindex="-1" class="form-control">
                          <option value="Transferred">Transferred</option>
                          <option value="Donated">Donated</option>
                          <option value="Weeded">Weeded</option>
                          <option value="Archived">Archived</option>
                        </select> 
                    </div>
                    <button type="submit" name="update11" class="btn btn-primary me-2" >Submit</button>
                    <button type="submit" name="cancel" class="btn btn-light">Cancel</button>
                  </form>
                <?php
                  if (isset($_POST['update11'])) {
                    $accession_no = $_POST['accession_no'];
                    $nameofstudent=$_POST['nameofstudent'];
                    $course=$_POST['course'];
                    $title=$_POST['title'];
                    $category=$_POST['category'];
                    $deyt=$_POST['deyt'];
                    $quantity=$_POST['quantity'];
                    $remarks=$_POST['remarks'];
                    $oras = date('Y-m-d');

                    {
                      mysqli_query($con,"delete from special_collection where thesis_id = '$get_id' ")or die(mysql_error());
                      mysqli_query($con," INSERT INTO arc_special_collection (accession_no,nameofstudent,course_id,title,quantity,deyt,category_id,remarks,oras) VALUES ('$accession_no','$nameofstudent','$course','$title','$quantity','$deyt','$category','$remarks','$oras') ") or die(mysqli_error($con));
                      echo "<script>alert('Archiving Successful!');history.go(-2);</script>";    
                    }

                  } elseif (isset($_POST['cancel'])) {
                    echo "<script>alert('Archiving Canceled!');history.go(-2);</script>";
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