<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
// $username = $password = "";
// $username_err = $password_err = "";
 
// Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['login'])) {

	// global $link;
	$query = "SELECT * FROM users WHERE username='".mysqli_real_escape_string($link,$_POST['username'])."' AND password='".mysqli_real_escape_string($link,$_POST['password'])."'";
    $row = mysqli_query($link,$query);
	if(mysqli_num_rows($row)>0){
		$res=mysqli_fetch_array($row);
		session_start();
		$_SESSION["loggedin"] = true;
		$_SESSION['id']=$res['id'];
		$_SESSION['username']=$res['username'];
    	$_SESSION['role']=$res['role'];
		header("Location: welcome.php");
	}else{
		header("Location: login.php");
	}
 
    // Check if username is empty
    // if(empty(trim($_POST["username"]))){
    //     $username_err = "Please enter username.";
    // } else{
    //     $username = trim($_POST["username"]);
    // }
    
    // // Check if password is empty
    // if(empty(trim($_POST["password"]))) {
    //     $password_err = "Please enter your password.";
    // } else {
    //     $password = trim($_POST["password"]);
    // }
       	

    // // Validate credentials
    // if(empty($username_err) && empty($password_err)){
    //     // Prepare a select statement
    //     $sql = "SELECT id, username, role, password FROM users WHERE username = ?";
        
    //     if($stmt = mysqli_prepare($link, $sql)){
    //         // Bind variables to the prepared statement as parameters
    //         mysqli_stmt_bind_param($stmt, "s", $param_username);
            
    //         // Set parameters
    //         $param_username = $username;
            
    //         // Attempt to execute the prepared statement
    //         if(mysqli_stmt_execute($stmt)){
    //             // Store result
    //             mysqli_stmt_store_result($stmt);
                
    //             // Check if username exists, if yes then verify password
    //             if(mysqli_stmt_num_rows($stmt) == 1){
    //                 // Bind result variables
    //                 mysqli_stmt_bind_result($stmt, $id, $username, $role, $hashed_password);
    //                 if(mysqli_stmt_fetch($stmt)){
                    	
    //                 	if(password_verify($password, $hashed_password)){
    //                         // Password is correct, so start a new session
    //                         session_start();

    //                         // Store data in session variables
    //                         $_SESSION["loggedin"] = true;
    //                         $_SESSION["id"] = $id;
    //                         $_SESSION["username"] = $username;
    //                         $_SESSION["role"] = $role;
    //                         // Redirect user to welcome page
    //                         header("location: welcome.php");
    //                     } else {
    //                         // Display an error message if password is not valid
    //                         $password_err = "The password you entered was not valid.";
    //                     }
    //                 }
    //             } else {
    //                 // Display an error message if username doesn't exist
    //                 $username_err = "No account found with that username.";
    //             }
    //         } else {
    //             echo "Oops! Something went wrong. Please try again later.";
    //         }
    //     }
        
    //     // Close statement
    //     mysqli_stmt_close($stmt);
    // }
    
    // Close connection
    // mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Login</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<link href="vendors/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<!-- <a href="#">
						<img class="brand-img mr-10" src="../images/Logo.png" alt="brand"/>
					</a> -->
				</div>
				<!-- <div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-success btn-rounded btn-outline" href="register.php">Sign Up</a>
				</div> -->
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12 formdesign">
										<div class="mb-30">
											<h3 class="text-center text-white mb-10">Sign in to Samagra Care</h3>
											<h6 class="text-center nonecase-font text-white">Enter your Login Details</h6>
										</div>	
										<div class="form-wrap">
											<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
												<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
													<input type="text" class="form-control" id="exampleInputEmail_2" name="username" placeholder="Enter email"  value="<?php echo $username; ?>">
													<span class="help-block"><?php echo $username_err; ?></span>
												</div>
												<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													
													<input type="password" class="form-control" name="password" id="exampleInputpwd_2" placeholder="Enter pwd">
													<span class="help-block"><?php echo $password_err; ?></span>
												</div>
												<div class="form-group text-center">
													<input type="submit" class="btn btn-info btn-success btn-rounded" value="Login">
												</div>
											</form> -->
											<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="logfrm">
									          <fieldset>
									              <div class="form-group">
									                <div class="form-label-group">
									                  <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
									                </div>
									              </div>
									              <div class="form-group">
									                <div class="form-label-group">
									                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
									                </div>
									              </div>
									              <div class="form-group">
									                <div class="form-label-group">
									                	<input type="submit" name="login" value="Login" class="btn btn-info btn-rounded" style="background-color: #ffcc2a;width: 50%;color: #000;font-size:	16px;">
									              	</div>
									              </div>
									          </fieldset>
									          </form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		
	</body>
</html>
