<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
              

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand" ><a href="index.php">The Rising Institute</a></div>
    </div>
    <ul class="nav navbar-nav">
      <li style="padding-left: 20px"><a>Sign UP</a></li>

    </ul>
  </div>
</nav>



<form action ="signup_db_student.php" method="post">

<div class="container">
  <h1 style="padding-bottom:20px" class="text-center">Welcome to Rising Institute</h1>     
  <div class="row">

 
<div class="col-sm-6" style="border-right: 1px solid grey">
    <h3 class="text-center">Student</h3>

    <div class="form-group">

    <label class="control-label col-sm-3">Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">

    </div>
    </div>

<div class="form-group">
    <label class="control-label col-sm-3" >Roll Number:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="roll_no" placeholder="Enter your roll no." name="rnumber">
    </div>
    </div>

  <div class="form-group">
  <label class="control-label col-sm-3" >Class:</label>
  <div class="col-sm-9">
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
  
  <div class="form-group">
    <label class="control-label col-sm-3" >User Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="user_name" placeholder="Enter your user name" name="uname">
    </div>
    </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Password:</label>
    <div class="col-sm-9"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-5 col-sm-10">
      <button type="submit" class="btn btn-default text-center" id="sub" name="submit" value="Student">Submit</button>
    </div>
  </div>
  </div>


</form>




<form action="signup_db_faculty.php" method="post">

  <div class="col-sm-6">
    <h3 class="text-center">Faculty</h3>

<div class="form-group">
    <label class="control-label col-sm-2" >Name:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="pwd" placeholder="Enter name" name="name">
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" >User Id:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="user_id" placeholder="Enter user id" name="uid">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" >Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
  </div>


  <div class="form-group"> 
    <div class="col-sm-offset-5 col-sm-10">
      <button type="submit" class="btn btn-default text-center" id="sub" name="submit" value="Faculty">Submit</button>
    </div>
  </div>
  </div>
</div>
</div>
</form>

</body>
</html>
