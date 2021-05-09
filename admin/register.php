<?php
require_once "header.php";
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $mobile = $email = $username = $password = $confirm_password = "";
$name_err = $mobile_err = $email_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate username
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a Name.";
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["mobile"]))){
        $mobile_err = "Please enter a Mobile Number.";
    } else{
        $mobile = trim($_POST["mobile"]);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, mobile, email, username, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_mobile, $param_email, $param_username, $param_password);
            
            // Set parameters
            $param_name = $name;
            $param_mobile = $mobile;
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
          
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
                                            <!--<h3 class="text-center text-white mb-10">Sign up to Naraci</h3>-->
                                            <h6 class="text-center nonecase-font text-white">Enter your details below</h6>
                                        </div>  
                                        <div class="form-wrap">
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                                    <label class="control-label mb-10">Name:</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                                    <span class="help-block"><?php echo $name_err; ?></span>
                                                </div>
                                                <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                                                    <label class="control-label mb-10">Mobile Number:</label>
                                                    <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
                                                    <span class="help-block"><?php echo $mobile_err; ?></span>
                                                </div>
                                                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                                    <label class="control-label mb-10">Email ID:</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                                    <span class="help-block"><?php echo $email_err; ?></span>
                                                </div>
                                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                                    <label class="control-label mb-10">Username:</label>
                                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                                    <span class="help-block"><?php echo $username_err; ?></span>
                                                </div>    
                                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                    <label class="control-label mb-10">Password:</label>
                                                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                                    <span class="help-block"><?php echo $password_err; ?></span>
                                                </div>
                                                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                                    <label class="control-label mb-10">Confirm Password:</label>
                                                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success btn-rounded" value="Submit">
                                                    <input type="reset" class="btn btn-default btn-rounded" value="Reset">
                                                    <!-- <a href="welcome.php">Visit Admin Panel</a> -->
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
       
<?php
    require_once "footer.php";
?>