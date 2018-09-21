<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Rising Institute</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #bg{
    background: url("back_index.jpg") no-repeat center center fixed;

    background-size: 100% 100%;

    height: 100%;

    position: absolute; 

    width: 100%;
    color:white;
  }
</style>
</head>


<body id="bg">

  <div class="container" style="padding-top: 1%">
    <div class="jumbotron">
      <img class="img-responsive" src="logo.png" alt="logo" width="120" height="100" style="margin-left:0;padding-left:0;position: relative;float: left;padding-top: 0%;margin-top: 0px"> 
      <h1 style="font-family: Acens;color: black ">THE RISING INSTITUTE</h1>
    </div>
    <div  style="background-color: rgba(1,1,1,0.0)">
      <div class="row">
        <div class="col-sm-6">
          <img class="img-responsive img-rounded" src="photo.png"  alt="logo" width="460" height="345" style="object-fit: fill;object-position: fixed;margin-left:0;padding-left:0"> 
        </div>

        <div id="form">
         <div class="col-sm-6 text-center">
           <form class="form-horizontal" style="height:200%;" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="radio-inline">
              <label><input type="radio" name="check" id="stu_radio" value="student">Student</label>
            </div>
            <div class="radio-inline">
              <label><input type="radio" name="check" id="fac_radio" value="faculty">Faculty</label>
            </div>
            <div class="form-group" style="padding-top:10px">
              <label class="control-label col-sm-2" for="email">User ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="user_id" placeholder="Enter user id" name="uname">
              </div>
            </div>
            <div class="form-group"><br>
              <label class="control-label col-sm-2" for="pwd">Password:</label>
              <div class="col-sm-10"> 
                <input type="password" class="form-control col-sm-10" id="pwd" placeholder="Enter password" name="pword">
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <br>
                 <button type="submit" class="btn btn-default" id="login">Login</button>
             </div>
           </div>
          </form>
         <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
           <br>
           <label>OR</label>
           <br>
           <a href="signup.php">
            <button type="button" class="btn btn-default" id="signup" >Sign Up</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $servername="fdb23.freehostingeu.com";
  $username="2831331_phpdb";
  $password="akshayag98";
  $dbname="2831331_phpdb";
  $conn=new mysqli($servername,$username,$password,$dbname);
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }

  $check=$_POST["check"];
  $user=$_POST['uname'];
  $pass=$_POST['pword'];
  $flag=0;
  if (!empty($_POST["uname"]) && !empty($_POST["pword"]) && strcmp($check,'student')==0 && !empty($_POST["check"])) {
    $sql="select * from students where id='".$user."'";
    $result = $conn->query($sql);
    $flag=0;
    if ($result->num_rows > 0) {

      $row = $result->fetch_assoc();

      if (strcmp($row["id"],$user)==0 && strcmp($row["password"],$pass)==0) {
        session_start();
        $_SESSION['rno']=$user;
        $_SESSION['class']=$row['class'];
        //header("location: student_all.php");
        echo "<script>window.location = 'student_all.php'</script>";
        $flag=1;  
      }
    } 
    if($result->num_rows==0 || $flag==0) {
       echo "<script>alert('invalid username or password')</script>";
    }
  }

  else if (!empty($_POST["uname"]) && !empty($_POST["pword"]) && strcmp($check,'faculty')==0 && !empty($_POST["check"])) {
    $sql="select uid,password from faculty where uid='".$user."' and password='".$pass."'";
    $result = $conn->query($sql);
    $flag=0;
    if ($result->num_rows > 0) {

      $row = $result->fetch_assoc();

      if (strcmp($row["uid"],$user)==0 && strcmp($row["password"],$pass)==0) {
        session_start();
        $_SESSION['user_name']=$user;
        echo "<script>window.location = 'teacher_dos.php'</script>";
        $flag=1;  
      }
    } 
    if($result->num_rows==0 || $flag==0) {
      echo "<script>alert('invalid username or password')</script>";
    }
  }

}
?>
</html>
