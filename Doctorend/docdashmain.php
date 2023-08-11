<!DOCTYPE html>
<html>
<head>
	<title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
         :root{
   --blue:#5f9ea0;
   --black:#333;
   --white:#fff;
   --light-color:#666;
   --light-bg:#eee;
   --border:.2rem solid #0000001a;
   --box-shadow:0 .5rem 1rem #0000001a;
}
		.container {
			
      padding:20px;
      
      box-shadow: 0 5px 10px rgba(0,0,0,.1);
      background: #fff;
      text-align: center;
      width: 800px;
     
    
		}
		h1 {
			font-size: 36px;
			margin-bottom: 30px;
		}
        .link-btn{
   display: inline-block;
   padding: 0.5rem;
   border-radius: .5rem;
   background-color: var(--blue);
   cursor: pointer;
   font-size: 1rem;
   color:var(--white);
            margin-right: 20px;
}

.link-btn:hover{
   background-color: var(--black);
   color:var(--white);
}
.btn{
    display: inline-block;
   padding: 0.5rem;
   border-radius: .5rem;
   cursor: pointer;
   font-size: 1rem;
   
}
.btn:hover{
   background-color: var(--black);
   color:var(--white);
}
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
	</style>
</head>
<body class="body">
    <?php
   session_start();
   $doc_id = $_SESSION['doc_id'];
   
   // Retrieve doctor's username using PDO
   $conn = new PDO('mysql:host=localhost;dbname=consultation', 'root', '');
   $sql = "SELECT username FROM doctor WHERE doctor_id = :doc_id";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':doc_id', $doc_id);
   $stmt->execute();
   $doc = $stmt->fetch();
   $docname = $doc['username'];
   
  
?>   

<br>	
<div class="container">
		<h1>Welcome, <?php echo $docname; ?>!</h1>
		
			<a href="docdash.php" class="link-btn">View Consultations</a>
	
			<a href="logout.php" class="btn btn-danger">Logout</a>
	
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



