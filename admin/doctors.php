<?php 
    require_once "header.php";

    require_once "config.php";
 ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Doctors</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
				<li><a href="welcome.php">Dashboard</a></li>
				<li class="active"><span>Doctors</span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
	<!-- /Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<a href="add-doctor.php" class="btn btn-primary">Add Doctor</a>
					</div>
				</div>
			</div>
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="example" class="table table-hover display pb-30">
									<thead>
										<tr>
											<th>Image</th>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile Number</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query = "SELECT * FROM users WHERE role = 'Doctor' ORDER BY id DESC";
					                      	$get_lead = mysqli_query($link, $query);
					                      	while($row = mysqli_fetch_assoc($get_lead)){
					                      		$image = $row['image'];
											
					                          	echo "<tr>";

					                          	echo "<td><img width='100px' src='docimages/$image' alt='images'></td>";
					                  	?>
											<td>
												<a href="doctor-details.php?id=<?php echo $row['id'] ?>" class="link">
													<?php echo $row['name'] ?>
												</a>
											</td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['mobile'] ?></td>
						                    <td>
						                      	<a href="edit-doctor.php?id=<?php echo $row['id'] ?>" class="linkedit">
						                      		<i class="zmdi zmdi-edit"></i>
						                      	</a>
						                      	<a href="doctor-timing.php?id=<?php echo $row['id'] ?>" class="linkedit">
						                      		<i class="zmdi zmdi-time"></i>
						                      	</a>
						                      	<a href="delete-doctor.php?id=<?php echo $row['id'] ?>" class="linkdelete" onclick="return confirm('Are you sure?')">
						                      		<i class="zmdi zmdi-delete"></i>
						                      	</a>
						                    </td>
										</tr>
										<?php
					                    	}
					                    ?>
									</tbody>
								</table>
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