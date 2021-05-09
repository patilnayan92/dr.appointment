<?php

require_once "admin/config.php";
require('payment_config.php');

// session_start();

require('razorpay/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

date_default_timezone_set('Asia/Kolkata');

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{   
   
    $payment_id = $_POST['razorpay_payment_id'];
    $order_id = $_SESSION['razorpay_order_id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $amount = $_POST['amount'];
    $order_id = $_POST['order_id'];
    $merchantId = $_POST['merchant_oderId'];
    $created_at = date('Y-m-d H:i:s');
    
    $qury = "INSERT INTO `patient_payment`(`patientName`, `mobile`, `email`, `order_id`, `merchant_oderId`, `payment_id`, `amount`, `status`, `paidAt`) VALUES ('$name', '$mobile', '$email', '$order_id', '$merchantId', '$payment_id', '$amount', 'Capture', '$paidAt')";
   
    $res = mysqli_query($connection, $qury);

    $query = "INSERT INTO `appointments` (name, email, mobile, appointment_date, symptoms, userDocId, appointment_time) VALUES ('$name', '$email', '$mobile', '$appointdate', '$symptoms', '$userDocId', '$appointment_time')";
    $add_appointment = mysqli_query($link, $query);
    $docId = $row['userDocId'];
    $query1 = "SELECT * FROM users WHERE id = $docId";
    $getDrName = mysqli_query($link, $query1);
    while($row1 = mysqli_fetch_assoc($getDrName)) {
        $doctorName = $row1['name'];
        $doctorEmail = $row1['email'];
    }

    if($add_appointment) {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers = "From: patilnayan092@gmail.com \n";
        $message = '
            <!DOCTYPE html>
                <html>
                <head>
                <title>Samagra Care</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <meta name="keywords" content="" />
                  <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
                  <link href="css/email.css" rel="stylesheet">
                </head>
                <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                  <table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="100%" align="center" valign="top" style="">
                        <table>
                          <tr><td class="top_mar" height="50"></td></tr>
                        </table>
                        <!-- main content -->
                        <table style="box-shadow:0px 0px 0px 0px #E0E0E0;border: 1px solid #d60000;"width="800" border="0" cellpadding="0" cellspacing="0" align="center" class="container top-header-left">  
                          <tr>
                            <td>
                              <table class="ban-hei" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background:url(https://www.dezinup.com/img/email/01.png) no-repeat center; background-size:cover;" height="280"> 
                                <tbody>
                                  <tr>
                                    <td class="ban_pad" height="80"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <table border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                          <tr>
                                            <td>        
                                              <table class="ban_info" border="0" cellpadding="0" cellspacing="0"  width="500">        
                                                <tbody>
                                                  <tr>
                                                    <td class="ban_tex" height="30"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="future" style="font-size:2.3em;color:#fff;text-transform:capitalize;text-align:center;line-height:1.5em">THANK YOU</td>
                                                  </tr> 
                                                </tbody>
                                              </table>    
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:3.2em;color:#fff;text-transform:uppercase;text-align:center;letter-spacing: 3px;">
                                      '.$name.'
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="ban_pad" height="80"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr bgcolor="#ffffff">
                            <td>
                              <table border="0" width="650" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                <tbody>
                                  <tr>
                                    <td class="ser_pad" height="50"></td>
                                  </tr>
                                  <tr>
                                    <td class="ser_text" align="center" style="color:#000; font-size: 1.2em;line-height:1.8em;">
                                      Dear <b>'.$name.'</b>, your consultation with <b>Dr. '.$doctorName.'</b> at Date and Time.
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="10"></td>
                                  </tr>
                                  <tr>
                                    <td class="ser_text" align="center" style="color:#000; font-size: 1.2em;line-height:1.8em;">
                                      Please click on the below link for online consultation.
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="10"></td>
                                  </tr>
                                  <tr>
                                    <td class="ser_text" align="center" style="color:#000; font-size: 1.2em;line-height:1.8em;">
                                       <a href="#" style="padding:10px;color:#d60000;">Zoom Meeting link</a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="50"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>     
                          <tr>
                            <td>
                              <table align="center" cellpadding="0" cellspacing="0"  style="border-bottom:1px solid #f7f7f7">
                              </table>
                            </td>
                          </tr>
                          
                          <tr bgcolor="#d60000">
                            <td>
                              <table border="0" width="650" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                <tr>
                                  <td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
                                </tr>
                                  
                                  <tr>
                                    <td>
                                      <table class="foo1" width="170" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td class="ser_text editable" style="font-size: 1em; color: #ffffff; line-height: 24px;">
                                            <a href="https://www.xyz.com/" style="color: #fff; font-size: 1em;text-decoration:none;">WWW.xyz.COM</a>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
                                  </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <table>
                          <tr><td class="top_mar" height="50"></td></tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </body>
                </html>
        ';
    
        $email_to = $email, $doctorEmail;
        $subject = "Appointment Details";
        if(mail($email_to, $subject, $message, $headers)) {
            $message = "Appointment Created Successfully!";
            echo json_encode(['code'=>200, 'msg'=>$message]);
            exit();    
        } else {
            $error = "Mail Not Send";
            echo json_encode(['code'=>400, 'msg'=>$error]);
            exit();    
        }
    } else {
        $error = "Something went wrong";
        echo json_encode(['code'=>400, 'msg'=>$error]);
        exit();
    }

    $message = "<p>Your payment was successful</p>";

    echo "<script type='text/javascript'>
  window.location = 'thank-you.php'
  </script>";
}
else
{   
    $qury = "INSERT INTO `patient_payment`(`patientName`, `mobile`, `email`, `order_id`, `merchant_oderId`, `payment_id`, `amount`, `status`, `paidAt`) VALUES ('$name', '$mobile', '$email', '$order_id', '$merchantId', '$payment_id', '$amount', 'Failed', '$paidAt')";
    
    $res = mysqli_query($connection, $qury);
    $errormessage = "<p>Your payment failed</p>";
}

?>
