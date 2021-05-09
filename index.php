<?php
require_once "admin/config.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Samagra Care</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  .supernova {
    background-image: url(images/banner1.png);
    background-size: cover;
    /*background-image: linear-gradient(45deg, #f79741 0%,black 50%,#f79741);*/
  }
  .appointmentSlot {
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: calc(50% - 6px);
    border: 1px solid #4C72FB;
    background-color: #fff;
    color: #4C72FB;
    border-radius: 6px;
    text-align: center;
    font-size: 16px;
    margin-bottom: 8px;
    transition: 0.3s;
    cursor: pointer;
}
.appointmentSlotsContainer {
    display: flex;
    justify-content: space-between;
    align-content: flex-start;
    flex-wrap: wrap;
    height: 100%;
}
.appointmentSlot.active {
    animation: indicate 0.2s linear forwards;
}
.appointmentSlots {
    flex-grow: 1;
    position: relative;
    overflow: auto;
    flex: 1 1 auto;
    height: 0;
    margin: 16px 0 8px;
    font-size: 14px;
    min-height: 160px;
}
  </style>
</head>
<body class="supernova">

<nav class="navbar navbar-expand-sm ">
  <a class="navbar-brand" href="#">
    <img src="images/Logo.png" style="width: 100px;">
  </a>
</nav>

<div class="container mb-5" style="margin-top:30px;">
  <div class="row">
    <div class="card mb-5" style="background-color: rgba(255, 255, 255, 0.88);box-shadow: 2px 3px 12px 0 #000;padding: 10px;">
      <div class="card-header text-center">
        <h3>Patient Personal Details</h3>
        <p>Fill the form below and we will get back soon to you for more updates.</p>
      </div>
      <div class="card-body">
        <form action="submit-appointment.php" id="contactForm" method="POST">
        <!-- <form id="contactForm" method="POST"> -->
          <div class="alert alert-danger display-error" style="display: none">
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <label for="email">Full Name:</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="Enter Full Name" id="fullName" name="name">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-4">
              <label for="email">Phone Number:</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="Enter Phone Number" id="MobileNo" name="mobile">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-4">
              <label for="email">Email :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="Enter Email Id" id="emailID" name="email">
            </div>
          </div>

          <div class=" row form-group">
            <div class="col-md-4">
              <label for="sel1">Select Doctor:</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" id="selectDoctor" name="docorname" placeholder="Select Doctor Name">
                <option disabled="" selected="">-- Select Doctor --</option>
                <?php
                  $query = "SELECT * FROM users WHERE role = 'Doctor' ORDER BY id DESC";
                  $get_docName = mysqli_query($link, $query);
                  while($row = mysqli_fetch_assoc($get_docName)){
                ?>
                  <option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
         
          <div class="row form-group">
            <div class="col-md-4">
              <label for="email">Appointment Date:</label>
            </div>
            <div class="col-md-8">
              <input type="date" class="form-control" id="appointDate" name="appointmentDate">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-4">
              <label for="email">TimeSlot:</label>
            </div>
            <div class="col-md-8">
              <div id="availableDate"></div>
            </div>
          </div>
          
           <div class="row form-group">
            <div class="col-md-4">
              <label for="email">Doctor Fee:</label>
            </div>
            <div class="col-md-8" id="drfee">
              <!-- <div id="drfee"></div> -->
              <!-- <input type="text" class="form-control" name="fee" readonly="" id="drfee" value="1"> -->
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4">
              <label for="email">Symptoms:</label>
            </div>
            <div class="col-md-8">
              <textarea class="form-control" cols="7" rows="5" placeholder="Enter Symptoms" id="symptomDeta" name="symptoms"></textarea>
            </div>
          </div>

          <div class="form-group text-center">
            <!-- <div class="col-md-4"> -->
              <button class="btn btn-primary" id="submitAppointment" name="addAppointment" style="width: 35%;"> Submit</button>
              <!-- id="submitAppointment" -->
            <!-- </div> -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div> -->
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
      if(doctorId && selectDate) {
        $.ajax({
         url:"fetchDocDateTime.php",
         method:"POST",
         data:{
          query: doctorId,
          datetime: selectDate
        },
         success:function(data) {
          var obj = JSON.parse(data);
          $('#availableDate').html(obj.time);
          $('<input type="text" name="fee" id="fees" value="' + obj.fee +'">').appendTo("#drfee");
         }
        });
      }
    }

    $('#submitAppointment').click(function(e){
        e.preventDefault();
        var name = $("#fullName").val();
        var mobile = $("#MobileNo").val();
        var email = $("#emailID").val();
        var doctor = $("#selectDoctor").val();
        var appointdate = $("#appointDate").val();
        var appointtime = $("#appointSlot:checked").val();
        var fee = $("#fees").val();
        var symptoms = $("#symptomDeta").val();
        
        $.ajax({
            type: "POST",
            url: "appointment.php",
            dataType: "json",
            data: {
              name: name,
              mobile: mobile,
              email: email,
              doctor: doctor,
              appointdate: appointdate,
              appointtime: appointtime,
              fee: fee,
              symptoms: symptoms
            },
            success : function(data){
              console.log(data);
                if (data.code == "200"){
                    alert("Success: " +data.msg);
                } else if (data.code == "201") {
                  window.location.href = data.link;
                } else {
                    $(".display-error").html("<ul>"+data.msg+"</ul>");
                    $(".display-error").css("display","block");
                }
            }
        });


      });

  })

</script>
</body>
</html>
