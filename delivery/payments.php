<?php
// Replace with your own values
$api_key = 'test_0fb5d267a37e04a58dcb4b9e0f4';
$auth_token = 'test_9b6fbdba14b5d1f4c3c86f6f319';
$amount = 100;
$purpose = 'Test Payment';
$email = $_REQUEST['email'];
$phone = $_REQUEST['mobile'];
$name = $_REQUEST['name'];
$redirect_url = 'http://localhost/AYURVAIDYA/success.php';
$webhook_url = 'https://speak24.in/asset/aish/payment_webhook.php';

// Initialize cURL
$ch = curl_init();

// Set the API endpoint URL
curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');

// Set the request method to POST
curl_setopt($ch, CURLOPT_POST, 1);

// Set the request parameters
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
	'amount' => $amount,
	'purpose' => $purpose,
	'buyer_name' => $name,
	'email' => $email,
	'phone' => $phone,
	'redirect_url' => $redirect_url,
	'webhook' => $webhook_url
)));

// Set the API authentication headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'X-Api-Key:'.$api_key,
	'X-Auth-Token:'.$auth_token
));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the API request and get the response
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the response JSON
$json = json_decode($response);

// Check if the request was successful
if ($json->success) {
	// Redirect to the payment page
	include 'connect.php';
	$ts = date('y'.'m'.'d'.'H'.'i'.'s'); 

	$paymentid = $json->payment_request->id;

	$sql = "INSERT INTO MojoPayments (Name, Email, Mobile, OrderID, PaymetID, TS)
	VALUES ('$name', '$email', '$phone', '$paymentid', 'Not_Paid', $ts)";
	if ($conn->query($sql) === TRUE){ 
	header('Location: '.$json->payment_request->longurl);
	exit;
	}
	else{
		echo"SQL connection failed";
		exit;
	}
	
} else {
	// Show error message
	echo 'Error: '.$json->message;
}
?>