<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Manage Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="admin.css">
  <link rel="stylesheet" type="text/css" href="manage.css">
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
        <li><a href="#">Login <i class="fas fa-caret-down"></i></a>
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
        <li><img src="default.png" alt="Avatar" class="avatar"></li>
        <li><a href="admin.php"> Welcome <?php echo($_SESSION['usrname']); ?>  <i class="fas fa-caret-down"></i></a>
          <ul>
            <li><a href="add_staff.php">Add Staff</a></li>
            <li><a href="add_student.php">Add Student</a></li>
            <li><a href="manage_staff.php">Manage Staff</a></li>
            <li><a href="manage_student.php">Manage Student</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>  
  </div>
  <h1 style="text-align: center;">Student Details</h1>
  <div class="container">
      <br>       
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Sem</th>
            <th>Dept</th>
            <th>View</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'connection.php';

          $sql = " select * from student ";
          $result = mysqli_query($con,$sql);
    
          while($row = mysqli_fetch_assoc($result))
          {
            $id=$row['id'];
            echo '<tr>' ;
            echo '<td>' . $row['id'] . '</td>' ;
            echo '<td>' . $row['first_name'] . '</td>' ;
            echo '<td>' . $row['last_name'] . '</td>' ;
            echo '<td>' . $row['email'] . '</td>' ;
            echo '<td>' . $row['pho'] . '</td>' ;
            echo '<td>' . $row['sem'] . '</td>' ;
            echo '<td>' . $row['department'] . '</td>' ;
            echo "<td><a href='view_student.php?id=$id' ><button type='button' class='btn btn-info' style='background: yellow;'>View</button></td>";
            echo "<td><a href='update_student.php?id=$id'><button type='button' class='btn btn-warning' style='background: aqua;'>Update</button></a></td>";
            echo "<td><a href='delete_student.php?id=$id'><button type='button' class='btn btn-danger' style='background: lightcoral;'>Delete</button></a></td>";
            echo '</tr>';
          }
          ?> 
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>