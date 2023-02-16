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
        <title>GSBE </title>

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
                  <h4 class="card-title">Add Thesis</h4>
                  <p class="card-description">
                    Add elements
                  </p>

                  <!-- content starts here -->
                  <form method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="code_no">Code Number</label>
                      <input type="text" name="code" id="call_no" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="students_name">Student/s Name</label>
                      <input type="text" name="name" id="students_name" required="required"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="course">Course</label>
                        <select name="course" tabindex="-1" class="form-control">
                          <option selected disabled>-- Select Course --</option>
                          <?php
                             $result= mysqli_query($con,"select * from courses") or die (mysql_error());
                             while ($row= mysqli_fetch_array ($result) ){
                             $id=$row['course_id'];
                          ?>
                          <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="no-copy">Number of Copy</label>
                      <input type="text" name="quantity" id="no-copy" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="title">Title<span class="required" style="color:red;">*</span></label>
                      <input type="text" name="title" autocomplete="off" id="title" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="category">Category</label>
                        <select name="category" tabindex="-1" class="form-control">
                          <option selected disabled>-- Select Category --</option>
                          <?php
                             $result= mysqli_query($con,"select * from categories") or die (mysql_error());
                             while ($row= mysqli_fetch_array ($result) ){
                             $id=$row['category_id'];
                          ?>
                          <option value="<?php echo $row['category_id']; ?>"><?php echo $row['categories']; ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="text" name="date" id="date" autocomplete="off" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary me-2" >Submit</button>
                    <a href="javascript:history.back()"><button type="button" name="cancel" class="btn btn-light">Cancel</button></a>
                  </form>
                  
                <?php
                  if (isset($_POST['update'])) {
                    $code = mysqli_real_escape_string($con,$_POST['code']);
                    $name = mysqli_real_escape_string($con,$_POST['name']);
                    $course = mysqli_real_escape_string($con,$_POST['course']);
                    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
                    $title = mysqli_real_escape_string($con,$_POST['title']);
                    $category = mysqli_real_escape_string($con,$_POST['category']);
                    $date = mysqli_real_escape_string($con,$_POST['date']);

                    if ($quantity == 0 ) {
                      $remarks = 'Not Available';
                    }else{
                      $remarks = 'Available';
                    }
  
                      mysqli_query($con,"INSERT into special_collection (accession_no, nameofstudent, course_id, quantity, title, deyt, category_id, remarks)
                      values ('$code', '$name', '$course','$quantity', '$title', '$date','$category','$remarks')")or die(mysql_error());
                      echo "<script>alert('Special Collection successfully added!'); window.location='add_special_collection.php'</script>";
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