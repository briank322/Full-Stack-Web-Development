<?php

require 'config/config.php';

if( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {

  header('Location: login.php');
}
else{
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
      }
  //$mysqli->set_charset('utf8');
  //echo $_SESSION['username'];
  // $sql = "SELECT * FROM users
  //         WHERE username = ".$_SESSION["username"].";";
  $sql = "SELECT * FROM users WHERE username = '". $_SESSION['username'] ."'";
  $results = $mysqli->query($sql);
  $row = $results->fetch_assoc();
  if ( !$results ) {
    echo $mysqli->error;
    exit();
  }
  // Since we only get 1 result (searching by primary key), we don't need a loop.

  $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile | Find My CP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  body{
    font-family: 'Roboto Mono', monospace;
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

      <h1 class = "col-md-6" style="padding-top:3%; "><?php echo $_SESSION['username']?>'s Profile <a href = "profile.php"><i class="far fa-user-circle" style="font-size: 48px;"></i></a></h1>
    </div> <!-- .row -->
  </div> <!-- .container -->

  <div class="container">
    <table class="table table-striped">
  <thead>

  </thead>
  <tbody>
    <tr>
      <th scope="row">First name</th>
      <td><?php echo $row['firstname']; ?></td>
    </tr>
    <tr>
      <th scope="row">Last name</th>
      <td><?php echo $row['lastname']; ?></td>
    </tr>
    <tr>
      <th scope="row">Username</th>
      <td><?php echo $row['username']; ?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td>********</td>
    </tr>
    <tr>
      <th scope="row">USCID</th>
      <td><?php echo $row['uscid']; ?></td>
    </tr>
    <tr>
      <th scope="row">Enrolled Courses</th>
      <td><?php echo $row['course']; ?></td>
    </tr>
  </tbody>
</table>
<div class="form-group row">

        <div class="col-sm-9 mt-2">

<a href ="home.php" role = "button" class="btn btn-secondary">Back</a>
          <a href ="updateprofile.php" role ="button" class="btn btn-success">Update Information</a>
          <a href ="optout.php" role="button" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete an account?')">Delete</a>

        </div>
      </div> <!-- .form-group -->



  </div>
  <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer><!-- .container -->

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
  document.querySelector('form').onsubmit = function(){
      if ( document.querySelector('#username-id').value.trim().length == 0 ) {
        document.querySelector('#username-id').classList.add('is-invalid');
      } else {
        document.querySelector('#username-id').classList.remove('is-invalid');
      }

      if ( document.querySelector('#password-id').value.trim().length == 0 ) {
        document.querySelector('#password-id').classList.add('is-invalid');
      } else {
        document.querySelector('#password-id').classList.remove('is-invalid');
      }


      // return false prevents the form from being submitted
      // If length is greater than zero, then it means validation has failed. Invert the response and can use that to prevent form from being submitted.
      return ( !document.querySelectorAll('.is-invalid').length > 0 );
    }
  </script>
  <script src="https://kit.fontawesome.com/5826f004d7.js" crossorigin="anonymous"></script>
  </body>
</html>
