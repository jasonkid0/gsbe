<?php 
include('../../includes/dbcon.php');

$get_id=$_GET['pop_id'];
?>

<?php
if (isset($_POST['submit1'])) {
$subject1 = mysqli_real_escape_string($con,$_POST['pop1']);
$result1=mysqli_query($con,"select * from tbl_placeofpublications WHERE placeofpublication='$subject1' ") or die (mySQL_error());
$row1=mysqli_num_rows($result1);

if ($row1 > 0)
{
echo "<script>alert('Place of Publication already Exist!'); window.location='pop.php'</script>";
}
else
{       
    mysqli_query($con,"UPDATE tbl_placeofpublications SET placeofpublication = '$subject1' where pop_id = $get_id")or die(mysql_error());
    echo "<script>alert('Place of Publication successfully updated!'); window.location='pop.php'</script>";
}
}          
  ?>