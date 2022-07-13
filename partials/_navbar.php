<?php 
  session_start();
  echo '<nav class="navbar px-4 py-3 navbar-expand-lg bg-dark">
  <div class="container-fluid navText bg-dark">
    <a class="navbar-brand navText" href="index.php">Do Not Dear</a>
    <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-4 me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-4">
          <a class="nav-link active navText" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link active navText" aria-current="page" href="doctors.php">People Who Care</a>
        </li>
      </ul>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
      {
        echo '<h4>Welcome '. $_SESSION['userEmail'].'</h4>
        <a href="partials/_logout.php" class="btn btn-outline-danger mx-2" type="submit">Log Out</a>';
      }
      else
      {
        echo '<button class="btn btn-outline-primary mx-2" type="submit" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-danger mx-2" type="submit" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
      }
      echo '</div>
  </div>
  </div>
</nav>';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true")
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> You have been successfully signed up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>