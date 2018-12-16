
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
<link href="open-iconic-master\font\css\open-iconic.css" rel="stylesheet">		
<script src="js\header.js"></script>
<script src="js\signin.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- form write news-->
	<div id="myNav1" class="overlay1 fixed-top">
	  	<div class="overlay-content1">
	  		<div class="container-fluid">
	  			<div href="javascript:void(0)" 	" onclick="closeNav1() " 
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
							

	/*
							$image = $_FILES['image']['tmp_name'];
							$imagename = $_FILES['image']['name'];
							$file_to_saved = "dcuments/".$imagename;
							move_uploaded_file($image, $file_to_saved);
*/
			
	

							$conn = mysqli_connect($servername, $username, $password, $database);

							$sql1 = "SELECT * FROM news WHERE IDnews = ( SELECT MAX(IDnews) FROM news ) ";


							$result = mysqli_query($conn, $sql1);

							$row = mysqli_fetch_array($result);

							
							$IDnews1 = $row['IDnews'] + 1;
							echo $IDnews1;


							
							$sql = "INSERT INTO news (IDnews, IDwriter, Brands, TypeOfDevices, Titles, IMGHeaders, Content, VideoFooter, DateNews) VALUES ('".$IDnews1."','000000','".$Brands."','".$TypeOfDevices."','".$Titles."','".$image."','".$Content."','youtube.com','".$Date."')";
							
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
	<div id="myNav" class="overlay fixed-top">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div class="overlay-content">
		<div class="container">
		    	<div class="row">
					<div class="col-md-12 col-md-offset-3">
						<div class="panel panel-login">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<form id="login-form" action="https://phpoll.com/login/process" method="post" role="form" style="display: block;">
											<div class="form-group">
												<input type="text" name="username"  tabindex="1" class="form-control"  value="">
											</div>
											<div class="form-group">
												<input type="password" name="password"  tabindex="2" class="form-control" >
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-sm-3"></div>
													<div class="col-sm-6 col-sm-offset-3">
														<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
													</div>
													<div class="col-sm-3"></div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-lg-12">
														<div class="text-center">
															<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
														</div>
													</div>
												</div>
											</div>
										</form>
										<form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;">
											<div class="form-group">
												<input type="text" name="username"  tabindex="1" class="form-control"  value="">
											</div>
											<div class="form-group">
												<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
											</div>
											<div class="form-group">
												<input type="password" name="password1" tabindex="2" class="form-control" >
											</div>
											<div class="form-group">
												<input type="password" name="confirm-password2"  tabindex="2" class="form-control" >
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-sm-6 col-sm-offset-3">
														<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	  </div>
	</div>
	<!-- Header-->
	<div class="container-fluid sticky-top" id = "header">
		<div class = "row ">
			<div class = "col"><img class = "card-img-top" id = "icon" src="img/icon.png">
			</div>
			<div class = "col" id="header1" style="height: 100%">
				<?php
					echo "<img style='width: 100%; ' src='";
					echo "img/".$_REQUEST["b"].".svg'";
					echo " >";
				?>
			</div>
			<div class = "col" id = "login">
				<a href = "#" onclick="openNav()">Sign In </a><span><a> | </a></span><a href="#">Sign Up</a>
	        </div>
		</div>
		<div class = "row" id = "brand">
		<form action="brand.php?check=1&amp;b=LG" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "lg" value="LG"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff"background-color: #fff"background-color: #fff"background-color: #fff"" >
			</form>
			<form action="brand.php?check=1&amp;b=SS" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "ss" value="SAMSUNG"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff"background-color: #fff"background-color: #fff"" >
			</form>
			<form action="brand.php?check=1&amp;b=AP" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "ap" value="APPLE"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff"background-color: #fff"" >
			</form>
			<form action="brand.php?check=1&amp;b=SN" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "so" value="SONY"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"background-color: #fff"" >
			</form>
			<form action="brand.php?check=1&amp;b=PX" class="col"  method="post" target="_blank">
				<input type="submit" name="submitLG" class="col" id = "pi" value="PIXEL"  href="#" style="width: 100%;cursor: pointer;background-color: #fff"" >
			</form>
		</div>
		<hr style="margin-top: 0px">
	</div>
	<!-- body-->
	<div class = "container">
		<?php
		$servername = "localhost";
		$database = "web";
		$username = "root";
		$password = "pass";
		$sql1 = null;
		$conn = mysqli_connect($servername, $username, $password, $database);


		switch ($_REQUEST['b']) {
			case 'W':
				$sql1 = "SELECT * FROM news WHERE TypeOfDevices = 'Watch'";
				break;
			case 'P':
				$sql1 = "SELECT * FROM news WHERE TypeOfDevices = 'Phone'";
				break;
			case 'L':
				$sql1 = "SELECT * FROM news WHERE TypeOfDevices = 'Laptop'";
				break;
			
		}

		$result = mysqli_query($conn, $sql1);



			while ($row = mysqli_fetch_array($result)) {
				echo "<div class='row col-md-12 mx-auto'>";
				echo "<div class='col-md-5 '>";
				echo "<img src='";
				echo $row['IMGHeaders'];
				echo "' style='width: 70%; height:70%;text-align: center;' class='mx-auto'>";
				echo "</div>";
				echo "<div class='col-md-7 '>";
				echo "<form action='news.php?check=1&amp;id= ";
								echo $row['IDnews'];
								echo "'   method='post' target='_blank'>";
								echo " <input type= submit style='background-color : #fff; border : 0px' value='";
								echo $row['Titles'];
								echo "'>";
								echo "</form>";
				echo "</div>";
				echo "</div>";
			}
		?>
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