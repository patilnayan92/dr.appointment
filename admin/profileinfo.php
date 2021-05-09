<?php 
    require_once "header.php";
    // Include config file
	require_once "config.php";
?>

<div class="row">
	<?php
		// Getting id from session login
		$id=$_SESSION['id'];
		// Fetech user data based on id
		$result = mysqli_query($link, "SELECT * FROM users WHERE id=$id");
		 
		while($user_data = mysqli_fetch_array($result))
		{
			$name = $user_data['name'];
			$mobile = $user_data['mobile'];
			$email = $user_data['email'];
			$username = $user_data['username'];
			$created_at = $user_data['created_at'];
		}
	?>
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table tablecolor">
				<thead>
					<tr>
						<th> - </th>
						<th>Information</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Name: </td>
						<td><?php echo $name ?></td>
					</tr>
					<tr>
						<td>Email Id: </td>
						<td><?php echo $email ?></td>
					</tr>
					<tr>
						<td>Mobile Number: </td>
						<td><?php echo $mobile ?></td>
					</tr>
					<tr>
						<td>User Name: </td>
						<td><?php echo $username ?></td>
					</tr>
					<tr>
						<td>Account Creation: </td>
						<td><?php echo $created_at ?></td>
					</tr>
					<tr>
						<td> </td>
						<td><a href="editprofile.php?id=<?php echo $id ?>" class="btn btn-primary">Edit Profile</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


<?php 
    require_once "footer.php";
?>