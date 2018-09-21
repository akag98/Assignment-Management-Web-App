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
      <li  style="padding-left: 20px"><a href="teacher_dos.php">All Submissions</a></li>
      <li class="active" style="padding-left: 15px"><a href="teacher_upload.php">Upload Assignment</a></li>
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
  </div>


  <form class="form-horizontal" style="height:200%;" method="POST" action="upload.php" enctype="multipart/form-data">
    <div class="form-group" style="padding-top:10px">
      <label class="control-label col-sm-2" >Assignment Title:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" placeholder="Enter title of assignment" name="title"><br/>
      </div>
      <div class="col-sm-8" style="margin-left: 17%">
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
    </div>
    <div class="form-group"><br>
      <label class="control-label col-sm-2" >Class:</label>
      <div class="form-group">
        <div class="col-sm-1">
          <select class="form-control " id="cls" name="class">
            <option>12</option>
            <option>11</option>
            <option>10</option>
            <option>9</option>
            <option>8</option>
            <option>7</option>
            <option>6</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-5 col-sm-10">
        <br>
        <button type="submit" class="btn btn-default"  name="submit">upload</button>
      </div>
    </div>
  </form>



</body>
</html>
