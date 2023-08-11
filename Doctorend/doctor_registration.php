<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
    form {
  max-width: 500px;
  margin: auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 10px;
}

h2 {
  text-align: center;
  margin-bottom: 30px;
}

input[type="text"], input[type="password"], select {
  width: 100%;
  padding: 10px;
  margin: 5px 0;
  border: none;
  border-bottom: 1px solid #ddd;
  font-size: 16px;
  font-family: 'Open Sans', sans-serif;
  margin-right: 10px;
  margin-bottom: 10px;
}

input[type="submit"]:hover {
  background-color: darkblue;
}

label {
  font-size: 16px;
  font-weight: bold;
  font-family: 'Open Sans', sans-serif;
  margin-top: 20px;
  display: block;
}

.error {
  color: red;
  font-size: 14px;
  font-family: 'Open Sans', sans-serif;
  margin-top: 5px;
}
span{
    font-size: 15px;
    color: blue;
}
</style>


</head>


<body>
    
<form action="doctor_register.php" method="post">
    <h2>REGISTER</h2>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br>

  <label for="confirm-password">Confirm Password:</label>
  <input type="password" id="confirm-password" name="confirm-password" required><br>

  <center><input type="submit" class="btn btn-primary" value="Register"></center>
  <center><p>Already Registered? <a href="doclogin.php">Login here</a></p></center>
</form>

</body>
</html>
