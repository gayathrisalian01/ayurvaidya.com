<?php
session_start();
isset($_SESSION["username"]);
$conn = mysqli_connect('localhost','root','','consultation') or die('connection failed');

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sri Dharmsthala Manjunatheshwara Ayurveda Hospital</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!--feedback-->
   <link href="./images/css/style.css" rel="stylesheet" type="text/css" media="all" />
   <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    
</head>
<body class="body">
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">Ayur<span>Vaidya</span></a>

         <nav class="nav">
            <a href="#home">home</a>            
            <a href="#services">services</a>
            <a href="#reviews">reviews</a>
            <a href="#contact">contact</a>
         </nav>

         <?php
      
      if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo '<ul><a href="../CONSULTATION_FORM.php" class="link-btn">Consult Doctor</a></ul>';
      
      }
    
        ?>
        

         <div id="menu-btn" class="fas fa-bars"></div>
      
         <ul>
<?php
if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo '<a href="#" class="login-option">Welcome, ' . $username . '</a>';
      }
      else{
         echo '<a href="#" class="login-option">Login/Register for Consultation '  . '</a>';
      }
        ?>
  </ul>
         
         <div class="icon-container">
  <i class="fa-solid fa-circle-user fa-5x" style="color: #5f9ea0; cursor:pointer;" title="Login/Signup"></i>
  <ul class="options-container">
  <?php
      
      if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo '<ul><a href="patientcons.php" class="register-option">Consultations</a></ul>';
        echo '<ul><a href="logout.php" class="register-option">Logout</a></ul>';
      } else {
        echo '<ul><a href="../loginsystem/login_form.php" class="login-option">Login</a></ul>';
        echo '<ul><a href="../loginsystem/register_form.php" class="register-option">Register</a></ul>';
      }
    ?>
  </ul>
</div>

</div>


<script>
  const iconContainer = document.querySelector('.icon-container');
const optionsContainer = document.querySelector('.options-container');

iconContainer.addEventListener('click', () => {
  iconContainer.classList.toggle('active');
});

</script>
        


      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
   
   <div class="container">
   
      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>Sri Dharmasthala Manjunatheshwara </h3>
            <p>Ayurveda Hospital, Kuthpadi, Udupi </p>
            <a href="#about" class="link-btn">About Us</a>
            
         
         </div>
      </div>
   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/about-us.jpeg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>

            <h3>True Healthcare For Your Family</h3>
            <p>Shri Dharmasthala Manjunatheshwara Ayurveda Hospital is a premier Institute of the Country in providing quality Ayurvedic Healthcare. Established in 1958, Hospital is associated with Shri Dharmasthala Manjunatheshwar College of Ayurveda.The Hospital has been maintaining precise balance between Classical Ayurvedic concepts and Modern Medical advancements by utilizing modern diagnostic equipment for early as well as accurate diagnosis and then managing the diseases by unique Ayurvedic medicines. The treatments are organized comprehensively by incorporating Yoga and Physiotherapy in to the Ayurvedic Panchakarma regimen.</p>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 6</div>
  <img src="./images/slider1.jpeg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 6</div>
  <img src="./images/slider2.jpeg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 6</div>
  <img src="./images/slider3.jpeg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 6</div>
  <img src="./images/slider4.jpeg" style="width:100%">
  <div class="text">Caption Four</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 6</div>
  <img src="./images/slider5.jpeg" style="width:100%">
  <div class="text">Caption Five</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 6</div>
  <img src="./images/slider6.jpeg" style="width:100%">
  <div class="text">Caption Six</div>
</div>


</div>
<br>


<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "block";  
  }

  // Continuously move the slides
  setInterval(function() {
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }, 3000);
}
</script>


<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Kayachikitsa (Internal medicine)</h3>
         <p>focuses on managing Rheumatological diseseas, metabolic disorders, gastrointestinal disorders, skin diseases, airway diseases, liver diseases, urinary diseases, Psychiatric problems, Male infertility and Rasayana Chikitsa (rejuvenation therapy).</p>
      </div>

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Panchakarma, Koumarbhritya (Paediatrics)</h3>
         <p>Panchakarma department is the super speciality department of Ayurveda.All type of classical and Keraleeya Panchakarma procedures are performed in hospital by well trained Panchakarma Technicians under the supervision of Panchakarma Consultants and Resident Medical officers.</p>
      </div>

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Koumarbhritya (Paediatrics)</h3>
         <p>The Koumarabhritya department (Ayurveda Paedicatrics) provides holistic care beginning from Intrauterine life upto 16 years of the child. It focuses on ensuring healthier growth and development of children.</p>
      </div>

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Shalakya Tantra (Opthalmology & ENT)</h3>
         <p>The Shalakya Tantra cluster (Ayurveda Opthalmology and ENT Wing) mainly focuses on treating diseases affecting eyes, ears, nose, throat, head and teeth. This department focuses on refractive errors, conjunctivitis, glaucoma, diabetic retinopathy, scleritis, retinitis pigmentosa, dry eye syndrome, various kinds of headaches, ear infections, hearing loss , acute and chronic sinusitis etc. 
            Special therapeutic procedures known as Kriyakalpa are utilised in treating patients in this department.</p>
      </div>

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Shalya Tantra (Surgery)</h3>
         <p>The Shalya Tantra clinic (Ayurveda Surgery wing) in the hospital focuses on managing surgical conditions such as ano-rectal cases, non healing ulcers, artero venous disorders and other inflammatory conditions.</p>
      </div>

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Prasooti tantra evam Striroga ( Obstetrics& Gynaecology)</h3>
         <p>The Prasooti Tantra ( Ayurveda Gynaecology and Obstetrics) evam Stree Roga department and Koumarabhritya departments work hand in hand to fulfil the mission of healthy progeny and future citizens emphasizing on Ayurvedic ante-natal, natal, post natal and neonatal practices.There is equal focus on Women’s health and management of gynaecological disorders.</p>
      </div>

      <div class="box">
         <img src="images/lotus-logo.jpeg" alt="">
         <h3>Swasthavrittha (Preventive medicine, Yoga and Naturopathy)</h3>
         <p>An independent centralised Pathyahara Unit( Ayurveda diet) is set up in the third floor of the hospital to take care of the dietic requirements of all the in-patients of the hospital.</p>
      </div>

   </div>

</section>

<!-- reviews section starts  -->

<section class="sec" id="reviews">
<h1 class="heading">Testimonials</h1>
  <div class="container">
    <div class="testimonials">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php
            //session_start();
            require './config.php';
            $result = mysqli_query($con,"SELECT * FROM poll");

            $active = "active"; // Add this variable to track active carousel item
            while($row = mysqli_fetch_array($result))
            {
          ?>
          <div class="carousel-item <?php echo $active; ?>">
            <div class="single-item">
              <div class="row">
                <div class="col-md-5">
                  <div class="profile">
                    <div class="img-area">
                      <img src="./images/feedbackdis.jpg" alt="">
                    </div>
                    <div class="bio">
                      <h2><?php echo $row['name']; ?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="content">
                    <p style="word-wrap: break-word;"><span><i class="fa fa-quote-left"></i></span><br/>
                    <strong>Feedback: </strong><?php echo $row['feedback']; ?><br>
                    <strong>Suggestions: </strong><?php echo $row['suggestions']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            $active = ""; // Reset the active variable after first carousel item
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>






<!-- reviews section starts  -->


<!-- reviews section ends -->
<?php
      
      if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo 
      
      '

<div class="form-area">
<h1 class="heading">Feedback</h1>
        <div class="container">
            <div class="row single-form g-0">
                <div class="col-sm-12 col-lg-6">
                    <div class="left">
                        
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="right">
                       <i class="fa fa-caret-left"></i>
                       <form method="post" action="feedback.php">
                        <h2>How satisfied were you with our Service?</h2>
			 <ul class="agile_info_select"><br/>
				 <li><input type="radio" name="view" value="excellent" id="excellent" required> 
				 	  <label for="excellent">excellent</label>
				      <div class="check w3"></div>
				 </li>
				 <li><input type="radio" name="view" value="good" id="good"> 
					  <label for="good"> good</label>
				      <div class="check w3ls"></div>
				 </li>
				 <li><input type="radio" name="view" value="neutral" id="neutral">
					 <label for="neutral">neutral</label>
				     <div class="check wthree"></div>
				 </li>
				 <li><input type="radio" name="view" value="poor" id="poor"> 
					  <label for="poor">poor</label>
				      <div class="check w3_agileits"></div>
				 </li>
			 </ul><br/>	  
                          <div class="mb-3">
                            
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                          </div>
                          <div class="mb-3">
                        
                            <input type="email" placeholder="Email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            
                              <textarea type="password" class="form-control" id="view" name="comments" placeholder="If you have specific feedback, please write to us... "></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

';
}
      
?>



<!-- contact section starts  -->

<!-- contact section ends -->

<!-- footer section starts  -->
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15530.39343106536!2d74.7357812!3d13.3130114!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbcbb072e4f9d2b%3A0x9986416679874135!2sSDM%20Ayurveda%20Hospital%2CKuthpady%2CUdupi!5e0!3m2!1sen!2sin!4v1680932586779!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<section class="footer" id="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <a href="tel:#"><p>0820-2533303</p></a>
      </div>
      
      <div class="box">
         <a href="https://goo.gl/maps/KEK9n8VfV337VfX5A" target="_blank"><i class="fas fa-map-marker-alt"></i></a>
         <h3>our address</h3>
         <a href="https://goo.gl/maps/KEK9n8VfV337VfX5A" target="_blank"><p>Sri Dharmasthala Manjunatheshwara College of Ayurveda & Hospital,
Kuthpady, Udupi-574118</p></a>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>consultaion timings</h3>
         <p> 9.30 am to 5.30 pm on week days, 9.30 am to 1.00pm on Sundays</p>
      </div>
      

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <a href="mailto:#"><p>sdmcau@gmail.com</p></a>
      </div>
      
   </div>

   <div class="credit"> &copy; copyright <span>SDM AYURVEDA HOSPITAL, UDUPI @ <?php echo date('Y'); ?>. DESIGN & DEVELOPMENT BY THE BRAINIACS</span>  </div>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="./js/script.js"></script>

</body>
</html>











