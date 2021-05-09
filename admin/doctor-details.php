
<?php 
    require_once "header.php";

    require_once "config.php";
    // Check existence of id parameter before processing further
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_assoc($result)){
    	$name = $row['name'];
    	$email = $row['email'];
    	$mobile = $row['mobile'];
    	$qualification = $row['qualification'];
    	$specification = $row['specification'];
    	$fee = $row['fee'];
    	$image = $row['image'];
    }

	
}
 ?>

 	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark"> Doctor</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="welcome.php">Dashboard</a></li>
			<li><a href="doctors.php">Doctor List</a></li>
			<li class="active"><span> Doctor </span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
<!-- /Title -->

	<div class="row">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="col-md-12 border-right">
						
						<div class="details">
							<div class="row">
								<div class="col-md-4" style="margin: auto;">
									<img width='100px' src='docimages/<?php echo $image ?>' alt='images'>
								</div>
								<div class="col-md-4">
									<ul>
										<li class="mb-2"><strong>Dr. Name:</strong> <?php echo $name ?> </li>
										<li class="mb-2"><strong>Email Id:</strong> <?php echo $email ?> </li>
										<li class="mb-2"><strong>Mobile Number:</strong> <?php echo $mobile ?> </li>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<li class="mb-2"><strong>Qualification:</strong> <?php echo $qualification ?> </li>
										<li class="mb-2"><strong>Specification:</strong> <?php echo $specification ?> </li>
										<li class="mb-2"><strong>Fee:</strong> <?php echo $fee ?> </li>
									</ul>
								</div>
							</div>
							<hr />

							<div class="title mb-10">
								<h4 class="mb-20">Doctor Appointments</h4>
								<hr />
							</div>

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
										// $docId = $_SESSION["id"];
										$query = "SELECT * FROM appointments WHERE userDocId = $id ORDER BY id DESC";
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


<?php 
    require_once "footer.php";
?>