<?php

if ( !isset($_POST['fname']) || empty($_POST['fname'])
  || !isset($_POST['lname']) || empty($_POST['lname'])
  || !isset($_POST['un']) || empty($_POST['un'])
  || !isset($_POST['email']) || empty($_POST['email'])
  || !isset($_POST['password']) || empty($_POST['password'])
  || !isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])
  || !isset($_POST['uscid']) || empty($_POST['uscid']) ) {
  $error = "Please fill out all required fields.";
}
else {
  // All required fields provided.
  require 'config/config.php';

  // Connect to the database and add this new user into the users table
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if($mysqli->connect_errno) {
    echo $mysqli->connect_error;
    exit();
  }
  if ( isset($_POST['fname']) && !empty($_POST['fname']) ) {

    $firstname = $_POST['fname'];
  } else {

    $firstname = "null";
  }
  if ( isset($_POST['lname']) && !empty($_POST['lname']) ) {

    $lastname = $_POST['lname'];
  } else {

    $lastname = "null";
  }
  if ( isset($_POST['un']) && !empty($_POST['un']) ) {

    $username = $_POST['un'];
  } else {

    $username = "null";
  }


  // Sanitize user input
  $username = $mysqli->real_escape_string($_POST['un']);
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $uscid = $_POST['uscid'];
  $tempcourse = $_POST['course'];
  if(empty($_POST["course"])){
            $course = "None.";
          }
  foreach($_POST["course"] as $coursename){

    $tempcourse. ",  ".$coursename;
  }
  $course = implode(",",$tempcourse);
  //echo $course;
  $email = $mysqli->real_escape_string($_POST['email']);
  $password = $_POST['password'];
  // Hash password
  $password = hash("sha256", $password);

  $sql_registered = "SELECT * FROM users
    WHERE username = '" . $username . "' OR email = '" . $email . "';";

  $results_registered = $mysqli->query($sql_registered);
  if(!$results_registered) {
    echo $mysqli->error;
    exit();
  }
  //$sessionun = $_SESSION['username'];
  $sessionid = $_SESSION['userid'];
  //echo $sessionun;
  //var_dump($results_registered);
  // If there is one match or more, that means a user with this username or email already exists, so display an error.
  if( $results_registered->num_rows > 0 ) {
    $error = "Username or email has been already taken. Please choose another one.";
  }
  else {
    // Otherwise, insert this user into the users table.
    $sql= "UPDATE users
          SET firstname = '" . $firstname . "',
          lastname = '" . $lastname ."',
          uscid = '" . $uscid ."',
          username = '" . $username."',
          password = '" . $password ."',
          email = '" . $email."',
          course = '" . $course ."'

          WHERE id = '" . $sessionid . "';";
    //echo $sql;

    $_SESSION['username'] = $username;
    $_SESSION['course'] = $course;

    $results = $mysqli->query($sql);
    if (!$results) {
      echo $mysqli->error;
    }
  }
  $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Confirmation | Find My CP</title>
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
      <h1 class="col-12 mt-4">Update Confirmation</h1>
    </div> <!-- .row -->
  </div> <!-- .container -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-12">

    <?php if ( isset($error) && !empty($error) ) : ?>

    <div class="text-danger">
      <?php echo $error; ?>
    </div>

  <?php else : ?>

    <div class="text-success">
      <span class="font-italic"><?php echo $_POST['un']; ?></span> was successfully edited.
    </div>

  <?php endif; ?>

      </div> <!-- .col -->
    </div> <!-- .row -->
<div class="row mt-4 mb-4">
    <div class="col-12">
      <a href="home.php" role="button" class="btn btn-success">Home</a>
      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-secondary">Back</a>
    </div> <!-- .col -->
  </div> <!-- .row -->

  </div>
  <hr>
  <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer> <!-- .container -->
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
</body>
</html>
