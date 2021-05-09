
<?php 
    require_once "header.php";

    require_once "config.php";
    // Check existence of id parameter before processing further

    $id = $_GET['id'];
    $sql = "SELECT * FROM capture_lead WHERE id='$id'";
    
    $result = mysqli_query($link, $sql);

    while($row = mysqli_fetch_assoc($result)){
 ?>

 	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Edit Customer</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="welcome.php">Dashboard</a></li>
			<li><a href="capture-lead-list.php">Customer List</a></li>
			<li class="active"><span>Edit Customer </span></li>
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
						<div class="title mb-10">
							<h4 class="text-center mb-20">Customer Name: <?php echo $row["name"] ?></h4>
							<hr />
						</div>
						<div class="details">
							<form class="form-horizontal" action="update-customer.php" method="POST">
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row["id"] ?>">
								<div class="form-group">
							      <label class="control-label col-sm-4" for="name">Name:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"] ?>">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="contactperson">Contact Person:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="contactperson" name="contactperson" value="<?php echo $row["contactperson"] ?>">
							      </div>
							    </div>
							    <div class="form-group ">
							      <label class="control-label col-sm-4" for="email">Email ID:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row["email"] ?>">
							        
							      </div>
							    </div>
							    <div class="form-group ">
							      <label class="control-label col-sm-4" for="phone">Mobile Number:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row["phone"] ?>">
							      
							      </div>
							    </div>
							    <div class="form-group ">
							      <label class="control-label col-sm-4" for="businessname">Business Name:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="businessname" name="businessname" value="<?php echo $row["businessname"] ?>">
							      </div>
							    </div>
							    <div class="form-group ">
							      <label class="control-label col-sm-4" for="address">Address:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row["address"] ?>">
							      </div>
							    </div>
							    <div class="form-group ">
							      <label class="control-label col-sm-4" for="ticketsize">Ticket Size:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="ticketsize" name="ticketsize" value="<?php echo $row["ticketsize"] ?>">
							      </div>
							    </div>
							    <div class="form-group ">
							      <label class="control-label col-sm-4" for="typeofclient">Type of Client:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="typeofclient" name="typeofclient" value="<?php echo $row["typeofclient"] ?>">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="voproject">Value of Project:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="voproject" name="voproject" value="<?php echo $row["voproject"] ?>">
							      </div>
							    </div>
							    <div class="form-group">
									<label class="col-sm-4 control-label">Type of Project</label>
									<div class="col-sm-8">
										<select name="typeproject" class="form-control select2" value="<?php echo $row["typeproject"] ?>">
											<option>Select Type of Project</option>
											<option value="Manufacturing">Manufacturing</option>
											<option value="Job-Work">Job Work</option>
											<option value="Raw-Material">Raw Material</option>
											<option value="Execution">Execution</option>
											<option value="Designing">Designing</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Source Of Lead</label>
									<div class="col-sm-8">
										<select name="leadsource" class="form-control select2" value="<?php echo $row["leadsource"] ?>">
											<option>Select Source of Lead</option>
											<option value="Referral">Referral</option>
											<option value="Google">Google</option>
											<option value="Facebook">Facebook</option>
											<option value="Other">Other</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Lead Rating</label>
									<div class="col-sm-8">
										<label class="radio-inline">
											<input type="radio" name="leadrating" value="Hot" <?php if($row["leadrating"]=='Hot'){ echo "checked=checked";}  ?>>Hot
										</label>
										<label class="radio-inline">
											<input type="radio" name="leadrating" value="Warm" <?php if($row["leadrating"]=='Warm'){ echo "checked=checked";}  ?>>Warm
										</label>
										<label class="radio-inline">
											<input type="radio" name="leadrating" value="Cold" <?php if($row["leadrating"]=='Cold'){ echo "checked=checked";}  ?>>Cold
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Type of Lead</label>
									<div class="col-sm-8">
										<label class="radio-inline">
											<input type="radio" name="leadtype" value="Active" <?php if($row["leadtype"]=='Active'){ echo "checked=checked";}  ?>>Active
										</label>
										<label class="radio-inline">
											<input type="radio" name="leadtype" value="Reject" <?php if($row["leadtype"]=='Reject'){ echo "checked=checked";}  ?>>Reject
										</label>
									</div>
								</div>
							    <div class="form-group">        
							      <div class="col-sm-offset-4 col-sm-8">
							        <button type="submit" name="updatecustomer" class="btn btn-primary">Submit</button>
							      </div>
							    </div>
							</form>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>


<?php 
    require_once "footer.php";
?>