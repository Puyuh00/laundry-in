<?php

//menyisikan file koneksi
include_once './koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrasi</title>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/login/images/bg-02.jpg);">
					<span class="login100-form-title-1">
						Laundry IN
					</span>
				</div>
                <?php if(isset($valid) && $valid == 'false') { ?>
                    <div class="alert alert-danger">
                      Invalid Username or Password
                    </div>
                <?php };
                      if(isset($valid) && $valid == 'true') { ?>
                    <div class="alert alert-danger">
                      Registration Sucessfully
                    </div>
                <?php };
                if(isset($valid) && $valid == 'Allready') { ?>
                <div class="alert alert-danger">
                      This User Allready Register
                </div>
                <?php } ?>  

                <div class="modal-body" style="padding:40px 50px;">
                    <form  role="form" method="post" action=""> 
                         <div class="form-group">
                         <label for="usrname"><span class="glyphicon glyphicon-user"></span> Name</label>
                         <input type="text" class="form-control"
                          id="usrname" required="" name="usrname" placeholder="Enter Name">
                         </div>

                        <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input type="text" class="form-control" name="fname" required="" placeholder="Enter Userame">
                        </div>

                        <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-phone"></span>No Hp</label>
                        <input type="Number" class="form-control" name="phonenumber" required="" placeholder="Enter No Hp">
                        </div>

                        <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-email"></span> Email</label>
                        <input type="text" class="form-control" name="email" required="" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="Password" name="Password" placeholder="Enter Password" />
                        </div>

                        <div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit"> 
							Submit
						</button>
					</div>
				    </form>
                </div>

				<div class="modal-footer text-white">
                        <p>Allready Register? <a href="login.php ">Login</a></p>
						<br>
          				<!-- <p>Lupa Password? <a href="resetpsw.php">Reset Password</a></p> -->
     					 <!--     <p>Forgot <a href="#">Password?</a></p> -->
       				</div>
			</div>
		</div>
	</div>
</body>
</html>