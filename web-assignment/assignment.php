
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="iconTitle.ico" type="image/x-icon">
	<title> Your News</title>
<link rel="stylesheet" type="text/css" href="css\header.css">
<link rel="stylesheet" type="text/css" href="css\body.css">
<link rel="stylesheet" type="text/css" href="css\footer.css">
<link rel="stylesheet" type="text/css" href="css\signin.css">
<link rel="stylesheet" type="text/css" href="css\write.css">	
<script src="js\head.js"></script>
<script src="js\login.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- form write news-->
	<div id="myNav1" class="overlay1 fixed-top">
	  	<div class="overlay-content1">
	  		<div class="container-fluid">
	  			<div href="javascript:void(0)" 	" onclick="closeWriter() " 
			  				style="cursor: pointer;color: #fff; font-size: 120%; height: 20px; float: right;">Close</div>
	  			<div class="row">
		  			<div class="col-md-9">
		  				<form action="" method="post" enctype="multipart/form-data" class="col-md-12 form-group">
				  			<label for="usr" style="color:#fff ; float:left;">Title</label>
				  			<input type="text"  name = "title" class="form-control" >
				  			<div class="form-group">
								  <label for="comment" style="color:#fff ; float: left;">Content:</label>
								  <textarea class="form-control" name="content" ></textarea>
							</div>
			  			</div>
			  			<div class="col-md-3 row">
			  				<!-- insert brands-->
			  				<label for="usr" style="color:#fff ; float:left ; width: 100%;">Brands</label>
				  			<input type="text" name="brands" class="form-control" style=" float:left ; width: 100%;">
				  			<!-- insert type of devices-->
				  			<label for="usr" style="color:#fff ; float:left; width: 100%;">Type Of Devices</label>
				  			<input type="text" name="typeofdevices"  class="form-control" style=" float:left ; width: 100%;">
							<!-- insert img-->
							<label for="usr" style="color:#fff ; float:left ; width: 100%;">Image</label>
							<input type="text" name="image"  style=" float:left ; width: 100%;;">
							<input type="submit" name="submit1" class="form-control" value="Post" style=" float:left ; width: 100%;">
							<!-- insert link of video form youttube-->
							<label for="usr" style="color:#fff ; float:left;">Video</label>
							<input type="text" name="linkvideo"  class="form-control" style=" float:left ; width: 100%;">
						</form>
					</div>
					<?php
						if(isset($_POST["submit1"]))
						{
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
							$image = $_POST['image'];
							$Date = date("Y/m/d");
							
			
	

							$conn = mysqli_connect($servername, $username, $password, $database) or die("dieeeeeeeeee");

							$sql1 = "SELECT * FROM news WHERE IDnews = ( SELECT MAX(IDnews) FROM news ) ";


							$result = mysqli_query($conn, $sql1);

							$row = mysqli_fetch_array($result);

							
							$IDnews1 = $row['IDnews'] + 1;
							echo $IDnews1;


							
							$sql = "INSERT INTO news (IDnews, IDwriter, Brands, TypeOfDevices, Titles, IMGHeaders, Content, VideoFooter, DateNews) VALUES ('".$IDnews1."','000000','".$Brands."','".$TypeOfDevices."','".$Titles."','".$image."','".$Content."','".$VideoFooter."','".$Date."')";
							
							if (mysqli_query($conn, $sql)) {
								echo "<script type='text/javascript'>alert('succeed');</script>";
							} else {
								echo "<script type='text/javascript'>alert('error');</script>";
								 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
							mysqli_close($conn);
						}
					?>
		  		</div>
	  		</div>
	  	</div>
	 </div>
	<!-- form sign in-->
	<div id="signin" class="overlay fixed-top">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeSignin()">&times;</a>
	  <div class="overlay-content">
		<div class="container">
		    	<div class="row">
					<form class="col-md-12 form-group" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="usr" style='color:WHITE'>Name:</label>
							<input type="text" class="form-control" id="usrin" name="username">
						</div>
						<div class="form-group">
							<label for="pwd" style='color:WHITE'>Password:</label>
							<input type="password" class="form-control" id="pwdin" name="password">
							
						</div>
							<button type="submit" class="btn btn-primary" name = "submit3">Log In</button>
					</form>
					<?php
						if(isset($_POST["submit3"]))
						{
							$servername = "localhost";
							$database = "web";
							$username = "root";
							$password = "pass";

							//data
							$name = $_POST['username'];
							$pass = $_POST['password'];

							$conn = mysqli_connect($servername, $username, $password, $database) ;

							$sql1 = "SELECT * FROM writer  ";


							$result = mysqli_query($conn, $sql1);

							$row = mysqli_fetch_array($result);
							if(strcmp($row['Password'], $pass) == 0 )
							{
								echo "<script type='text/javascript'>alert('log in succeed');login();</script>";
								echo "<script></script>";
								
							}
							else
							{
								echo "<script type='text/javascript'>alert('log in error');</script>";
							}

							mysqli_close($conn);
						}
					?>
				</div>
			</div>
	  </div>
	</div>
	<!-- form sign up-->
	<div id="signup" class="overlay fixed-top">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeSignup()">&times;</a>
	  <div class="overlay-content">
		<div class="container">
		    	<div class="row">
					<form class="col-md-12 form-group" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="usr" style='color:WHITE'>Name:</label>
							<input type="text" class="form-control" id="usrup" name="username">
						</div>
						<div class="form-group">
							<label for="pwd" style='color:WHITE'>Password:</label>
							<input type="password" class="form-control" id="pwdup" name="password">
							<label for="pwd" style='color:WHITE'>Rewrite Password:</label>
							<input type="password" class="form-control" id="pwdreup" name="repassword">
						</div>
							<button type="submit" class="btn btn-primary" name="submit2">Register</button>
					</form>
					<?php
						if(isset($_POST["submit2"]))
						{
							$servername = "localhost";
							$database = "web";
							$username = "root";
							$password = "pass";

							//data
							$name = $_POST['username'];
							$pass = $_POST['password'];
							$repass = $_POST['repassword'];

							$conn = mysqli_connect($servername, $username, $password, $database) ;

							$sql1 = "SELECT * FROM writer WHERE IDwriter = ( SELECT MAX(IDwriter) FROM writer ) ";


							$result = mysqli_query($conn, $sql1);

							$row = mysqli_fetch_array($result);

							
							$IDwriter1 = $row['IDwriter'] + 1;
							
							if(strcmp($pass, $repass) == 0)
							{
								$sql = "INSERT INTO writer (IDwriter, UserName,Password) VALUES ('".$IDwriter1."','".$name."','".$pass."')";
								
							
								if (mysqli_query($conn, $sql)) {
									echo "<script type='text/javascript'>alert('succeed');</script>";
									
								} else {
									echo "<script type='text/javascript'>alert('error');</script>";
									 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								}
							}
							else
							{
								echo "<script type='text/javascript'>alert('passwords are not the same');</script>";
							}

							mysqli_close($conn);
						}
					?>
				</div>
			</div>
	  </div>
	</div>
	<!-- Header-->
	<div class="container-fluid sticky-top" id = "header">
		<div class = "row ">
			<div class = "col"><img class = "card-img-top" id = "icon" src="img/icon.png"></div>
			<div class = "col"><h1 id="header1">Tech News</h1></div>
			<div class = "col" id = "login">
				<div id = "singinstring" style="width: auto;"><a href = "#" onclick="openSignup()">Sign Up </a></div>
				<div id = "singupstring" style="width: auto;"><a href = "#" onclick="openSignin()">Sign In </a></div>
				
				<div style="height: 100%;width: 100%;float: right;"><img  src="open-iconic-master\svg\document.svg" style="height: 20%;width: 20%;float: right; cursor:pointer " onclick="openWriter()"></div>
	        </div>
		</div>
		<div class = "row" id = "brand">
			<form action="brand.php?check=1&amp;b=LG" class="col"  method="post" target="_blank" >
				<input type="submit" name="submitLG" class="col" id = "lg" value="LG"  href="#" style="width: 100%;cursor: pointer;background-color: #fff" >
			</form>
			<form action="brand.php?check=1&amp;b=SS" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "ss" value="SAMSUNG"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff"background-color: #fff"background-color: #fff" >
			</form>
			<form action="brand.php?check=1&amp;b=AP" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "ap" value="APPLE"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff"background-color: #fff" >
			</form>
			<form action="brand.php?check=1&amp;b=SN" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "so" value="SONY"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff" >
			</form>
			<form action="brand.php?check=1&amp;b=PX" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "pi" value="PIXEL"  href="#" style="width: 100%;cursor: pointer;background-color: #fff" >
			</form>
		</div>
		<hr style="margin-top: 0px">
	</div>
	<!-- body-->
	<div class="container">
		<!-- video-->
		<div class = "row mx-5" >
			<div id ="videoBody" align="center"  class = "col-md-12 px-5">
				<iframe width="100%" height="400px"
					src="https://www.youtube.com/embed/BXogn99dOec?autoplay=1">
				</iframe>
			</div>
		</div>
		<!--  log news-->
		<div class="row px-5 py-3 mx-5" >
			<div class="col-md-8 " style="height: 300px">
				<div class="col-md-12 log logw row " style="margin: 0px">
								<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news ORDER BY IDnews DESC LIMIT 0, 1";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);
								echo "<div class='col-md-6 centerbody' style='margin-bottom: auto; margin-top: auto; width: 100%;' >";
								echo "<img class='card-img-top' src='";
								echo $row['IMGHeaders'];
								echo "' ></div>";
								echo "<div class='col-md-6' style='margin-bottom: auto; margin-top: auto; width: 100%;'>";
								echo "<div class='card-body cardbody' style='padding:0px;'>";

								//string right here

								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' >";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";
								

								mysqli_close($conn);
								?>
							</div>
							
					</div>
				</div>
			</div>
			<div class="col-md-4" style="height: 300px" >
				<div class="col-md-12 log logw">
						<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news ORDER BY IDnews DESC LIMIT 1, 1";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);
								echo "<img class='card-img-top' src='";
								echo $row['IMGHeaders'];
								echo "'  style='height: 60% ; margin: auto;' >";
								echo "<div class='card-body cardbody' style='height: 40%; padding: 0px;'>";

								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";


								mysqli_close($conn);
								?>
					</div>
				</div>
			</div>
		</div>
		<!-- second row-->
		<div class="row px-5 py-3 mx-5" >
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="row pb-2" style="height: 150px">
						<div class="col-md-12 log logw row " style="margin: 0px">
						
								
								<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news ORDER BY IDnews DESC LIMIT 2, 1";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);

								echo "<div class='col-md-6 ' style='padding: 0px; margin-bottom : auto; margin-top: auto; height: 100%; width: 40%;' >";
								echo "<img class='card-img-top' src='";
								echo $row['IMGHeaders'];
								echo "' ></div>";
								echo "<div class='col-md-6' style='padding: 0px'>";
								echo "<div class='card-body'>";


								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";


								mysqli_close($conn);
								?>
							</div>
						</div>
				</div>
					</div>
					<div class="row  pt-2" style="height: 150px">
						<div class="col-md-12 log logw row " style="margin: 0px">
						
								
								<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news ORDER BY IDnews DESC LIMIT 3, 1";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);
								echo "<div class='col-md-6 ' style='padding: 0px; margin-bottom : auto; margin-top: auto; height: 100%; width: 40%;' >";
								echo "<img class='card-img-top' src='";
								echo $row['IMGHeaders'];
								echo "' ></div>";
								echo "<div class='col-md-6' style='padding: 0px'>";
								echo "<div class='card-body'>";
								
								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";


								mysqli_close($conn);
								?>
							</div>
						</div>
				</div>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="height: 300px">
				<div class="col-md-12 log logw">
						
						<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news ORDER BY IDnews DESC LIMIT 4, 1";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);
								echo "<img class='card-img-top' src='";
								echo $row['IMGHeaders'];
								echo "'  style='height: 70% ;  margin-left: 15%;margin-right: 15%; ; width: 70%' >";
								echo "<div class='card-body cardbody' >";

							
								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";

								mysqli_close($conn);
								?>
					</div>
				</div>
			</div>
		</div>
		<div class="row px-5 py-3 mx-5 " >
			<div class=" col-md-12" style="height: 300px">
				<div class="col-md-12 log logw row " style="margin: 0px">
														<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news ORDER BY IDnews DESC LIMIT 5, 1";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);

								echo "<div class='col-md-6 centerbody' style='margin-bottom: auto; margin-top: auto; width: 100%;' >";
								echo "<img class='card-img-top' src='";
								echo $row['IMGHeaders'];
								echo "' ></div>";
								echo "<div class='col-md-6'>";
								echo "<div class='card-body cardbody' style='margin: auto'>";

								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";

								mysqli_close($conn);
								?>
							</div>
						</div>
				</div>
			</div>
		</div >
		<!-- 3 kind of device-->
		<div class=" row px-5 py-3 mx-5">
			<div class="col-md-4 ">
				<div class="col-md-12 log logw">
					<div class="row">
						<form action="type.php?check=1&amp;b=P" class="row" method="post" target="_blank" style="width: 100%;margin: 0px ;text-align: center;cursor: pointer">
							<button  type="submit" style="width: 100%;padding: 0px;border: 0px;" id = "brandphone"><img src="open-iconic-master\svg\phoneicon.svg" alt="icon name" style="height: 90%"></button>
							
						</form>
						
					</div>

						<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news WHERE TypeOfDevices = 'Phone' ";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);

								echo "<img class='img-fluid' src='";
								echo $row['IMGHeaders'];
								echo "'>";
								echo "<div class='card-body '>";

								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";

								echo "<hr>";
								$COUNT_TIME_ROW = 3;
								while ($row = mysqli_fetch_array($result))
								{
									if($COUNT_TIME_ROW < 1)
									{
										break;
									}
									echo "<div class='row'>";
										echo "<div class='col-md-6'>";
											echo "<img class='img-fluid' src='";
											echo $row['IMGHeaders'];
											echo "'>";
										echo "</div>";
										echo "<div class='col-md-6'>";
											
												//string right here
												echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
												echo $row['IDnews'];
												echo "'   method='post' target='_blank'>";
												echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
												echo "<span>";
												echo $row['Titles'];
												echo "</span>";
												echo "</button>";
												echo "</form>";

											
										echo "</div>";
									echo "</div>";
									$COUNT_TIME_ROW--;
								}

								mysqli_close($conn);
								?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 log logw">
					<div class="row">
						<form action="type.php?check=1&amp;b=L" class="row" method="post" target="_blank" style="width: 100%;margin: 0px ;text-align: center;cursor: pointer">
							<button  type="submit" style="width: 100%;padding: 0px;border: 0px;" id = "brandlaptop"><img src="open-iconic-master\svg\laptopicon.svg" alt="icon name" style="height: 90%"></button>
							
						</form>
					</div>
					
						<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news WHERE TypeOfDevices = 'Laptop' ";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);

								echo "<img class='img-fluid' src='";
								echo $row['IMGHeaders'];
								echo "'>";
								echo "<div class='card-body '>";

								
								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";

								

								echo "<hr>";
								$COUNT_TIME_ROW = 3;
								while ($row = mysqli_fetch_array($result))
								{
									if($COUNT_TIME_ROW < 1)
									{
										break;
									}
									echo "<div class='row'>";
										echo "<div class='col-md-6'>";
											echo "<img class='img-fluid' src='";
											echo $row['IMGHeaders'];
											echo "'>";
										echo "</div>";
										echo "<div class='col-md-6'>";
											
												//string right here
												echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
												echo $row['IDnews'];
												echo "'   method='post' target='_blank'>";
												echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
												echo "<span>";
												echo $row['Titles'];
												echo "</span>";
												echo "</button>";
												echo "</form>";

											
										echo "</div>";
									echo "</div>";
									$COUNT_TIME_ROW--;
								}

								mysqli_close($conn);
								?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 log logw">
					<div class="row">
						<form action="type.php?check=1&amp;b=W" class="row" method="post" target="_blank" style="width: 100%;margin: 0px ;text-align: center;cursor: pointer">
							<button  type="submit" style="width: 100%;padding: 0px;border: 0px;" id = "brandwatch"><img src="open-iconic-master\svg\watch.svg" alt="icon name" style="height: 90%"></button>
							
						</form>
						
					</div>
						<?php
								$servername = "localhost";
								$database = "web";
								$username = "root";
								$password = "pass";

								$conn = mysqli_connect($servername, $username, $password, $database);

								$sql1 = "SELECT * FROM news WHERE TypeOfDevices = 'Watch' ";


								$result = mysqli_query($conn, $sql1);

								$row = mysqli_fetch_array($result);

								echo "<img class='img-fluid' src='";
								echo $row['IMGHeaders'];
								echo "'>";
								echo "<div class='card-body '>";
								
								
								//string right here
								echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
								echo "<span>";
								echo $row['Titles'];
								echo "</span>";
								echo "</button>";
								echo "</form>";

								
								echo "<hr>";
								$COUNT_TIME_ROW = 3;
								while ($row = mysqli_fetch_array($result))
								{
									if($COUNT_TIME_ROW < 1)
									{
										break;
									}
									echo "<div class='row'>";
										echo "<div class='col-md-6'>";
											echo "<img class='img-fluid' src='";
											echo $row['IMGHeaders'];
											echo "'>";
										echo "</div>";
										echo "<div class='col-md-6'>";
											
												//string right here
											echo "<form style='height:100%;' action='news.php?check=1&amp;id= ";
											echo $row['IDnews'];
											echo "'   method='post' target='_blank'>";
											echo "<button type='submit' style='background-color : #fff; border : 0px; width:100% ; height:100% ;padding:0px;' ";
											echo "<span>";
											echo $row['Titles'];
											echo "</span>";
											echo "</button>";
											echo "</form>";

										
										echo "</div>";
									echo "</div>";
									$COUNT_TIME_ROW--;
								}

								mysqli_close($conn);
								?>
				</div>
			</div>
		</div>

	</div>
	<!-- footer-->
	<footer class="page-footer font-small stylish-color-dark pt-4">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col-md-4 mx-auto">
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 mx-auto">
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 mx-auto">
        </div>
      </div>
    </div>
    <hr>
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a href="https://vi-vn.facebook.com/" target="_blank" class="fa fa-facebook"></a>
      </li>
      <li class="list-inline-item">
        <a href="#" class="fa fa-twitter"></a>
      </li>
      <li class="list-inline-item">
        <a href="#" class="fa fa-google-plus"></a>
      </li>
      <li class="list-inline-item">
        <a href="#" class="fa fa-linkedin"></a>
      </li>
      <li class="list-inline-item">
       <a href="#" class="fa fa-youtube"></a>
      </li>
    </ul>
    <div class="footer-copyright text-center py-3">Design and Idea About Tech News Website By:
      <a>Truong Tran Vy and Nguyen Thanh Thuy</a>
    </div>
</footer>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>