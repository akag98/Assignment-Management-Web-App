<!DOCTYPE html>
<html>
<head>
	<title>signup student</title>
</head>
<body>



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
			$name=$_POST["name"];
			$rnumber=$_POST["rnumber"];
			$pass=$_POST["password"];
			$class=$_POST["class"];
			$uname=$_POST["uname"];
			echo "connection successful"."<br>";
			if (!empty($_POST["uname"]) && !empty($_POST["password"]) && !empty($_POST["rnumber"]) && !empty($_POST["class"]) && !empty($_POST["name"])) {
				$sql="INSERT INTO students (name,id,password,class) VALUES ('$name','$rnumber','$pass','$class')";
			
				if($conn->query($sql)===TRUE){
					header("location:index.php");
				}
				else{
					echo "error".$conn->error;
				}
			}
			else{
				echo "uname:".$_POST["uname"]."<br>";
				echo "pass:".$_POST["pass"]."<br>";
				echo "enter complete data"."<br>";
			}

		}
		// header("location: index.php");
// $sql = "SELECT * FROM person";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "<table><tr><th>user name</th><th>password</th></tr>";
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "<tr><td>".$row["uname"]."</td><td>".$row["password"]."</td></tr>";
//     }
//     echo "</table>";
// } else {
//     echo "0 results";
// }


	?>
</body>
</html>