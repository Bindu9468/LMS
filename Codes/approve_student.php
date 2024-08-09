<?php
include 'connection.php';
$id = $_GET['id'];

$sql = " UPDATE `apply_leave_student` SET `status`='approved' WHERE id = $id ";
$approve = mysqli_query($con, $sql);

if($approve)
{
    echo "Approved successfully";
    header('Location: approve_leave.php');
}
else
{
    echo "Error while approving";
}
?>