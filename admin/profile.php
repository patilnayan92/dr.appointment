
<div class="modal fade" id="profile<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel"><span><?php echo $row['name']; ?></span> - Client Details</h4>
            </div>
            <div class="modal-body">
				<?php
					require_once "config.php";
					$profileinfo=mysqli_query($link,"select * from leadform where id='".$row['id']."'");
					$row=mysqli_fetch_array($profileinfo);
				?>
				<div class="container-fluid">
					<div class="row">
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
											<td><?php echo $row['name'] ?></td>
										</tr>
										<tr>
											<td>Email Id: </td>
											<td><?php echo $row['email'] ?></td>
										</tr>
										<tr>
											<td>Mobile Number: </td>
											<td><?php echo $row['phone'] ?></td>
										</tr>
										<tr>
											<td>Message: </td>
											<td><?php echo $row['message'] ?></td>
										</tr>
										<tr>
											<td>URL Source: </td>
											<td><?php echo $row['url'] ?></td>
										</tr>
										<tr>
											<td>UTM Source: </td>
											<td><?php echo $row['utm_source'] ?></td>
										</tr>
										<tr>
											<td>UTM Medium: </td>
											<td><?php echo $row['utm_medium'] ?></td>
										</tr>
										<tr>
											<td>UTM Campaign: </td>
											<td><?php echo $row['utm_campaign'] ?></td>
										</tr>
										<tr>
											<td>Enquiry Date: </td>
											<td><?php echo $row['enquirydate'] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
            	</div>
        	</div>
    	</div>
	</div>
</div>