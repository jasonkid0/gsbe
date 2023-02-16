<?php

include('../../includes/dbcon.php');

$get_id = $_GET['ebook_id'];

$query1 = mysqli_query($con, "SELECT * FROM ebooks WHERE ebook_id='$get_id'") or die(mysqli_error($con));
$row = mysqli_fetch_assoc($query1);
// delete current file
$delete_file = "../../../../ebooks/" . $row['fileName'];
if (!unlink($delete_file)) {
    echo ("$delete_file cannot be deleted due to an error");
} else {
    mysqli_query($con, "delete from ebooks where ebook_id = '$get_id' ") or die(mysqli_error($con));
    echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
}