<?php
include 'connection.php';
$s_id = $_GET['s_id'];

$sql = " UPDATE `apply_leave_staff` SET `s_status`='approved' WHERE s_id = $s_id ";
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