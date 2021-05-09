<?php 
  error_reporting(0);
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
  </head>
<body class="supernova">

<nav class="navbar navbar-expand-sm ">
  <a class="navbar-brand" href="#">
    <img src="images/Logo.png" style="width: 100px;">
  </a>
</nav>

<div class="container mb-5" style="margin-top:30px;">
  <div class="row">
    <!-- <section class="w3l-cta5 py-5">
      <div class="call-to-action-5 py-5">
        <div class="container">   
          <div class="row"> -->
            <div class="col-lg-12 col-md-12 col-sm-12 text-center confirmpayment">
              <h5>Verify Your Payment Details</h5>
              <p>Name: <?php echo $data['name'] ?></p>
              <p>Email: <?php echo $data['prefill']['email'] ?></p>
              <p>Mobile: <?php echo $data['prefill']['contact'] ?></p>
              <p>Amount: INR <?php echo $data['prefill']['DrFee'] ?></p>
              <form action="verify.php" method="POST">
                <script
                  src="https://checkout.razorpay.com/v1/checkout.js"
                  data-key="<?php echo $data['key']?>"
                  data-amount="<?php echo $data['amount']?>"
                  data-currency="INR"
                  data-name="<?php echo $data['name']?>"
                  data-prefill.name="<?php echo $data['prefill']['name']?>"
                  data-prefill.email="<?php echo $data['prefill']['email']?>"
                  data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                  data-notes.shopping_order_id="<?php echo $data['notes']['merchant_order_id'] ?>"
                  data-order_id="<?php echo $data['order_id']?>"
                  <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                  <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
                >
                </script>
                <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                <input type="text" name="id" value="<?php echo $_POST['id'] ?>" hidden>
                <input type="text" name="name" value="<?php echo $data['name'] ?>" hidden>
                <input type="text" name="email" value="<?php echo $data['prefill']['email'] ?>" hidden>
                <input type="text" name="mobile" value="<?php echo $data['prefill']['contact'] ?>" hidden>
                <input type="text" name="amount" value="<?php echo $data['prefill']['DrFee'] ?>" hidden>
                <input type="text" name="order_id" value="<?php echo $data['order_id'] ?>" hidden>
                <input type="text" name="merchant_oderId" value="<?php echo $data['notes']['merchant_order_id'] ?>" hidden>
                <input type="hidden" name="shopping_order_id" value="<?php echo $data['notes']['merchant_order_id'] ?>">
              </form>
            </div>
           
           
   <!--        </div>
        </div>
      </div>
    </section> -->
    </div>
  </div>

</body>
</html>