<?php 
include('../../includes/dbcon.php');

$get_id=$_GET['category_id'];
?>

<?php
if (isset($_POST['submit1'])) {
$subject1 = mysqli_real_escape_string($con,$_POST['cat1']);
$result1=mysqli_query($con,"select * from categories WHERE categories='$subject1' ") or die (mySQL_error());
$row1=mysqli_num_rows($result1);

if ($row1 > 0)
{
echo "<script>alert('Category already Exist!'); window.location='categories_special_collection.php'</script>";
}
else
{       
    mysqli_query($con,"UPDATE categories SET categories = '$subject1' where category_id = $get_id")or die(mysql_error());
    echo "<script>alert('Category successfully updated!'); window.location='categories_special_collection.php'</script>";
}
}          
  ?>