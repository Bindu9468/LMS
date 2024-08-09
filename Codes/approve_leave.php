<?php
session_start();
$s_id= $_SESSION['id'];
include 'connection.php';
$sql = "SELECT * FROM `staff` WHERE s_id=$s_id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$dept = $row['s_department'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leave Status</title>
	<link rel="stylesheet" type="text/css" href="staff.css">
  <link rel="stylesheet" type="text/css" href="approve.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	<input type="checkbox" id="check">
    <label for="check">
      	<i class="fas fa-bars" id="btn"></i>
      	<i class="fas fa-times" id="cancel"></i>
    </label>
    <nav class="sidebar">
      	<div>
        	<img class="logo" src="logo.jpeg">
        	<ul>
          		<li><a href="index.php">Home</a></li>
          		<li><a href="#">Login<i class="fas fa-caret-down"></i></a>
            		<ul>
              			<li><a href="adminlogin.php">Admin login</a></li>
              			<li><a href="stafflogin.php">Staff login</a></li>
              			<li><a href="studentlogin.php">Student login</a></li>
					</ul>
          		</li>
          		<li><a href="about.php">About</a></li>
       		</ul>
      	</div>
    </nav>
    <div class="topbar">
		  <div id="nav">
			<ul>
				<li><?php echo '<img src="data:image;base64,'.base64_encode($row['s_profilephoto']).'" alt="Avatar" class="avatar">'; ?></li>
				<li><a href="#">Welcome <?php echo($_SESSION['usrname']); ?>  <i class="fas fa-caret-down"></i></a>
					<ul>
						<li><a href="staff.php">Profile</a></li>
						<li><a href="apply_leave_staff.php">Apply Leave</a></li>
						<li><a href="leave_status_staff.php">Leave Status</a></li>
            <li><a href="approve_leave.php">Approve leave</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
      </ul>
		  </div>
    </div>
    <br>
    <br>
    <h1 style="text-align: center;">Approve Leave</h1>
  <div class="container">
      <br>       
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Category</th>
            <th>Leave type</th>
            <th>Startdate</th>
            <th>Endingdate </th>
            <th>Approve</th>
            <th>Reject</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'connection.php';
          $selectquery="SELECT * FROM apply_leave_staff WHERE s_id not in ($s_id) and s_status='pending' and s_department='$dept'";
          $resultquery = mysqli_query($con,$selectquery);
          if(mysqli_num_rows($resultquery) > 0){
          while($row = mysqli_fetch_assoc($resultquery))
          {
            $s_id = $row['s_id'];
            echo '<tr>' ;
            echo '<td>' . $row['s_id'] . '</td>' ;
            echo '<td>' . $row['s_firstname'] . '</td>' ;
            echo '<td>' . $row['s_lastname'] . '</td>' ;
            echo '<td>' . $row['s_category'] . '</td>' ;
            echo '<td>' . $row['s_reason'] . '</td>' ;
            echo '<td>' . $row['s_startdate'] . '</td>' ;
            echo '<td>' . $row['s_enddate'] . '</td>' ;
            echo "<td><a href='approve_staff.php?s_id=$s_id'><button type='button' class='btn btn-warning' style='background: aqua;'>Approve</button></a></td>";
            echo "<td><a href='reject_staff.php?s_id=$s_id'><button type='button' class='btn btn-danger' style='background: lightcoral;'>Reject</button></a></td>";
            echo '</tr>';
          }}
          $selectquery="SELECT * FROM apply_leave_student WHERE status='pending' and department='$dept'";
          $resultquery = mysqli_query($con,$selectquery);
          if(mysqli_num_rows($resultquery) > 0){
          while($row = mysqli_fetch_assoc($resultquery))
          {
            $id = $row['id'];
            echo '<tr>' ;
            echo '<td>' . $row['id'] . '</td>' ;
            echo '<td>' . $row['first_name'] . '</td>' ;
            echo '<td>' . $row['last_name'] . '</td>' ;
            echo '<td>' . $row['category'] . '</td>' ;
            echo '<td>' . $row['reason'] . '</td>' ;
            echo '<td>' . $row['start_date'] . '</td>' ;
            echo '<td>' . $row['end_date'] . '</td>' ;
            echo "<td><a href='approve_student.php?id=$id'><button type='button' class='btn btn-warning' style='background: aqua;'>Approve</button></a></td>";
            echo "<td><a href='reject_student.php?id=$id'><button type='button' class='btn btn-danger' style='background: lightcoral;'>Reject</button></a></td>";
            echo '</tr>';
          }}
          
          ?> 
        </tbody>
      </table>
  </div>
</body>
</html>