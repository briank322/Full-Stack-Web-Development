<?php
session_start();


//$_SESSION["firstName"] = $_POST["firstName"];
require 'config/config.php';

  // Connect to the database and add this new user into the users table
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if ( $mysqli->connect_errno ) {
    echo $mysqli->connect_error;
    exit();
  }

  $mysqli->close();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>Home | Find My CP</title>
  <style>
  body{
font-family: 'Roboto Mono', monospace;
  }
  #table1{
    width:100%;
  }
@media (min-width: 768px)
{
  #table1{
    width:740px;
  }
}
@media (min-width: 992px)
{
  #table1{
    width:992px;
  }
}
@media (min-width: 1000px)
{
  #table1{
    width:1000px;
  }
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
<br>
<div class = "container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="mb-3">Welcome Trojan Programmers! <i class="fas fa-laptop-code"></i>
</h3>
        <hr>

<h4>Daily Trojan: Today's Top Headline News</h4>
<div class="container" id = "news" style="padding-top:2%;font-size: 28px; font-style: italic; color:gray;text-align: center;">
    <span><span id="topnews"></span></span>
</div>

<hr>
        <h5>General Course Information: Course name, Instructor, Classroom</h5>


        <ul>
       <li><a href="https://classes.usc.edu/term-20201/classes/">Class Offered in 2020 Spring</a></li>
       <li><a href="https://myviterbi.usc.edu">USC MyViterbi</a></li>
       <li><a href="https://www.cs.usc.edu/">USC Computer Science Department</a></li>
       <li><a href="https://my.usc.edu">My USC edu</a></li>
     </ul>
     <hr>
      <h5>USC Spring 2020 Important Dates</h5>


    <ul><li>
      Spring Semester 2020 Academic Calendar</li></ul>
      <table class="table table-striped">
<thead>
    <tr>
      <th scope="col">Event</th>
      <th scope="col">Day</th>
      <th scope="col">Date</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Open Registration</th>
      <td>Thu-Fri</td>
      <td>January 9-10</td>
    </tr>
    <tr>
      <th scope="row">Classes Begin</th>
      <td>Monday</td>
      <td>January 13</td>
    </tr>
    <tr>
      <th scope="row">Martin Luther King’s Birthday</th>
      <td>Monday</td>
      <td>January 20</td>
    </tr>
    <tr>
      <th scope="row">President’s Day</th>
      <td>Monday</td>
      <td>February 17</td>
    </tr>
    <tr>
      <th scope="row">Spring Recess</th>
      <td>Sun-Sun</td>
      <td>March 15-22</td>
    </tr>
    <tr>
      <th scope="row">Classes End</th>
      <td>Friday</td>
      <td>May 1</td>
    </tr>
    <tr>
      <th scope="row">Study Days</th>
      <td>Sat-Tue</td>
      <td>May 2-5</td>
    </tr>
    <tr>
      <th scope="row">Exams</th>
      <td>Wed-Wed</td>
      <td>May 6-13</td>
    </tr>
    <tr>
      <th scope="row">Commencement</th>
      <td>Friday</td>
      <td>May 15</td>
    </tr>
  </tbody>
</table>
<hr>
<h5>Click the button to check course schedules</h5>
        </div>
        <div class = "container">

<p>
  <a class="btn btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">CSCI 103</a>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">CSCI 104</button>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">CSCI 170</button>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample3">CSCI 201</button>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample3">CSCI 270</button>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample6" aria-expanded="false" aria-controls="multiCollapseExample3">EE 109</button>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample7" aria-expanded="false" aria-controls="multiCollapseExample3">ITP 303</button>
  <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2 multiCollapseExample3 multiCollapseExample4 multiCollapseExample5 multiCollapseExample6 multiCollapseExample7">All Schedule</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1" >

         <table id = "table1" class="table table-striped table-responsive" >
              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29966D</td>
          <td>Andrew Goodney</td>
          <td>Lecture</td>
          <td>10:00 ~ 11:20 AM</td>
          <td>Mon, Wed</td>
          <td>WPH B27</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs103/syllabus/';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29984D</td>
          <td>Sandra Batista</td>
          <td>Lecture</td>
          <td>9:30 ~ 10:50 AM</td>
          <td>Tue, Thu</td>
          <td>THH 210</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs103/syllabus/';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>30075D</td>
          <td>Jyotirmoy Deshmukh </td>
          <td>Lecture</td>
          <td>3:30 ~ 6:50 PM</td>
          <td>Tuesday</td>
          <td>SLH 100</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs103/syllabus/';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29902D</td>
          <td>Andrew Goodney</td>
          <td>Lecture</td>
          <td>11:00 ~ 12:20 PM</td>
          <td>Tue, Thu</td>
          <td>ZHS 352</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs103/syllabus/';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29906D</td>
          <td>Andrew Goodney</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM</td>
          <td>Tue, Thu</td>
          <td>LVL 17</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs103/syllabus/';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29903R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Friday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29904R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Friday</td>
          <td>SAL 127</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">CSCI 103</th>
          <td>30054R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:00 ~ 6:50 PM</td>
          <td>Friday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">CSCI 103</th>
          <td>30055R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>10:00 ~ 11:50 AM</td>
          <td>Friday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">CSCI 103</th>
          <td>30120R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>4:00 ~ 5:50 PM</td>
          <td>Friday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>30121R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:00 ~ 6:50 PM</td>
          <td>Friday</td>
          <td>SAL 127</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>30296R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:00 ~ 6:50 PM</td>
          <td>Friday</td>
          <td>SAL 127</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>30374R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Friday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 103</th>
          <td>29900R</td>
          <td></td>
          <td>Quiz</td>
          <td>7:00 ~ 8:50 PM</td>
          <td>Thursday</td>
          <td>TBA</td>
          <td></td>
        </tr>
          </tbody>
        </table>

    </div>
  </div>
</div>
<div class = "row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">

        <table class="table table-striped table-responsive" >
              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>29968R</td>
          <td>Mark Redekopp</td>
          <td>Lecture</td>
          <td>10:00 ~ 11:50 AM</td>
          <td>Mon, Wed</td>
          <td>SOS B2</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs104/syllabus.html';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>29005R</td>
          <td>Sandra Batista</td>
          <td>Lecture</td>
          <td>11:00 ~ 12:20 PM</td>
          <td>Tue, Thu</td>
          <td>LVL 17</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs104/syllabus.html';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>29989R</td>
          <td>Mark Redekopp</td>
          <td>Lecture</td>
          <td>9:30 ~ 10:50 AM</td>
          <td>Tue, Thu</td>
          <td>SOS B46</td>
         <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs104/syllabus.html';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30397R</td>
          <td>Sandra Batista</td>
          <td>Lecture</td>
          <td>3:30 ~ 4:50 PM</td>
          <td>Tue, Thu</td>
          <td>SOS B4</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs104/syllabus.html';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30399R</td>
          <td>Sandra Batista</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM</td>
          <td>Tue, Thu</td>
          <td>THH 210</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://bytes.usc.edu/cs104/syllabus.html';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>29912R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:00 ~ 6:50 PM</td>
          <td>Wednesday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>29914R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>3:00 ~ 4:50 PM</td>
          <td>Wednesday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>29915R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Wednesday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30167R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Friday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30200R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>3:30 ~ 5:20 PM</td>
          <td>Tuesday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30238R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:30 ~ 7:20 PM</td>
          <td>Tuesday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30286R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Wednesday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30293R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Friday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30294R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>1:00 ~ 2:50 PM</td>
          <td>Tuesday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">CSCI 104</th>
          <td>30379R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Thursday</td>
          <td>SAL 127</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 104</th>
          <td>30394R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Wednesday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>

        <tr>
          <th scope="row">CSCI 104</th>
          <td>29972R</td>
          <td></td>
          <td>Quiz</td>
          <td>7:00 ~ 8:50 PM</td>
          <td>Thursday</td>
          <td>TBA</td>
          <td></td>
        </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample3" >

         <table class="table table-striped table-responsive" >

              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">CSCI 170</th>
          <td>29954R</td>
          <td>Aaron Cote</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM</td>
          <td>Tue, Thu</td>
          <td>SOS B2</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20191/29955.pdf';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 170</th>
          <td>30008R</td>
          <td>Aaron Cote</td>
          <td>Lecture</td>
          <td>10:00 ~ 11:20 AM</td>
          <td>Mon, Wed</td>
          <td>THH 210</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20191/29955.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">CSCI 170</th>
          <td>30111R</td>
          <td>Aaron Cote</td>
          <td>Lecture</td>
          <td>11:00 ~ 12:20 PM</td>
          <td>Tue, Thu</td>
          <td>ZHS 252</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20191/29955.pdf';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 170</th>
          <td>30115R</td>
          <td>Aaron Cote</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM</td>
          <td>Mon, Wed</td>
          <td>LVL 17</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20191/29955.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">CSCI 170</th>
          <td>30116R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Friday</td>
          <td>SLH 102</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 170</th>
          <td>30349R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>4:00 ~ 5:50 PM</td>
          <td>Friday</td>
          <td>SLH 102</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 170</th>
          <td>30373R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>10:00 ~ 11:50 AM</td>
          <td>Friday</td>
          <td>SLH 102</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 170</th>
          <td>30377R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Friday</td>
          <td>SLH 102</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 170</th>
          <td>30343R</td>
          <td></td>
          <td>Quiz</td>
          <td>TBA</td>
          <td>Thursday</td>
          <td>TBA</td>
          <td></td>
        </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample4" >

         <table class="table table-striped table-responsive" >

              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">CSCI 201</th>
          <td>29959R</td>
          <td>Olivera Grujic</td>
          <td>Lecture</td>
          <td>10:00 ~ 11:50 AM</td>
          <td>Mon, Wed</td>
          <td>GFS 116</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://www-scf.usc.edu/~csci201/syllabus.pdf';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>29960R</td>
          <td>Olivera Grujic</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Mon, Wed</td>
          <td>MHP 101</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://www-scf.usc.edu/~csci201/syllabus.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">CSCI 201</th>
          <td>29961R</td>
          <td>Olivera Grujic</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Tue, Thu</td>
          <td>SOS B46</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://www-scf.usc.edu/~csci201/syllabus.pdf';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>30393R</td>
          <td>Olivera Grujic</td>
          <td>Lecture</td>
          <td>11:00 ~ 12:20 PM</td>
          <td>Tue, Thu</td>
          <td>THH 116</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'http://www-scf.usc.edu/~csci201/syllabus.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">CSCI 201</th>
          <td>29929R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>3:30 ~ 5:20 PM</td>
          <td>Tuesday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">CSCI 201</th>
          <td>29930R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>10:00 ~ 11:50 AM</td>
          <td>Wednesday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>29931R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:30 ~ 7:20 PM</td>
          <td>Tuesday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>30039R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Monday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>30040R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>3:00 ~ 4:50 PM</td>
          <td>Thursday</td>
          <td>SAL 109</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>30110R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>8:00 ~ 9:50 AM</td>
          <td>Wednesday</td>
          <td>SAL 126</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>30380R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Wednesday</td>
          <td>SAL 127</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 201</th>
          <td>29981R</td>
          <td></td>
          <td>Quiz</td>
          <td>7:00 ~ 8:50 PM</td>
          <td>Thursday</td>
          <td>TBA</td>
          <td></td>
        </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

          <div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample5" >

         <table class="table table-striped table-responsive" >

              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">CSCI 270</th>
          <td>29956D</td>
          <td>Shahriar Shamsian</td>
          <td>Lecture</td>
          <td>4:30 ~ 5:50 PM </td>
          <td>Mon, Wed</td>
          <td>MHP 101</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20183/29960.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">CSCI 270</th>
          <td>29957D</td>
          <td>Shahriar Shamsian</td>
          <td>Lecture</td>
          <td>6:00 ~ 7:30 PM </td>
          <td>Mon, Wed</td>
          <td>MHP 101</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20183/29960.pdf';">Syllabus</button></td>
        </tr>
          <tr>
          <th scope="row">CSCI 270</th>
          <td>29958D</td>
          <td>Shahriar Shamsian</td>
          <td>Lecture</td>
          <td>3:30 ~ 5:00 PM </td>
          <td>Tue, Thu</td>
          <td>THH 210</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20183/29960.pdf';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">CSCI 270</th>
          <td>30231D</td>
          <td>Shahriar Shamsian</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM </td>
          <td>Tue, Thu</td>
          <td>GFS 101</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20183/29960.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">CSCI 270</th>
          <td>30267R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>10:00 ~ 11:50 AM</td>
          <td>Friday</td>
          <td>SLH 100</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">CSCI 270</th>
          <td>30268R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>12:00 ~ 1:50 PM</td>
          <td>Friday</td>
          <td>ZHS 159</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 270</th>
          <td>30269R</td>
          <td>TA</td>
          <td>Discussion</td>
          <td>2:00 ~ 3:50 PM</td>
          <td>Friday</td>
          <td>ZHS 159</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">CSCI 270</th>
          <td>30224R</td>
          <td></td>
          <td>Quiz</td>
          <td>7:00 ~ 8:50 PM</td>
          <td>Friday</td>
          <td>TBA</td>
          <td></td>
        </tr>


          </tbody>
        </table>
      </div>
    </div>
  </div>

 <div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample6" >

         <table class="table table-striped table-responsive" >

              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">EE 109</th>
          <td>30999R</td>
          <td>Murali Annavaram</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM </td>
          <td>Tue, Thu</td>
          <td>VHE 205</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://bytes.usc.edu/files/ee109/documents/EE109_Syllabus.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">EE 109</th>
          <td>31019R</td>
          <td>Mark Redekopp</td>
          <td>Lecture</td>
          <td>2:00 ~ 3:20 PM </td>
          <td>Tue, Thu</td>
          <td>ZHS 163</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://bytes.usc.edu/files/ee109/documents/EE109_Syllabus.pdf';">Syllabus</button></td>
        </tr>
          <tr>
          <th scope="row">EE 109</th>
          <td>31291R</td>
          <td></td>
          <td>Lecture</td>
          <td>12:30 ~ 1:50 PM </td>
          <td>Tue, Thu</td>
          <td>LVL 17</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://bytes.usc.edu/files/ee109/documents/EE109_Syllabus.pdf';">Syllabus</button></td>
        </tr>
        <tr>
          <th scope="row">EE 109</th>
          <td>31395R</td>
          <td>Mark Redekopp</td>
          <td>Lecture</td>
          <td>11:00 ~ 12:20 PM </td>
          <td>Tue, Thu</td>
          <td>ZHS 163</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://bytes.usc.edu/files/ee109/documents/EE109_Syllabus.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">EE 109</th>
          <td>30784R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>5:00 ~ 6:20 PM </td>
          <td>Wednesday</td>
          <td>VHE 205</td>
          <td></td>
        </tr>
         <tr>
          <th scope="row">EE 109</th>
          <td>30799R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>12:30 ~ 1:50 PM </td>
          <td>Wednesday</td>
          <td>VHE 205</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">EE 109</th>
          <td>31018R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>11:00 ~ 12:20 PM </td>
          <td>Friday</td>
          <td>VHE 205</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">EE 109</th>
          <td>31292R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>3:30 ~ 4:50 PM </td>
          <td>Wednesday</td>
          <td>VHE 205</td>
          <td></td>
        </tr>

        <tr>
          <th scope="row">EE 109</th>
          <td>31396R</td>
          <td>TA</td>
          <td>Lab</td>
          <td>2:00 ~ 3:20 PM </td>
          <td>Wednesday</td>
          <td>VHE 205</td>
          <td></td>
        </tr>
          <tr>
          <th scope="row">EE 109</th>
          <td>31292R</td>
          <td></td>
          <td>Quiz</td>
          <td>7:00 ~ 8:50 PM </td>
          <td>Wednesday</td>
          <td></td>
          <td></td>
        </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample7" >

         <table class="table table-striped table-responsive" >

              <thead>
        <tr>
          <th scope="col">Course</th>
          <th scope="col">Section</th>
          <th scope="col">Instructor</th>
          <th scope="col">Type</th>
          <th scope="col">Time</th>
          <th scope="col">Day</th>
          <th scope="col">Location</th>
          <th scope="col">Syllabus</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">ITP 303</th>
          <td>31804R</td>
          <td>Nayeon Kim</td>
          <td>Lecture/Lab</td>
          <td>12:00 ~ 1:50 PM </td>
          <td>Mon, Wed</td>
          <td>VKC 261</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20201/31804.pdf';">Syllabus</button></td>
        </tr>
         <tr>
          <th scope="row">ITP 303</th>
          <td>31809R</td>
          <td>Nayeon Kim</td>
          <td>Lecture/Lab</td>
          <td>5:30 ~ 7:20 PM </td>
          <td>Tue, Thu</td>
          <td>GFS 116</td>
          <td><button class="btn btn-primary" type="button" onclick="window.location.href = 'https://web-app.usc.edu/soc/syllabus/20201/31804.pdf';">Syllabus</button></td>


          </tbody>
        </table>

    </div>
  </div>
</div>
</div>
      </div>
    </div>

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
$.ajax({
  method: "GET",
  url: 'https://newsapi.org/v2/top-headlines?' +
  'country=us&' +
  'apiKey=110d1f37d7e44a67adc114faf33b8bfc',
  success: function(result) {
    document.getElementById("topnews").innerHTML = result.articles[0].title;
  }
})
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/5826f004d7.js" crossorigin="anonymous"></script>

</body>
</html>













