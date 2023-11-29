<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paw Care</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!--=============menu part start=============-->
  <div class="container">
    <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
      <a class="navbar-brand" href="#"><img src="image/Pawcare-logo-Version-02.png" alt=""></a>
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading1">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading2">Our Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading3">Pet Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading4">Pet Hostel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#scrollspyHeading5">about us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin Panel</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Medical Services</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#scrollspyHeading3">checkup</a></li>
            <li><a class="dropdown-item" href="#scrollspyHeading4">vaccine</a></li>
            <li><a class="dropdown-item" href="#scrollspyHeading5">nuture</a></li>
            <li><a class="dropdown-item" href="#scrollspyHeading5">spey</a></li>
          </ul>
        </li>
        <li>-->
        <div id="login_reg" class="d-grid gap-2 d-md-flex justify-content-md-end">
          <?php
          if ($_SESSION['loggedin']) {

            echo '<a href="logout.php"><button  class="btn btn-primary me-md-2" type="button" ><i  class="fa fa-sign-in" aria-hidden="true"></i> Logout</button></a>';
          } else {
            echo '<a href="login.php"><button  class="btn btn-primary me-md-2" type="button" ><i  class="fa fa-sign-in" aria-hidden="true"></i> Login</button></a>
                <a href="reg.php"><button class="btn btn-primary" type="button"><i class="fa fa-registered" aria-hidden="true"></i> Register</button></a>';
          }

          ?>


        </div>
        </li>
      </ul>
    </nav>
  </div>
  <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">

    <h4 id="scrollspyHeading1">
      <!--=============Banner part start=============-->
      <section id="banner">
        <div class="container">
          <div class="row">
            <div id="image"> <img src="image/banner.jpg" class="img-fluid" alt=""></div>
            <div id="text">
              <p>We provide the best services for our customers<br> that puts your pet’s health first.</p>
            </div>
          </div>

        </div>
      </section>


    </h4>
    <!--=============Banner part end=============-->
    <h4 id="scrollspyHeading4"></h4>
    <p>...</p>
    <h4 id="scrollspyHeading5">
      <!--============about us start=============-->
      <div class="container">
        <div id="heading" class="row">
          <h1>About us</h1>
        </div>
        <div id="text1" class="row">
          <h2>Welcome to PAW CARE</h2>
          <p>Where passion meets compassion in providing exceptional care for your beloved pets.</p>
          <p>At PAW CARE, we understand that your pets are not just animals; they are cherished members of your family. That's why we are dedicated to delivering top-notch pet care services that go beyond the ordinary.</p>

          <h2>Our Mission</h2>
          <p>At PAW CARE, our mission is to provide unparalleled care for pets, fostering a sense of trust and security between pets and their owners...</p>
          <h2>Why Choose PAW CARE?</h2>
          <ul>
            <li><strong>Passionate Professionals:</strong> Our team consists of passionate pet lovers who are committed to providing the best care for your furry friends.</li>
            <li><strong>Safety First:</strong> We prioritize the safety and well-being of your pets...</li>
            <!-- Add other points here -->
          </ul>

          <div class="read-more-content">
            <p>At PAW CARE, we believe that a happy pet leads to a happy owner. Let us be your trusted partner in ensuring the health, happiness, and well-being of your beloved companions. Contact us today to learn more about our services and how we can make a positive difference in the lives of your pets.</p>
          </div>

          <input type="checkbox" class="read-more-checkbox" id="read-more-toggle">

        </div>

      </div>
      <!--============about us end=============-->
    </h4>
    <p>...</p>

    <!--=============Our services part start=============-->
    <h4 id="scrollspyHeading2">
      <div class="container">
        <div id="heading" class="row">
          <h1>Our Services</h1>
        </div>


        <div class="row">
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/OIP.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3>Pet Grooming</h3>
                <p class="card-text"> Pet Grooming is not only relates to the
                  physical wellbeing of the pet, but also its appearance.
                  For grooming your loving pet, we use a variety of modern
                  equipment and techniques. We ensure
                  the absolute comfort and convenience of your pet while grooming.</p>
                <a href="appointments.php?type=Grooming" class="btn btn-primary">Book Appointment</a>
              </div>
            </div>
          </div>
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3>Pet Showering</h3>
                <p class="card-text"> Bathing is essential to your pet’s health as it
                  helps prevent skin problems such as matting.
                  We’ll suds away dirt, oil and debris to help skin & coats of
                  all kinds look and feel great.</p>
                <a href="appointments.php?type=Showering" class="btn btn-primary">Book Appointment</a>
              </div>
            </div>
          </div>
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/nuture.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3>Surgeries Neutering Spaying</h3>
                <p class="card-text"> We have skilled, qualified and accomplished
                  veterinary surgeons who offer both spaying and neutering surgeries. And we are
                  providing the services at the most-effective cost, ensuring your pet’s proper treatment.</p>
                <a href="appointments.php?type=Neuter/Spay" class="btn btn-primary">Book Appointment</a>
              </div>
            </div>
          </div>
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/OIP (1).jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3>Nail Clipping</h3>
                <p class="card-text"> It is very important to trim your pet’s nails.
                  Because nails can grow too long and they can cause of pain for your pet.
                  Contact us and let’s trim your pet’s nails in its perfect form.</p>
                <a href="appointments.php?type=Nail Clipping" class="btn btn-primary">Book Appointment</a>
              </div>
            </div>
          </div>
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/vac.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3>Vaccination</h3>
                <p class="card-text">We have trained, professional and experienced veterinary surgeons who offer both spaying and neutering surgeries.
                  And we provide the facilities at the most effective cost,
                  ensuring adequate care for your pet.</p>
                <a href="appointments.php?type=Vaccination" class="btn btn-primary">Book Appointment</a>
              </div>
            </div>
          </div>
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/vet.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3>Vet’s Consultation</h3>
                <p class="card-text"> we are always proactive to console your furry
                  friends both home and away in order to keep your pet safe, fit and strong.
                  Connect us and ensure your pet’s sound healthy.</p>
                <a href="appointments.php?type=Vet Consultation" class="btn btn-primary">Book Appointment</a>
              </div>
            </div>
          </div>
          <!-- Rescue Card -->

          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/rescue.jpg" class="card-img-top" alt="Rescue Service">
              <div class="card-body">
                <h3>Rescue Service</h3>
                <p class="card-text">Found a stray animal? Help them find a home by filling out the rescue form. Your small effort can make a big difference.</p>
                <!-- Link to Rescue Form Page -->
                <a href="rescueFormHandler.php" class="btn btn-primary">Found something?</a>
              </div>
            </div>
          </div>

          <!-- Adoption Card -->
          <div id="cards" class="col-lg-4">
            <div class="card" style="width: 18rem;">
              <img src="image/adopt.jpg" class="card-img-top" alt="Adoption Service">
              <div class="card-body">
                <h3>Adoption Service</h3>
                <p class="card-text">Looking to adopt a pet? Check out our list of adorable animals waiting for a loving home.</p>
                <a href="adoptionList.php" class="btn btn-primary">Available Adoptions</a>
              </div>
            </div>
          </div>



        </div>
      </div>
    </h4>

    <!--=============our service part end=============-->



    <!--=============Our doctors part start=============-->
    <h4 id="scrollspyHeading2">
      <div class="container">
        <div id="heading" class="row my-5">
          <h1>Our Doctors</h1>
        </div>
        <div class="row">

          <?php

          include "dbConnect.php";

          $query = "SELECT * FROM `doctors`";
          $result = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result)) {


            $name = $row['name'];
            $field = $row['field'];
            $credentials = $row['credentials'];
            $description = $row['description'];
            $contact = $row['contact'];
            $photo = $row['photo'];


            echo '<div id="cards" class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="' . $photo . '" class="profile-pic" alt="' . $name . '">
                    <div class="card-body">
                        <h3>' . $name . '</h3>
                      <p class="card-text"><b>' . $field . '</b></p>
                      <p class="card-text">' . $description . '</p>
                        <p class="card-text"><b>Qualifications: </b>' . $credentials . '</p>
                        <p class="card-text"><b>Contact: </b>' . $contact . '</p>
                    </div>
                  </div>
            </div>';
          }




          ?>




        </div>
      </div>
    </h4>

    <!--=============our doctors part end=============-->





    <!--=============pet blog start=============-->
    <h4 id="scrollspyHeading3">
      <div class="container">
        <div id="heading" class="row">
          <h1>Pet Blog</h1>
        </div>
        <div id="blog" class="row">
          <div id="vdo" class="col-lg-6">
            <figure class="figure">
              <iframe width="400" height="315" src="https://www.youtube.com/embed/PrXoR_VbDhM?si=TPyckFcrVFkgz-_3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              <figcaption class="figure-caption">Mother Cat and Kittens Reunited

              </figcaption>
          </div>
          <div id="vdo" class="col-lg-6>
                  <figure class=" figure">
            <iframe width="400" height="315" src="https://www.youtube.com/embed/5530I_pYjbo?si=z2jJ6lHthPqFR7c_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <figcaption class="figure-caption">How to train cat

            </figcaption>
          </div>
          </figure>
        </div>

      </div>
    </h4>
    <p></p>
    <h4 id="scrollspyHeading4"></h4>
    <p></p>

  </div>
  <!--=============menu part end=============-->

  <div class="container">
    <footer>
      <div class="contact-us">
        <h3>Contact Us</h3>
        <p>Have questions? Reach out to us!</p>
        <p>Email: <a href="nafisa.lubaba.prithula@g.bracu.ac.bd">pawcare@gmail.com</a></p>
        <p>Phone: (123) 456-7890</p>
      </div>
    </footer>
  </div>



  <script src="css/bootstrap.min.css"></script>
  <script src="css/style.css"></script>
</body>

</html>