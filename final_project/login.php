<?php
require 'config/config.php';
if( isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
else{
    // If user attempted to log in (aka submitted the form)
  if( isset($_POST['username']) && isset($_POST['password']) ){

    if( empty($_POST['username']) || empty($_POST['password']) ) {
      $error = "Please enter a username and password ";
    }
    // Authenticate the user.
    else {
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
      }
      $temp=false;
      $usernameInput = $_POST["username"];
      $passwordInput = $_POST["password"];
      // Hash user input of password to compare this string to the password stored in the users table
      $passwordInput = hash("sha256", $passwordInput);
      // Look for a match - username/password combinmation
      $sql = "SELECT * FROM users
        WHERE username = '" . $usernameInput . "' AND password = '" . $passwordInput . "';";

      $results = $mysqli->query($sql);
      $row = $results->fetch_assoc();
      $_SESSION['userid'] = $row['id'];
      $_SESSION['course'] = $row['course'];

      if(!$results) {
        echo $mysqli->error;
        exit();
      }
      // If there is a match, we will get at least one result back
      if( $results->num_rows > 0) {
        // Log them in!
        $_SESSION['logged_in'] = true;
        $temp = true;
        $_SESSION['username'] = $_POST['username'];
        header('Location: home.php');
      }
      else {
        $error = "Invalid username or password";
      }
      $mysqli->close();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Find My CP</title>
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
  </style>
</head>

<body>
 <nav class="navbar navbar-expand-lg navbar-light" >
  <a id = "logo" class="navbar-brand" style="width:13%;" href="home.php"><img src = "image/logo.jpg" width="50" height="50" class="d-inline-block" alt="">Find My CP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
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
        <a class="nav-link"  href="register_form.php" onclick = "return validate3();">Sign Up</a>
      </li>
    </ul>
  </div>

</nav>
  <div class="container">
    <div class="row">
      <h1 class="col-12 mt-4 mb-4">Login <i class="fas fa-sign-in-alt"></i>
    </h1>
    </div> <!-- .row -->
  </div> <!-- .container -->

  <div class="container">

    <form action="login.php" method="POST">

      <div class="row mb-3">

      </div> <!-- .row -->

  <div id = "login">
        <div class="font-italic text-danger col-sm-9 ml-sm-auto">
          <!-- Show errors here. -->
          <?php
            if ( isset($error) && !empty($error) ) {
              echo $error;
            }
          ?>
        </div>

      <div class="form-group row">

        <label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="username-id" name="username">
          <small id="username-error" class="invalid-feedback">Username is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password-id" name="password">
          <small id="password-error" class="invalid-feedback">Password is required.</small>
        </div>
      </div> <!-- .form-group -->

<div class="row">
        <div class="ml-auto col-sm-9">
          <span class="text-danger font-italic">* Required</span>
        </div>


      </div>
      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 mt-2">
          <button type="submit" class="btn btn-success">Login</button>
          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-info">Cancel</a>
        </div>
      </div>
         <!-- .form-group -->


    <div class="row">
      <div class="col-sm-9 ml-sm-auto">
         <a href="register_form.php" role="button" class="btn btn-secondary">Create an account</a>
      </div>
    </div>
      </div> <!-- .row -->
       </form>
</div>

  <hr><!-- .container -->
  <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer>

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
