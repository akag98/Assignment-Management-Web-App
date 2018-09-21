<?php
  session_start();
  if(!isset($_SESSION['rno'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Submit Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style >
  .navbar{
    position: sticky;
  }
</style>
</head>
<body>

 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><div class="navbar-brand" >The Rising Institute</div></a>
    </div>
    <ul class="nav navbar-nav">
      <li style="padding-left: 20px"><a href="student_all.php">All Assignments</a></li>
      <li class="active"><a href="student_submission.php">My submission</a></li>
      <li ><a href="assignment_submission.php">Submit Assignment</a></li>
      <li><a href="#">Discussion Forum</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li style="padding-right: 10px"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h2 class="text-center">Submitted Assignments</h2>            
  <table class="table table-hover">
    <thead>
      <tr>
      	<th class="text-center">Assignment ID</th>
        <th class="text-center">Assignment Topic</th>
        <th class="text-center">Details</th>
      </tr>
    </thead>
    <tbody>
      
      <?php

      


      $servername="fdb23.freehostingeu.com";
      $username="2831331_phpdb";
      $password="akshayag98";
      $dbname="2831331_phpdb";
      $conn=new mysqli($servername,$username,$password,$dbname);
      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM submission WHERE sid='".$_SESSION['rno']."'";
      $result = $conn->query($sql);
      if($result === FALSE) { 
        die(mysql_error()); 
      }

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
          ?>
          <tr>
          	<td class="text-center"><?php echo $row['question_id']?></td>
            <td class="text-center"><?php echo $row['assignment_name']?></td>
            <td class="text-center"><a href="student_submission/<?php echo $row['Address'] ?>" target="_blank" class="btn btn-info btn-sm">View</a></td>       
          </tr>
          <?php
        }
      } 
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
