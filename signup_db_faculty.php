<!DOCTYPE html>
<html>
<head>
	<title>signup faculty</title>
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
			$pass=$_POST["password"];
			$uid=$_POST["uid"];
			echo "connection successful"."<br>";
			if (!empty($_POST["uid"]) && !empty($_POST["password"]) && !empty($_POST["name"])) {
				$sql="INSERT INTO faculty (name,uid,password) VALUES ('$name','$pass','$uid')";
			
				if($conn->query($sql)===TRUE){
					echo "record inserted"."<br>";
					echo "$conn->insert_id"."<br>";
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