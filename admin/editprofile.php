<?php 
    require_once "header.php";
    // Include config file
	require_once "config.php";

	// Getting id from url
	$id=$_SESSION['id'];
	// Fetech user data based on id
	$query = "SELECT * FROM users WHERE id=$id";
    $get_user = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_assoc($get_user)) 
	{
		$name = $row['name'];
		$mobile = $row['mobile'];
		$email = $row['email'];
		$username = $row['username'];
	}
?>

<div class="row">
	<div class="col-sm-12">
		<h4 class="mb-15">Updating the profile of <?php echo $name; ?></h4>
		<form action="editdata.php" method="POST">
            <div class="form-group">
            	<label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo $mobile ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" readonly="">
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary" value="Update">
            </div>
        </form>
	</div>

<?php 
    require_once "footer.php";
?>