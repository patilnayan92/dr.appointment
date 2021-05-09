<?php 
 	require_once "header.php";
    require_once "config.php";

    $name =  $email = $mobile = "";
	
	$name_err = $email_err = $mobile_err = "";

    if(isset($_POST['addDoctor'])) {
    
	    $name = $_POST["name"];
	    $email = $_POST["email"];
	    $mobile = $_POST["mobile"];
        $role = "Doctor";
        $password = $_POST["password"];
        $username = $_POST["username"];
        
        $qualification = $_POST['qualification'];
        $specification = $_POST['specification'];
        $fee = $_POST['fee'];

        $docimage = $_FILES['docimage']['name'];
    	$tmp_docimage = $_FILES['docimage']['tmp_name'];

		move_uploaded_file($tmp_docimage, "./docimages/$docimage");
	    // Validate username
	    if(empty(trim($_POST["name"]))){
	        $name_err = "Please enter a Name.";
	    } else{
	        $name = trim($_POST["name"]);
	    }

	    if(empty(trim($_POST["email"]))){
	        $email_err = "Please enter a Email.";
	    } else{
	        $email = trim($_POST["email"]);
	    }

	    if(empty(trim($_POST["mobile"]))){
	        $mobile_err = "Please enter a mobile Number.";
	    } else{
	        $mobile = trim($_POST["mobile"]);
	    }

		// $password = md5($password);
	   // $sql_email = "SELECT * FROM capture_lead WHERE email='$email'";
	   // $res_email = mysqli_query($link, $sql_email);
	    
	   // if(mysqli_num_rows($res_email) > 0){
	   // 	$email_err = "Sorry... email already taken"; 	  
	   // } 
	   if($name=="" || $email=="" || $mobile=="")
        {
            $message = "Enter the Name, Email and Mobile Number";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='add-lead.php';
            </script>";
        }
	    else{
	    	$query = "INSERT INTO `users` (name, email, mobile, role, password, username, image) VALUES ('$name', '$email', '$mobile', '$role', '$password', '$username', '$docimage')";

	    	$create_doctor = mysqli_query($link,$query);
    		if($create_doctor) {
    		// confirm_query($create_doctor);
		        $message = "Doctor Created Successfully!";
		        echo "<script type='text/javascript'>alert('$message');
		        window.location.href='doctors.php';</script>";
		    } else {
		    	$error = "Something went wrong";
		    	echo "<script type='text/javascript'>alert('$error');</script>"; 
		    }
	    }
    }

?>
<div class="container">
	<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			  <h5 class="txt-dark">Add Doctor</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			  <ol class="breadcrumb">
				<li><a href="welcome.php">Dashboard</a></li>
				<li class="active"><span>Add Doctor </span></li>
			  </ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
	<!-- /Title -->
	<div class="row">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="col-md-7">
						<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
						      <label class="control-label col-sm-4" for="username">Upload Image:</label>
						      <div class="col-sm-8">
						        <input type="file" class="form-control" id="docImg" name="docimage">
						        <span>* Upload the image 200px * 200px</span>
						      </div>
						    </div>
							<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
						      <label class="control-label col-sm-4" for="name">Name:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
						        <span class="help-block"><?php echo $name_err; ?></span>
						      </div>
						    </div>
						    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
						      <label class="control-label col-sm-4" for="email">Email ID:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
						        <span class="help-block"><?php echo $email_err; ?></span>
						      </div>
						    </div>
						    <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
						      <label class="control-label col-sm-4" for="mobile">Mobile Number:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
						        <span class="help-block"><?php echo $mobile_err; ?></span>
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="degree">Qualification:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="degree" name="qualification">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="specifications">Specification:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="specifications" name="specification">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="fees">Fee:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="fees" name="fee">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="username">User Name:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" id="username" name="username">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="name">Password:</label>
						      <div class="col-sm-8">
						        <input type="password" class="form-control" id="password" name="password">
						      </div>
						    </div>
						    <div class="form-group">        
						      <div class="col-sm-offset-4 col-sm-8">
						        <button type="submit" name="addDoctor" class="btn btn-primary">Submit</button>
						      </div>
						    </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
    require_once "footer.php";
?>