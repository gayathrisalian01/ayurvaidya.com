<?php
session_start();
if (!isset($_SESSION['doc_id'])) {
  header('Location: doclogin.php');
  exit;
}

$doc_id = $_SESSION['doc_id'];

// Retrieve consultations for this doctor
$conn = new PDO('mysql:host=localhost;dbname=consultation', 'root', '');

$sql = "SELECT * FROM consultation_form WHERE DocId = :doc_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':doc_id', $doc_id);
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
       :root{
   --blue:#5f9ea0;
   --black:#333;
   --white:#fff;
   --light-color:#666;
   --light-bg:#eee;
   --border:.2rem solid #0000001a;
   --box-shadow:0 .5rem 1rem #0000001a;
}
    body{
      min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: url('./Images/hand-painted-watercolor-nature-background_23-2148941600.jpeg') no-repeat;
   background-repeat: no-repeat;
   position:center;
   background-attachment: fixed;
   background-size: cover;
   
  
    }
    .link-btn{
   display: inline-block;
   padding: 0.5rem;
   border-radius: .5rem;
   background-color: var(--blue);
   cursor: pointer;
   font-size: 1rem;
   color:var(--white);
}

.link-btn:hover{
   background-color: var(--black);
   color:var(--white);
}
  </style></head>
<!-- HTML table to display consultations for this doctor -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<body class="body">
<div class="container mt-5">
  <h2>Consultation Forms</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Consultation ID</th>
        <th scope="col">Date</th>
        <th scope="col">Patient ID</th>
        <th scope="col">View</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($consultations as $consultation) {
  $is_replied = $consultation['status'];
  $button_text = ($is_replied == 1) ? 'Replied' : 'Reply';
  $form_action = ($is_replied == 1) ? 'view_reply.php' : 'reply.php';
  $button_class = ($is_replied == 1) ? 'btn-success' : 'btn-primary';
?>
  <tr>
    <td><?php echo $consultation['consultation_id']; ?></td>
    <td><?php echo $consultation['Consultation_Date']; ?></td>
    <td><?php echo $consultation['patientId']; ?></td>
    <td><a href="view_pdf.php?id=<?php echo $consultation['consultation_id']; ?>" target="_blank"><button class="link-btn">View</button></a></td>
    <td>
      <form action="<?php echo $form_action; ?>" method="GET">
        <input type="hidden" name="id" value="<?php echo $consultation['consultation_id']; ?>">
        <button class="link-btn <?php echo $button_class; ?>"><?php echo $button_text; ?></button>
      </form>
    </td>
  </tr>
<?php } ?>

    </tbody>
  </table>
  <button type="button" class="link-btn" onclick="window.location.href='docdashmain.php'">Go to Homepage</button>

</div>
</body>
</html>



