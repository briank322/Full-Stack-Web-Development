<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Schedule | Find My CP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
  body{
    font-family: 'Roboto Mono', monospace;
  }
  #searchform{
    border-style: dashed;
    padding:3%;
    background-color:#c8d5b9;
  }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" >
  <a id = "logo" class="navbar-brand" href="home.php" style="width:13%;"><img src = "image/logo.jpg" width="50" height="50" class="d-inline-block" alt="">Find My CP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="course.php">Course <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schedule.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php" onclick = "return validate();">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" onclick = "return validate2();">Login</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="register_form.php" onclick = "return validate3();">Sign Up</a>
      </li>

    </ul>
    <div style = "margin-left:36%" id= "status" class ="d-flex justify-content-center" >

      <?php if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) : ?>


      <?php else : ?>

        <!-- 30. Get username from session  -->
        <div class="p-2">Welcome <?php echo $_SESSION['username']; ?>:)</div>

        <a style = "border-style: dashed; width: 100px;"class="p-2 " href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>

      <?php endif; ?>

    </div>
</div>
</nav>
  <div class="container">

    <div class="row">
      <?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
      <h1 class="col-md-5" style="padding-top:3%;">Welcome <?php echo $_SESSION['username']?></h1>
    <h1 class = "col-md-6"style="padding-top:3%; "><a href = "profile.php"><i class="far fa-user-circle" style="font-size: 48px;"></i></a></h1>
    <?php endif; ?>
    </div> <!-- .row -->

  </div>
  <div class="container">
    <?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
    <h4>You are currently enrolled in <?php echo $_SESSION['course'];?>.</h4>
     <?php else : ?>
      <h3 class="col-md-4" style="padding-top:3%;">Hello Guestuser!</h3>
    <?php endif; ?>
  </div>

  <div class = "container">

    <table class="table table-responsive">
  <thead>

  </thead>
  <tbody>
    <tr>
      <th scope="row" >Location</th>
      <th scope="row" >SAL Lobby</th>
      <th scope="row" >VHE 205</th>
      <th scope="row" >OHE 542</th>
      <th scope="row" >OHE 530</th>
      <th scope="row" >LVL 201E</th>
      <th scope="row" >KAP 160</th>


    </tr>
    <tr>
      <th scope="row" >Color</th>
      <th class="table-primary"> </th>
      <th class="table-success"> </th>
      <th class="table-danger"></th>
      <th class="table-warning"></th>
      <th class="table-info"></th>
      <th class="table-secondary"></th>
    </tr>

  </tbody>
</table>
<div class ="container">

  <h4>Click the course button below to see the office hours</h4>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample1"  aria-expanded="true" aria-controls="multiCollapseExample1">CSCI 103</a>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample2"  aria-expanded="true" aria-controls="multiCollapseExample2">CSCI 104</a>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample3"  aria-expanded="true" aria-controls="multiCollapseExample3">CSCI 170</a>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample4"  aria-expanded="true" aria-controls="multiCollapseExample4">CSCI 201</a>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample5"  aria-expanded="true" aria-controls="multiCollapseExample5">CSCI 270</a>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample6"  aria-expanded="true" aria-controls="multiCollapseExample6">EE 109</a>
  <a role="button" class="btn btn-outline-success" data-toggle="collapse" href="#multiCollapseExample7"  aria-expanded="true" aria-controls="multiCollapseExample7">ITP 303</a>

<hr>
  </div>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">

        <h5> CSCI 103 Number of CPs in Office Hours</h5>
        <img src = "image/103.jpg" class="img-fluid" style = "width: 500px;" alt="csci103.jpg">
        <hr>
      </div>

  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">

        <h5> CSCI 104 Number of CPs in Office Hours</h5>
        <img src = "image/104.jpg" class="img-fluid" style = "width: 500px;" alt="csci104.jpg"><hr>

    </div>
  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample3">

        <h5> CSCI 170 Office Hours</h5>
        <img src = "image/170.jpg" class="img-fluid" style = "width: 500px;" alt="csci170.jpg"><hr>

    </div>
  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample4">

        <h5> CSCI 201 Office Hours</h5>
        <img src = "image/201.jpg"  class="img-fluid" style = "width: 500px;" alt="csci201.jpg"><hr>

    </div>
  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample5">

        <h5> CSCI 270 Office Hours</h5>
        <img src = "image/270.jpg" class="img-fluid"  style = "width: 500px;" alt="csci270.jpg"><hr>

    </div>
  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample6">

        <h5> EE 109 Office Hours</h5>
        <img src = "image/109.jpg" class="img-fluid" style = "width: 500px;" alt="EE109.jpg"><hr>

    </div>
  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample7">

        <h5> ITP 303 Office Hours</h5>
        <img src = "image/303.jpg" class="img-fluid" style = "width: 500px;" alt="itp303.jpg"><hr>

    </div>
  </div>
</div>
  </div> <!-- .container -->
<div class="container">
    <div class="row">
      <h2 class="col-12 mt-4 mb-4">Search Course Producer / TA</h2>
    </div> <!-- .row -->

<div id = "searchform" class="container">
    <form action="schedule_result.php" method="GET">
      <div class="form-group row">
        <label for="name-id" class="col-sm-3 col-form-label text-sm-right"><strong>CP/TA's first name: </strong></label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="name-id" name="name">
        </div>
      </div> <!-- .form-group -->
      <div class="form-group row">
        <label for="day-id" class="col-sm-3 col-form-label text-sm-right"><strong>Day: </strong></label>
        <div class="col-sm-6">
          <select name="day" id="day-id" class="form-control">
            <option value="" selected>-- All --</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday" >Tuesday</option>
            <option value="Wednesday" >Wednesday</option>
            <option value="Thursday" >Thursday</option>
            <option value="Friday" >Friday</option>
            <option value="Saturday" >Saturday</option>

            <!-- Genre dropdown options here -->
            <!--Alternate Syntax. Seperates out PHP and HTML so it's cleaner -->


          </select>
        </div>
      </div> <!-- .form-group -->
      <div class="form-group row">
        <label for="course-id" class="col-sm-3 col-form-label text-sm-right"><strong>Course: </strong></label>
        <div class="col-sm-6">
          <select name="course" id="course-id" class="form-control">
            <option value="" selected>-- All --</option>
            <option value="CSCI 103" >CSCI 103</option>
            <option value="CSCI 104" >CSCI 104</option>
            <option value="CSCI 170" >CSCI 170</option>
            <option value="CSCI 201" >CSCI 201</option>
            <option value="CSCI 270" >CSCI 270</option>
            <option value="EE 109" >EE 109</option>
            <option value="ITP 303" >ITP 303</option>

          </select>
        </div>
      </div> <!-- .form-group -->
      <div class="form-group row">
        <label for="location-id" class="col-sm-3 col-form-label text-sm-right"><strong>Location: </strong></label>
        <div class="col-sm-6">
          <select name="location" id="location-id" class="form-control">
            <option value="" selected>-- All --</option>

            <option value="SAL Lobby" >SAL Lobby</option>
            <option value="VHE 205" >VHE 205</option>
            <option value="OHE 542" >OHE 542</option>
            <option value="OHE 530" >OHE 530</option>
            <option value="LVL 201E" >LVL 201E</option>
            <option value="KAP 160" >KAP 160</option>


          </select>
        </div>
      </div> <!-- .form-group -->




      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 mt-2">
          <button type="submit" class="btn btn-success">Search</button>
          <button type="reset" class="btn btn-info">Reset</button>
        </div>
      </div> <!-- .form-group -->
    </form>
  </div>
</div>
<script>
  function validate(){
  <?php if ( isset($_SESSION['logged_in']) || $_SESSION['logged_in'] ) : ?>


      <?php else : ?>

        alert("Login first to see the user profile!");

      <?php endif; ?>

}
function validate2(){
  <?php if ( isset($_SESSION['logged_in']) || $_SESSION['logged_in'] ) : ?>
      alert ("You are already logged in!");

      <?php else : ?>



      <?php endif; ?>
}
function validate3(){
  <?php if ( isset($_SESSION['logged_in']) || $_SESSION['logged_in'] ) : ?>
      alert ("Log out first to sign in!");

      <?php else : ?>



      <?php endif; ?>
}
  </script>
   <!-- .container -->
<script src="https://kit.fontawesome.com/5826f004d7.js" crossorigin="anonymous"></script>
<footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer>
</body>
</html>
