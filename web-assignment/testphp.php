<?php
							$servername = "localhost";
							$database = "web";
							$username = "root";
							$password = "pass";

							//data
							$Brands = $_POST['brands'];
							$TypeOfDevices = $_POST['typeofdevices'];
							$VideoFooter = $_POST['linkvideo'];
							$Titles = $_POST['title'];
							$Content = $_POST['content'];
							$Date = date("Y/m/d");
							

	
							$image = $_FILES['image']['tmp_name'];
							$imagename = $_FILES['image']['name'];
							$file_to_saved = "dcuments/".$imagename;
							move_uploaded_file($image, $file_to_saved);

			
	

							$conn = mysqli_connect($servername, $username, $password, $database);

							$sql1 = "SELECT * FROM news WHERE IDnews = ( SELECT MAX(IDnews) FROM news ) ";


							$result = mysqli_query($conn, $sql1);

							$row = mysqli_fetch_array($result);

							
							$IDnews1 = $row['IDnews'] + 1;
							echo $IDnews1;
							 // error happened here 



							
							$sql = "INSERT INTO news (IDnews, IDwriter, Brands, TypeOfDevices, Titles, IMGHeaders, Content, VideoFooter, DateNews) VALUES ('".$IDnews1."','000000','".$Brands."','".$TypeOfDevices."','".$Titles."','".$file_to_saved."','".$Content."','youtube.com','".$Date."')";
							
							if (mysqli_query($conn, $sql)) {
								echo "<script type='text/javascript'>alert('succeed');</script>";
							} else {
								echo "<script type='text/javascript'>alert('error');</script>";
								 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
							mysqli_close($conn);

?>