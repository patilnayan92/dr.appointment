<?php
	// include("db_config.php");

	date_default_timezone_set('Asia/Kolkata');

	require('payment_config.php');
	require('razorpay/Razorpay.php');
	session_start();

	// Create the Razorpay Order

	use Razorpay\Api\Api;

	$api = new Api($keyId, $keySecret);

	$currentPageUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$parts = parse_url($currentPageUrl);
	parse_str($parts['query'], $query);
	$drfee = $query['Fee'];

	// We create an razorpay order using orders api
	// Docs: https://docs.razorpay.com/docs/orders
	//
	$orderData = [
	    'receipt'         => time() . mt_rand(),
	    'amount'          => $drfee * 100, // 2000 rupees in paise
	    'currency'        => 'INR',
	    'payment_capture' => 1 // auto capture
	];


	$razorpayOrder = $api->order->create($orderData);

	$razorpayOrderId = $razorpayOrder['id'];

	$_SESSION['razorpay_order_id'] = $razorpayOrderId;

	$displayAmount = $amount = $orderData['amount'];

	$userReceiptId = $merchant_oderId = $orderData['receipt'];
	if ($displayCurrency !== 'INR')
	{
	    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
	    $exchange = json_decode(file_get_contents($url), true);

	    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
	}

	$checkout = 'automatic';

	if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
	{
	    $checkout = $_GET['checkout'];
	}

	$data = [
	    "key"               => $keyId,
	    "amount"            => $amount,
	    "name"              => $query['name'],
	    "prefill"           => [
		    // "regId"				=> $_POST['reg_id'],
		    "email"         => $query['Email'],
		    "contact"       => $query['Mobile'],
		    "DrFee"         => $query['Fee'],
	    ],
	    "notes"             => [
	    	"merchant_order_id" => $merchant_oderId,
	    ],
	    "theme"             => [
	    	"color"         => "#528FF0"
	    ],
	    "order_id"          => $razorpayOrderId,
	];

	if ($displayCurrency !== 'INR')
	{
	    $data['display_currency']  = $displayCurrency;
	    $data['display_amount']    = $displayAmount;
	}

	$json = json_encode($data);

	require("{$checkout}.php");


?>