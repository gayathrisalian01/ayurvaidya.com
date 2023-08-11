<?php
$json = json_encode($_REQUEST);
file_put_contents('test.json', $json);

$salt = "cf745b0608b148ccb777550e89762931";
$data = $_POST;
$json = json_encode($data);
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

$mac_calculated = hash_hmac("sha1", implode("|", $data), "$salt");

if($mac_provided == $mac_calculated){
    if($data['status'] == "Credit"){
        
    $RefID = $data['payment_request_id'];
    $PaymentID = $data['payment_id'];
    $servername = "sql12.freemysqlhosting.net";
    $username = "sql12614073";
    $password = "X1kGN2PXRb";
    $dbname = "sql12614073";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $dataentry = "UPDATE MojoPayments SET PaymetID = '$PaymentID', status ='PAID' WHERE OrderID = '$RefID'";
    if($conn->query($dataentry)){
        echo"MySQL Updated"."\n ";
        file_put_contents('MySQLmsg.txt', 'Paid Updated');
    }
    else{
        echo"Error while updating MySQL"."\n ";
        file_put_contents('MySQLmsg.txt', 'Paid Update Failed');
    }
    
        
    }
    file_put_contents('last.json', $json);
}else{
    file_put_contents('macfailed.txt', 'mac failed');
}

echo"Thankyou for posting this data";
?>