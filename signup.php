<?php
session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$user_phone = $_POST['user_phone'];
		$user_address = $_POST['user_address'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			if($password == $repassword){
				//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,user_email,password,user_phone,user_address) values ('$user_id','$user_name','$user_email','$password','$user_phone','$user_address')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else{
			echo "Password doesnt match!";
		}
		}else
		{
			echo "Please enter valid information!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link href="img/favicon.ico" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Pacifico" rel="stylesheet"> 

        <!-- Bootstrap CSS File -->
        <link href="vendor/bootstrap/css/bootstrapp.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="vendor/animate/animate.min.css" rel="stylesheet">
        <link href="vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Main Stylesheet File -->
        <link href="css/style1.css" rel="stylesheet">
</head>
<body>

	<section id="login">
            <div class="container">
                <div class="section-header">
                    <h3>Registration</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="login-col-1">
                            <div class="login-form">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="user_name" placeholder="Your Name" required="required" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" name="user_email" placeholder="Your Email" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" name="password" placeholder="Your Password" required="required" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" name="repassword"placeholder="Repeat Your Password" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="form-control" name="user_phone" placeholder="Your Phone Number" required="required" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" name="user_address" placeholder="Your Address" required="required" />
                                        </div>
                                    </div>

                                    <div><button type="register">Sign up</button></div>
                                    <a href="login.php" type="loginCus">Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
