<?php 
  require_once "admin/config.php";
  
  $output = '';
  if(isset($_POST["query"]) || isset($_POST["datetime"]) ) {
    $docid = mysqli_real_escape_string($link, $_POST["query"]);
    $checkDate = mysqli_real_escape_string($link, $_POST["datetime"]);
    
    $timestamp = strtotime($checkDate);
    $day = date('l', $timestamp);
    // echo $day;

    $sqlquery = "SELECT * FROM dravailable_date_time WHERE docId = '".$docid."' AND available_day = '".$day."'";
    // echo $sqlquery;

  } else {
    $output .='
      <p class="text-center">Select the Doctor.</p>
    ';
    echo $output;
    exit();
  }

  $result = mysqli_query($link, $sqlquery);
  if(mysqli_num_rows($result) > 0)
  {
    $i = 0;
    while($row = mysqli_fetch_array($result)) {
      $time = explode(',', $row['available_time']);
      $docId = $row['docId'];
      foreach($time as $out) { 
        $getCompleteRoom = "SELECT * FROM appointments WHERE appointment_time='".trim($out)."' AND userDocId='".$docId."'";
        $result = mysqli_query($link, $getCompleteRoom);
        $disable = '';
        while($rows = mysqli_fetch_array($result)) {
          $rname = $rows['appointment_time'];
          $disable = 'disabled';
        }
        
        $output .= '
          <div class="col-md-3 mb-3" style="display: inline-flex;">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <input type="radio" class="form-check-input" id="appointSlot" name="appointment" value="'.$out.'"  '.$disable.'>'.$out.'
              </span>
            </div>
          </div>            
        ';
      }
     
      $query1 = "SELECT * FROM users WHERE id = $docId";
      $getDrName = mysqli_query($link, $query1);
      while($row1 = mysqli_fetch_assoc($getDrName)) {
        $fee = $row1['fee'];
      }
    }
    echo json_encode(array("time" => $output, "fee" => $fee)); 
  }

?>
