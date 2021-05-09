		</div>
		 <!-- footer -->
		 <footer>
		  <!--<div class="footer">-->
			<div class="wthree-copyright">
			  <p>© 2021. All rights reserved | Design by <a href="#">Devai</a></p>
			</div>
		  <!--</div>-->
		  </footer>
  <!-- / footer -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
		<!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Form Wizard JavaScript -->
	<script src="vendors/bower_components/jquery.steps/build/jquery.steps.min.js"></script>
	<!-- Form Wizard Data JavaScript -->
	<script src="dist/js/form-wizard-data.js"></script>
	<!-- <script src="vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js"></script> -->
	<!-- Bootstrap Wysuhtml5 Init JavaScript -->
	<!-- <script src="dist/js/bootstrap-wysuhtml5-data.js"></script> -->
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	<!-- Moment JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
	<!-- Switchery JavaScript -->
	<!-- <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script> -->
	<!-- Summernote Plugin JavaScript -->
	<script src="vendors/bower_components/summernote/dist/summernote.min.js"></script>
	<!-- Summernote Wysuhtml5 Init JavaScript -->
	<script src="dist/js/summernote-data.js"></script>
	<!-- Select2 JavaScript -->
	<script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
	<!-- Bootstrap Select JavaScript -->
	<script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

	<script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	<!-- Bootstrap Tagsinput JavaScript -->
	<!-- <script src="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> -->
	<!-- Multiselect JavaScript -->
	<script src="vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	<!-- Bootstrap Switch JavaScript -->
	<script src="vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
	<!-- Form Advance Init JavaScript -->
	<script src="dist/js/form-advance-data.js"></script>


	<!-- Fancy Dropdown JS -->
	<!-- <script src="dist/js/dropdown-bootstrap-extended.js"></script> -->
	<!-- Init JavaScript -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	<script type="text/javascript" src="dist/js/calendar.js"></script>
	<script type="text/javascript" src="dist/js/events.js"></script>

	<!-- <script type="text/javascript" src="dist/js/time.js"></script> -->
	<script src="dist/js/init.js"></script>
	<script type="text/javascript">
		$(function(){
		    $("#selectDoctor").change(function() {
		      	load_data();
		    })

		    $("#appointDate").change(function() {
		      	load_data();
		    })

		    function load_data() {
		      	var doctorId = document.getElementById("selectDoctor").value;
		      	var selectDate = document.getElementById("appointDate").value;
		      	console.log(doctorId, "Doc ID");
		      	if(doctorId && selectDate) {
		        	$.ajax({
		         		url:"fetchDocDateTime.php",
		         		method:"POST",
		         		data:{
		          			query: doctorId,
		          			datetime: selectDate
		        		},
		         		success:function(data) {
		          			$('#availableDate').html(data);
		         		}
		        	});
		      	}
	    	}

	    	$('#updateAppointment').click(function(e){
		        e.preventDefault();
		        var name = $("#fullName").val();
		        var mobile = $("#MobileNo").val();
		        var email = $("#emailID").val();
		        var doctor = $("#selectDoctor").val();
		        var appointdate = $("#appointDate").val();
		        var appointtime = $("#appointSlot:checked").val();
		        var id = $("#appointId").val();
		        $.ajax({
		            type: "POST",
		            url: "update-appointment.php",
		            dataType: "json",
		            data: {
		            	id: id,
		              	name: name,
		              	mobile: mobile,
		              	email: email,
		              	doctor: doctor,
		              	appointdate: appointdate,
		              	appointtime: appointtime
		            },
		            success : function(data){
		              console.log(data);
		                if (data.code == "200"){
		                    alert("Success: " + data.message);
		                    window.location.href = data.link;
		                } else {
		                    $(".display-error").html("<ul>"+data.message+"</ul>");
		                    window.location.href = data.link;
		                    $(".display-error").css("display","block");
		                }
		            }
		        });


		      });
		})

	</script>
	</body>
</html>