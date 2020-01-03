<?php

session_start();



if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
  header('Location: home.php');
}

else {

  require 'config/config.php';
  // DB Connection
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if ( $mysqli->connect_errno ) {
    echo $mysqli->connect_error;
    exit();
  }
  $tempusername = $_SESSION['username'];
  $mysqli->set_charset('utf8');
  $sql = "DELETE FROM users
          WHERE id = " . $_SESSION['userid'] . ";";
  // echo "<hr>" . $sql . "<hr>";
  $results = $mysqli->query($sql);
  if ( !$results ) {
    echo $mysqli->error;
    exit();
  }
  session_destroy();
  $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opt Out | Find My CP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<style>
   body{
font-family: 'Roboto Mono', monospace;
  }
  </style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" >
  <a id = "logo" class="navbar-brand" style="width:13%;"href="home.php"><img src = "image/logo.jpg" width="50" height="50" class="d-inline-block" alt="">Find My CP</a>
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
        <a class="nav-link" href="login.php">Login</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="register_form.php" >Sign Up</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container">
    <div class="row">
      <h1 class="col-12 mt-4">Opt Out</h1>
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

          <div class="text-success"><span class="font-italic">User "<?php echo $tempusername; ?>"</span> was successfully deleted.</div>

        <?php endif; ?>

      </div> <!-- .col -->
    </div> <!-- .row -->
    <div class="row mt-4 mb-4">
      <div class="col-12">
        <a href="home.php?" role="button" class="btn btn-success">Back to Home Page</a>
      </div> <!-- .col -->
    </div> <!-- .row -->
  </div>
  <hr>
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
    </script>
</body>
</html>
