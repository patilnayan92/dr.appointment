<?php 
    require_once "header.php";

    require_once "config.php";
 ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Patients</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
				<li><a href="welcome.php">Dashboard</a></li>
				<li class="active"><span>Patients</span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
	<!-- /Title -->
	<div class="row">
		<div class="col-sm-12">
			<!-- <div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<a href="add-patient.php" class="btn btn-primary">Add Patients</a>
					</div>
				</div>
			</div> -->
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
											<th>Date time</th>
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
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['mobile'] ?></td>
											<td><?php echo $row1['name'] ?></td>
											<td><?php echo $row['appointment_date'] ?> - <?php echo $row['appointment_time'] ?></td>
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


<?php 
  require_once "footer.php";
?>