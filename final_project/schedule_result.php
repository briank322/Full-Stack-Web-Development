<?php
session_start();

require 'config/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}
$name = $_GET["name"];

$day = $_GET["day"];
$location = $_GET["location"];
$course = $_GET["course"];
//echo "'$day'";
$mysqli->set_charset('utf8');
$sql = "SELECT instructors.instructor_name AS name,  officehours.oh_day AS day, courses.course_name AS course, instructors.oh_time AS time, locations.name AS location
        FROM instructors
        Join courses
          on courses.id = instructors.course_id
        Join officehours
          on officehours.id = instructors.oh_id
        Join locations
          on locations.id = instructors.location_id
        WHERE 1 = 1";

if ( isset($_GET['name']) && !empty($_GET['name']) ) {
  $sql = $sql . " AND instructors.instructor_name = " . "'$name'";
}
if ( isset($_GET['day']) && !empty($_GET['day']) ) {
  $sql = $sql . " AND officehours.oh_day = " . "'$day'";
}
if ( isset($_GET['course']) && !empty($_GET['course']) ) {
  $sql = $sql . " AND courses.course_name = " . "'$course'";
}
if ( isset($_GET['location']) && !empty($_GET['location']) ) {
  $sql = $sql . " AND locations.name =  ". "'$location'";
}
$sql = $sql . ";";
//echo $sql;
//echo "<hr>";
$results = $mysqli->query($sql);
if ( $results == false ) {
  echo $mysqli->error;
  exit();
}
$mysqli->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Schedule | Find My CP</title>
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
      <?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
      <h1 class="col-md-4" style="padding-top:3%;">Welcome <?php echo $_SESSION['username']?></h1>
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
        <div class="col-12">
        <table class="table table-striped table-responsive mt-4">
          <thead>
            <tr>
              <th>Name</th>
              <th>Course</th>
              <th>Day</th>
              <th>time</th>
              <th>Location</th>
            </tr>
          </thead>
          <tbody>
           <?php while ( $row = $results->fetch_assoc() ) : ?>
            <tr>

    <td>

        <?php echo $row['name']; ?>

    </td>
        <td><?php echo $row['course']; ?></td>

    <td><?php echo $row['day']; ?></td>
<td><?php echo $row['time']; ?></td>
    <td><?php echo $row['location']; ?></td>
  </tr>
<?php endwhile; ?>

          </tbody>
        </table>
      </div> <!-- .col -->









        <div class="col-sm-3"></div>
        <div class="col-sm-9 mt-2">
          <a href = "schedule.php" role="button" class="btn btn-success">Back</a>
        </div>
      </div> <!-- .form-group -->


  <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer>
   <!-- .container -->
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
<script src="https://kit.fontawesome.com/5826f004d7.js" crossorigin="anonymous"></script>
</body>
</html>

