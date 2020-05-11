<?php
  session_start();
  if(!isset($_SESSION['user_name'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #add {
    position: fixed;
    bottom: 10px;
    right: 20px;
    border-radius: 60%;
  }

  #ta1 #ta2{
    position:relative;
    margin-left: 13px;
    max-width: 96%;
  }
  .navbar{
    position: sticky;
  }

</style>
<!-- <script>
  function validity()
  {
    var dt=new Date();

    if(dt.getDay()==6 || dt.getDay()==0)      {
      document.getElementById("add").disabled=true;
      var $elem = document.getElementById("add");
      $elem.setAttribute("style","cursor:not-allowed");

    }  
  }
  function click()
  {
    var dt=new Date();
    if(dt.getDay()==6 || dt.getDay()==0) 
      window.alert("Submission not allowed on Saturdays and Sundays");
  }
</script>
-->
</head>
<body onload="validity()">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><div class="navbar-brand" >The Rising Institute</div></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" style="padding-left: 20px"><a href="teacher_dos.php">All Submissions</a></li>
      <li style="padding-left: 15px"><a href="teacher_upload.php">Upload Assignment</a></li>
      <li style="padding-left: 15px"><a href="uploaded_assignment.php">Assignments Uploaded</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li style="padding-right: 10px"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2 class="text-center">All Assignments</h2>  
    <form style="position: relative;float: right;" action="teacher_search.php" method="POST">
      <input type="text" name="rnum" placeholder="search a roll number" />
      <input type="submit" class="btn btn-info btn-sm"name="search" value="search" />
    </form>
    <br/>
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center">Roll number</th>
          <th class="text-center">Assignment Name</th>
          <th class="text-center">Class</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $servername="-";
        $username="-";
        $password="-";
        $dbname="-";
        $conn=new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error){
          die("Connection failed: " . $conn->connect_error);
        }
      
        $sql = "SELECT * from submission s,(select q_id from assignments where tid='".$_SESSION['user_name']."') x where s.question_id = x.q_id ;";
        $result = $conn->query($sql);
        if($result === FALSE) { 
          die(mysql_error()); 
        }

        if ($result->num_rows > 0) {
  
          while($row = $result->fetch_assoc()){
            ?>

            <tr>
              <td class="text-center"><?php echo $row['sid']?></td>
              <td class="text-center"><?php echo $row['assignment_name']?></td>
              <td class="text-center"><?php echo $row['class']?></td>
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
