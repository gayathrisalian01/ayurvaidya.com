<!DOCTYPE html>
<html>
<head>
	<title>Simple HTML Form</title>
	<style>
		form {
			width: 400px;
			margin: auto;
			padding: 20px;
			background-color: #f7f7f7;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
		}
		
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		
		input[type=text], input[type=email], input[type=tel] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
		}
		
		button[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form action="payments.php">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		
		<label for="mobile">Mobile Number:</label>
		<input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
		
		<button type="submit">Pay Now</button>
	</form>
</body>
</html>