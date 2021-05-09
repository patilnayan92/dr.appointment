<?php

	require_once "config.php";

	// Check if form is submitted for user update, then redirect to homepage after update
	if(isset($_POST['update']))
	{	
		$id = $_POST['id'];
		
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
			
		// update user data
		$result = mysqli_query($link, "UPDATE users SET name='$name',email='$email',mobile='$mobile' WHERE id=$id");
		
		// Redirect to homepage to display updated user in list
		header("Location: welcome.php");
	}

?>