<?php
session_start();
$patient_id = $_SESSION['patientId'];

// Retrieve consultations for this patient
$conn = new PDO('mysql:host=localhost;dbname=consultation', 'root', '');

$sql = "SELECT * FROM consultation_form WHERE patientId = :patient_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':patient_id', $patient_id);
$stmt->execute();
$consultations = $stmt->fetchAll(PDO::FETCH_ASSOC);


/*
$pdo = new PDO('mysql:host=localhost;dbname=consultation', 'root', '');
$res = $pdo->prepare("SELECT status FROM consultation_form WHERE consultation_id = :consultation_id");
$res->bindParam(':consultation_id', $consultation_id);
$res->execute();

$status = $res->fetchColumn(); // Fetch the value of status column from the first row

// assuming $status contains the status value
if ($status == 0) {
    $buttonText = "Replied";
} else {
    $buttonText = "Reply";
}
*/




?>
<html>
  <head><style>
    body{
      min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: url('./images/hand-painted-watercolor-nature-background_23-2148941600.jpeg') no-repeat;
   background-repeat: no-repeat;
   position:center;
   background-attachment: fixed;
   background-size: cover;
   
  
    }
  </style></head>
<!-- HTML table to display consultations for this patient -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<body class="body">
<div class="container mt-5">
  <h2>My consultations</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Consultation ID</th>
        <th scope="col">Date</th>
        <th scope="col">View</th>
        <th scope="col">Response</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($consultations as $consultation) {
  $status = $consultation['status'];
  $button_text = ($status == 1) ? 'View' : 'No response';
  $form_action = ($status == 1) ? 'view_reply.php' : '';
  $button_class = ($status == 1) ? 'btn-success' : 'btn-primary';
  $response = $consultation['response'];
?>
  <tr>
    <td><?php echo $consultation['consultation_id']; ?></td>
    <td><?php echo $consultation['Consultation_Date']; ?></td>
    <td><a href="view_pdf.php?id=<?php echo $consultation['consultation_id']; ?>" target="_blank"><button class="view-btn btn btn-primary"><?php echo 'View'; ?></button></a></td>
    <td><a href="view_reply.php?id=<?php echo $consultation['consultation_id']; ?>" target="_blank"><button class="view-btn btn btn-primary"><?php echo $button_text; ?></button></a></td>
   
  </tr>
<?php } ?>

    </tbody>
  </table>
</div>
</body>
</html>



