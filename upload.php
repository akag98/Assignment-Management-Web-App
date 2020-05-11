<?php
	session_start();
	if(!isset($_SESSION['user_name'])){
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Assignment</title>
</head>
<body>
	
	


	<?php
	$target_dir = "teacher_upload/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$file_name = basename($_FILES["fileToUpload"]["name"]);	
	$uploadOk=1;

	if(isset($_POST['submit']))
	{
		$target_dir = "teacher_upload/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$file_name = basename($_FILES["fileToUpload"]["name"]);	
		$uploadOk=1;
		echo $target_file;
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		//Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}


		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		}

		else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "<br>The file ". $file_name. " has been uploaded.";

				if ($_SERVER["REQUEST_METHOD"] == "POST") {

					$servername="-";
					$username="-";
					$password="-";
					$dbname="-";
					$conn=new mysqli($servername,$username,$password,$dbname);
					if($conn->connect_error){
						die("Connection failed: " . $conn->connect_error);
					}
					$title=$_POST["title"];
					$class=$_POST["class"];
					echo $file_name;
					if (!empty($_POST["title"]) && !empty($_POST["class"]) && $uploadOk==1) {
						$sql="INSERT INTO assignments (q_id, assignment_name , tid, class, Address) VALUES (NULL, '".$title."', '".$_SESSION['user_name']."', '".$class."' , '".$file_name."');";

						if($conn->query($sql)===TRUE){
							echo "<script>alert('assignment uploaded')</script>";
							header("location:teacher_dos.php");
						}
						else{
							echo "<script>alert('Error while uploading assignment')</script>";
							echo "error".$conn->error;
						}
					}
				}
			} 
			else {
				$uploadOk=0;
				echo "Sorry, there was an error uploading your file.";

			}
		}


	}
	

	// $sql = "SELECT * FROM uploads";
	// $result = $conn->query($sql);
	// if($result === FALSE) { 
	// 	die(mysql_error()); 
	// }

	// if ($result->num_rows > 0) {
	// 	?>
	<!-- // 	<table border="1">
	// 		<tr>
	// 			<th>user name</th>
	// 			<th>password</th>
	// 			<th>file name</th>
	// 		</tr>;
-->
// 		<?php
	// 		while($row = $result->fetch_assoc())
	// 		{
	// 			?>
	// 			<!-- <tr>
	// 				<td><?php echo $row['user_id'] ?></td>
	// 				<td><?php echo $row['password'] ?></td>
	// 				<td><?php echo $row['file_name'] ?></td>
	// 				<td><a href="upload_files/<?php echo $row['file_name'] ?>" target="_blank">view file</a></td>
	// 				<td><?php echo "<a href='download.php?nama=upload_files/".$row['file_name']."'>download</a> " ?></td>
// 			</tr> -->
// 			<?php
	// 		}
	// 		?>
<!-- 	// 	</table>
	-->	// 	<?php
	// }
	// else {
	// 	echo "0 results";
	// }


	?>
</body>
</html>
