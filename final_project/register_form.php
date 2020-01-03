<?php
session_start();
require 'config/config.php';
if( isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Find My CP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
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
        <a class="nav-link" href="profile.php" onclick="return validate();">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" onclick="return validate2();">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register_form.php" onclick="return validate3();" >Sign Up</a>
      </li>

    </ul>
  </div>
</nav>
  <div class="container">
    <div class="row">
      <h1  class="col-12 mt-4 mb-4">User Registration <i class="fas fa-sign-in-alt"></i></h1>
    </div> <!-- .row -->
  </div> <!-- .container -->
  <div class="container">
<div id = "login">

    <form action="register_confirmation.php" method="POST">
<div class="form-group row">
        <label for="fname-id" class="col-sm-3 col-form-label text-sm-right">First Name: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="fname-id" name="fname">
          <small id="fname-error" class="invalid-feedback">First name is required.</small>
        </div>
      </div> <!-- .form-group -->
<div class="form-group row">
        <label for="lname-id" class="col-sm-3 col-form-label text-sm-right">Last Name: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="lname-id" name="lname">
          <small id="lname-error" class="invalid-feedback">Last name is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="username-id" name="un">
          <small id="username-error" class="invalid-feedback">Username is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <label for="email-id" class="col-sm-3 col-form-label text-sm-right">Email: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="email-id" name="email">
          <small id="email-error" class="invalid-feedback">Email is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password-id" name="password">
          <small id="password-error" class="invalid-feedback">Password is required.</small>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <label for="confirmpassword-id" class="col-sm-3 col-form-label text-sm-right">Confirm Password: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="confirmpassword-id" name="confirmpassword">
          <small id="confirmpassword-error" class="invalid-feedback">Password does not match.</small>
        </div>
      </div>
      <div class="form-group row">
        <label for="uscid-id" class="col-sm-3 col-form-label text-sm-right">USC ID: <span class="text-danger">*</span></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="uscid-id" name="uscid">
          <small id="uscid-error" class="invalid-feedback">USC ID is required.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label text-sm-right">Enrolled Courses: <span class="text-danger"></span></label>
        <div class="col-sm-4">
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box1" type="checkbox" name="course[]" value="csci103">
          <label class="form-check-label" for="box1">CSCI 103</label>

          </div>
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box2" type="checkbox" name="course[]" value="csci104">
          <label class="form-check-label" for="box2">CSCI 104</label>

          </div>
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box3" type="checkbox" name="course[]" value="csci170">
          <label class="form-check-label" for="box3">CSCI 170</label>

          </div>
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box4" type="checkbox" name="course[]" value="csci201">
          <label class="form-check-label" for="box4">CSCI 201</label>

          </div>
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box5" type="checkbox" name="course[]" value="csci270">
          <label class="form-check-label" for="box5">CSCI 270</label>

          </div>
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box6" type="checkbox" name="course[]" value="ee109">
          <label class="form-check-label" for="box6">EE 109</label>

          </div>
          <div class="form-check form-check-inline">
          <input class="form-check-input" id ="box7" type="checkbox" name="course[]" value="itp303">
          <label class="form-check-label" for="box7">ITP 303</label>

          </div>
        </div>

      </div>
      <div class="row">
        <div class="ml-auto col-sm-9">
          <span class="text-danger font-italic">* Required</span>
        </div>
      </div> <!-- .form-group -->

      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 mt-3">
          <button type="submit" class="btn btn-primary">Register</button>
          <a href="home.php" role="button" class="btn btn-info">Cancel</a>
          <a href=# role="button" class="btn btn-info" onclick="pwg(this)" >Password Generator</a>
        </div>
      </div> <!-- .form-group -->

      <div class="row">
        <div class="col-sm-9 ml-sm-auto">
          <a href="login.php" role="button" class="btn btn-secondary">Already have an account</a>
        </div>
      </div> <!-- .row -->

    </form>
  </div>
</div><!-- .container -->
  <script>
    function generatePassword() {
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}
    function pwg(x){

      alert("Recommended Password: "+ generatePassword());
    }

    document.querySelector('form').onsubmit = function(){
       if ( document.querySelector('#fname-id').value.trim().length == 0 ) {
        document.querySelector('#fname-id').classList.add('is-invalid');
      } else {
        document.querySelector('#fname-id').classList.remove('is-invalid');
      }
       if ( document.querySelector('#lname-id').value.trim().length == 0 ) {
        document.querySelector('#lname-id').classList.add('is-invalid');
      } else {
        document.querySelector('#lname-id').classList.remove('is-invalid');
      }
      if ( document.querySelector('#username-id').value.trim().length == 0 ) {
        document.querySelector('#username-id').classList.add('is-invalid');
      } else {
        document.querySelector('#username-id').classList.remove('is-invalid');
      }

      if ( document.querySelector('#email-id').value.trim().length == 0 ) {
        document.querySelector('#email-id').classList.add('is-invalid');
      } else {
        document.querySelector('#email-id').classList.remove('is-invalid');
      }

      if ( document.querySelector('#password-id').value.trim().length == 0 ) {
        document.querySelector('#password-id').classList.add('is-invalid');
      } else {
        document.querySelector('#password-id').classList.remove('is-invalid');
      }
      if ( document.querySelector('#confirmpassword-id').value.trim().length == 0 ) {
        document.querySelector('#confirmpassword-id').classList.add('is-invalid');
      }
      else if(document.querySelector('#confirmpassword-id').value != document.querySelector('#password-id').value){
        document.querySelector('#confirmpassword-id').classList.add('is-invalid');
      }

      else {
        document.querySelector('#confirmpassword-id').classList.remove('is-invalid');
      }
      if ( document.querySelector('#uscid-id').value.trim().length == 0 ) {
        document.querySelector('#uscid-id').classList.add('is-invalid');
      } else {
        document.querySelector('#uscid-id').classList.remove('is-invalid');
      }

      // return false prevents the form from being submitted
      // If length is greater than zero, then it means validation has failed. Invert the response and can use that to prevent form from being submitted.
      return ( !document.querySelectorAll('.is-invalid').length > 0 );
    }
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
  <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer>
    <script src="https://kit.fontawesome.com/5826f004d7.js" crossorigin="anonymous"></script>
</body>
</html>
