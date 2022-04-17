<?php
require('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>KMD University - Think High, Aim Big, Get Knowledge</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

<body>
        <div class="bg-top navbar-light">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center align-items-stretch">
                    <div class="col-md-4 d-flex align-items-center py-4">
                        <a class="navbar-brand" href="Home.php">KMD <span>University</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container d-flex align-items-center px-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav mr-auto align-center">

                 <?php if (isset($_SESSION['guest'])): ?>
                     <li class="nav-item"><a href="guestview.php" class="nav-link">Home</a></li>
                 <?php else:?>

                            <li class="nav-item active"><a href="Home.php" class="nav-link pl-0">Home</a></li>
                        <?php endif; ?>
                            <li class="nav-item"><a href="About.php" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="Magazines.php" class="nav-link">Magazines</a></li>
                              

                            <?php 
                            
                            if(isset($_SESSION['student_id'])){
                           ?>

                            <li class="nav-item"><a href="StudentProfile.php" class="nav-link">Your Account</a></li>
                            <li class="nav-item"><a href="Logout.php" class="nav-link">Log Out</a></li>
                            <li class="nav-item"><a href="MyArticle.php?StudentGUID=<?php echo $_SESSION['StudentGUID']?>" class="nav-link">My Contribution</a></li>
                             <li class="nav-item"><a href="ArticleUpload.php" class="nav-link">Article Upload</a></li>

                       <?php } else{ ?>
 <li class="nav-item"><a href="StudentRegistration.php" class="nav-link">Register</a></li>

 <?php } ?>

 <?php if (isset($_SESSION['guest'])): ?>
     <li class="nav-item"><a href="logoutguest.php" class="nav-link">Log out Guest</a></li>
 <?php endif ?>


                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </body>
    </html>