<?php
	$servername = "localhost";
	$database = "web";
	$username = "root";
	$password = "pass";
	
/*
	
			$image = $_FILES['image']['tmp_name'];
			$imagename = $_FILES['image']['name'];
			$file_to_saved = "dcuments/".$imagename;
			move_uploaded_file($image, $file_to_saved);
*/
			
	

	$conn = mysqli_connect($servername, $username, $password, $database);

	if (!$conn) {
      $message = "false";
			echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
			$message = "successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
/*

	$sql = "INSERT INTO news (IDnews, IDwriter,imgtitle,title,content,video) VALUES ('000009', '000002','".$file_to_saved."','test data base 2','nothing in this content 2','nothing 2')";
	
	if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
	} else {
	      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}*/
	//--------------------------------------- get data


	$sql = "SELECT * FROM news";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result);

	echo $row['IDnews'];

	header("content-type:image/jpeg");
	echo $row['IMGHeaders'];



	mysqli_close($conn);

?>