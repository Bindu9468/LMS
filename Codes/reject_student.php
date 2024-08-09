<?php
include 'connection.php';
$id = $_GET['id'];

$sql = " UPDATE `apply_leave_student` SET `status`='rejected' WHERE id = $id ";
$approve = mysqli_query($con, $sql);

if($approve)
{
    echo "Rejected successfully";
    header('Location: approve_leave.php');
}
else
{
    echo "Error while rejecting";
}
?>