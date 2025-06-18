<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKINBYZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<style>
 *{
    font-family: "Poppins", sans-serif;
 }
 .h-font{
    font-family: "Merienda", cursive;
 }
 .swiper-container {
    height: 60vh;
    margin-top: 20px;
 }
 .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
 }

 @media (max-width: 992px) {
    .swiper-container {
        height: 50vh;
    }
 }

 @media (max-width: 768px) {
    .swiper-container {
        height: 40vh;
        margin-top: 15px;
    }
 }

 @media (max-width: 576px) {
    .swiper-container {
        height: 35vh;
        margin-top: 10px;
    }
 }
</style>
</head>
<?php
session_start();
?>
<body class="bg-light">
   
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">BOOKINBYZ</a>
            <button class="navbar-toggler  shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">Careers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="about.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle me-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bookings
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item me-2" href="artists_new.php"> 
                        <i class="bi bi-vinyl fs-3 me-2"></i> Artists</a></li>
                    <li><a class="dropdown-item me-2" href="#">
                        <i class="bi bi-music-note fs-3 me-2"></i> Band</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item me-2" href="contact.php">
                        <i class="bi bi-envelope-at fs-3 me-2"></i> Contact Us</a></li>
                </ul>
                </li>
            </ul>
            <div class="d-flex">
                <?php if (isset($_SESSION['user_name'])): ?>
                    <span class="navbar-text me-3">Hello, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    <a href="Admin/logout.php" class="btn btn-outline-danger shadow-none">Logout</a>
                <?php else: ?>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#signupModal">
                        Sign Up
                    </button>
                <?php endif; ?>
            </div>
    </nav>

    <!-- Modals -->
    <div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="signup.php">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-plus-fill fs-3 me-2"></i> User Sign Up
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control shadow-none" required>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Sign Up</button>
                            <button type="button" class="btn btn-link shadow-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Already have an account? Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="login.php">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-fill fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control shadow-none" required>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Login</button>
                            <button type="button" class="btn btn-link shadow-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#resetModal">
                                Forgot Password? Click Here.
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="resetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-key-fill fs-3 me-2"></i> Password Reset
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Enter your email address</label>
                            <input type="email" class="form-control shadow-none" required>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Send Reset Link</button>
                            <button type="button" class="btn btn-link shadow-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Back to Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Carousels -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="Images/carousels/HAS2.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="Images/carousels/HAS4.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="Images/carousels/HAS1.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="Images/carousels/HAS2.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="Images/carousels/HAS4.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="Images/carousels/HAS1.jpg" class="w-100 d-block">
                </div>
            </div>
        </div>    
    </div>

    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white shadow-sm rounded-3 mt-4 p-4">
                <h1 class="h-font text-center">Welcome to BOOKINBYZ</h1>
                <p class="text-center">Your one-stop destination for all your booking needs. Explore our services and book your favorites today!</p>
            </div>
        </div>
    </div>

    <!-- Capital Block Party Blog Section -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white shadow-sm rounded-3 mt-4 p-4">
                <h2 class="h-font text-center">Capital Block Party</h2>
                <h3 class="text-center mb-4">Featuring Nigeria's Finest Artists</h3>
                
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="Images/carousels/Wizz.jpg" class="card-img-top" alt="Artist 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">Wizkid</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="Images/carousels/Feyo.jpg" class="card-img-top" alt="Artist 2">
                            <div class="card-body text-center">
                                <h5 class="card-title">Feyo and the Banta Boys</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="Images/carousels/jayzen1.jpg" class="card-img-top" alt="Artist 3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jayzen</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="Images/artists/YPP.jpg" class="card-img-top" alt="Artist 4">
                            <div class="card-body text-center">
                                <h5 class="card-title">YP</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <p class="text-center">
                            Join us for the biggest music event of the year! The Capital Block Party brings together Nigeria's top artists for an unforgettable night of music and entertainment. 
                            Hosted by BOOKINBYZ Agency, this exclusive event will showcase the best talents in the industry.
                        </p>
                        <div class="text-center mt-4">
                            <a href="artists.php" class="btn btn-dark shadow-none">Book Tickets Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Concert Images Carousel -->
    <div class="container mt-5">
        <h2 class="h-font text-center mb-4">Concert Highlights</h2>
        <div id="concertCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded-3">
                <div class="carousel-item active">
                    <img src="Images/carousels/Omah.jpg" class="d-block w-100" alt="Concert 1">
                </div>
                <div class="carousel-item">
                    <img src="Images/carousels/Zlatan.jpeg" class="d-block w-100" alt="Concert 2">
                </div>
                <div class="carousel-item">
                    <img src="Images/carousels/KP.jpg" class="d-block w-100" alt="Concert 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#concertCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#concertCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <br><br><br>
    <br><br><br>


  <!-- Footer -->
  <div class="container-fluid bg-dark text-white mt-5">
        <div class="row py-4">
            <div class="col-12 text-center">
                <p class="mb-0">© 2025 BOOKINBYZ Agency. All rights reserved.</p>
            </div>
        </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });
  </script>

</body>
</html>