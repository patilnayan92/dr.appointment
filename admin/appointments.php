<?php 
    require_once "header.php";

    require_once "config.php";
 ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Appointments</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
				<li><a href="welcome.php">Dashboard</a></li>
				<li class="active"><span>Appointments</span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
	<!-- /Title -->
	<?php if($_SESSION['role'] == 'Admin'){ ?>
	<div class="row">
		<div class="col-sm-12">
			
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="example" class="table table-hover display pb-30">
									<thead>
										<tr>
											<th>Patient Name</th>
											<th>Email</th>
											<th>Mobile Number</th>
											<th>Doctor Name</th>
											<th>Date Time</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query = "SELECT * FROM appointments ORDER BY id DESC";
					                      	$get_lead = mysqli_query($link, $query);
					                      	while($row = mysqli_fetch_assoc($get_lead)){
					                      		$docId = $row['userDocId'];
					                      		$query1 = "SELECT * FROM users WHERE id = $docId";
					                      		$getDrName = mysqli_query($link, $query1);
					                      		while($row1 = mysqli_fetch_assoc($getDrName)) {
					                          echo "<tr>";
					                  	?>					                  		
											<td>
												<?php echo $row['name'] ?>
											</td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['mobile'] ?></td>
											<td><?php echo $row1['name'] ?></td>
											<td><?php echo $row['appointment_date'] ?> - <?php echo $row['appointment_time'] ?></td>
											<td><?php echo $row['symptoms'] ?></td>
						                    <td>
						                      	<a href="reschedule.php?id=<?php echo $row['id'] ?>" class="linkedit">
						                      		<i class="zmdi zmdi-time"></i>
						                      	</a>
						                      	<a href="delete-appointment.php?id=<?php echo $row['id'] ?>" class="linkdelete" onclick="return confirm('Are you sure?')">
						                      		<i class="zmdi zmdi-delete"></i>
						                      	</a>
						                    </td>
										</tr>
										<?php
					                    	}
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
	<?php } ?>
	<?php if($_SESSION['role'] == 'Doctor'){ ?>
	<div class="row">
		<div class="col-sm-12">
			
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="example" class="table table-hover display pb-30">
									<thead>
										<tr>
											<th>Patient Name</th>
											<th>Email</th>
											<th>Mobile Number</th>
											<th>Doctor Name</th>
											<th>Date Time</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$docId = $_SESSION["id"];
											$query = "SELECT * FROM appointments WHERE userDocId = $docId ORDER BY id DESC";
					                      	$get_lead = mysqli_query($link, $query);
					                      	while($row = mysqli_fetch_assoc($get_lead)){
					                      		$docId = $row['userDocId'];
					                      		$query1 = "SELECT * FROM users WHERE id = $docId";
					                      		$getDrName = mysqli_query($link, $query1);
					                      		while($row1 = mysqli_fetch_assoc($getDrName)) {
					                          echo "<tr>";
					                  	?>					                  		
											<td>
												<?php echo $row['name'] ?>
											</td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['mobile'] ?></td>
											<td><?php echo $row1['name'] ?></td>
											<td><?php echo $row['appointment_date'] ?> - <?php echo $row['appointment_time'] ?></td>
											<td><?php echo $row['symptoms'] ?></td>
						                    <td>
						                      	<a href="reschedule.php?id=<?php echo $row['id'] ?>" class="linkedit">
						                      		<i class="zmdi zmdi-time"></i>
						                      	</a>
						                      	<a href="delete-appointment.php?id=<?php echo $row['id'] ?>" class="linkdelete" onclick="return confirm('Are you sure?')">
						                      		<i class="zmdi zmdi-delete"></i>
						                      	</a>
						                    </td>
										</tr>
										<?php
					                    	}
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
	<?php } ?>

<?php 
  require_once "footer.php";
?>