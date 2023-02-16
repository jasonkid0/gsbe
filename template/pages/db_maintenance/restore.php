<?php
if (! empty($response)) {
    ?>
<div class="response <?php echo $response["type"]; ?>
    ">
    <?php echo nl2br($response["message"]); ?>
</div>
<?php
}
?>
<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include '../../includes/navbar.php';
if($_SESSION['role'] == "Administrator" OR "Super Admin")
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
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="input-group">
      <!-- Main row -->
      <div class="col-12 grid-margin stretch-card">
        <!-- Left col -->
        <div class="card">
        <div class="card-body">
                  <h4 class="card-title"><i class= "fa fa-cog fa-spin"></i> Restore Database</h4>
                        <!-- /.box-header -->
                            <form class="forms-sample" method="post" enctype="multipart/form-data" id="frm-restore">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <!-- <input type="file" name="backup_file" class="input-file" /> -->
                                        <input type="file" name="backup_file" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!-- <input type="submit" name="restore" value="Restore"
                                        class="btn btn-primary" /> -->
                                        <button type="submit" name="restore" class="btn btn-success btn-block" style="float: right"><i class="fa fa-save"></i> Restore</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.Left col -->
                
            </div>

            <!-- FOOTER -->
            <?php include '../../includes/footer.php'; ?>
            <!-- FOOTER -->

            </div>
            </div>
            <!-- /.content -->
        </div>
    </html>
<?php }else{
    header("Location: ../samples/404.php");
} ?>

<?php include '../../includes/scripts.php'; ?>


<?php
$conn = mysqli_connect("localhost", "root", "", "gsbe");
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
            echo "<script>alert('Database Restore Completed Successfully!'); window.location='restore.php'</script>";
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
    } // end if file exists
    return $response;
}
?>