
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
    }

	
}
 ?>

 	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Edit Doctor</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="welcome.php">Dashboard</a></li>
			<li><a href="doctors.php">Doctor List</a></li>
			<li class="active"><span>Edit Doctor </span></li>
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
							<h4 class="text-center mb-20">Doctor Name: <?php echo $name ?></h4>
							<hr />
						</div>
						<div class="details">
							<form class="form-horizontal" action="update-doctor.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

								<div class="form-group">
							      <label class="control-label col-sm-4" for="username">Upload Image:</label>
							      <div class="col-sm-8">
							        <input type="file" class="form-control" id="docImg" name="docimage" >
							        <span>* Upload the image 200px * 200px</span>
							      </div>
							    </div>
								<div class="form-group">
							      <label class="control-label col-sm-4" for="name">Name:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
							        
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="email">Email ID:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
							      
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="mobile">Mobile Number:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
							       
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="degree">Qualification:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="degree" name="qualification" value="<?php echo $qualification; ?>">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="specifications">Specification:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="specifications" name="specification" value="<?php echo $specification; ?>">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="fees">Fee:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="fees" name="fee"  value="<?php echo $fee; ?>">
							      </div>
							    </div>

							    <div class="form-group">        
							      <div class="col-sm-offset-4 col-sm-8">
							        <button type="submit" name="updateDoctor" class="btn btn-primary">Update Doctor</button>
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