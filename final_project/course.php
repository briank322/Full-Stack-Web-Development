<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Course | Find My CP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
      <h1 class="col-12 mt-4 mb-4">Course Information</h1>
      <div class = "container">
      <h3> Useful Links</h3>
      <ul>
       <li><a href="https://classes.usc.edu/term-20201/classes/">Class Offered in 2020 Spring</a></li>
       <li><a href="https://myviterbi.usc.edu">USC MyViterbi</a></li>
       <li><a href="https://www.cs.usc.edu/">USC Computer Science Department</a></li>
       <li><a href="https://my.usc.edu">My USC edu</a></li>
       <li><a href="https://web-app.usc.edu/maps/map.pdf">USC Campus Map</a></li>
     </ul>
   </div>
    </div> <!-- .row -->
  </div> <!-- .container -->
<div class="container">
  <hr>
  <div class="panel panel-default" id="accordion">
    <p><strong>Welcome to CSCI 103.</strong> This class is an introduction to computer programming, using C++ as the programming language. You will learn about variables, types, loops, conditional statements, functions, input/output, arrays, recursion, dynamic memory, object-oriented programming, performance, and several data structures. You will get a lot of practice reading, writing, and debugging computer programs.</p>
      <div class="panel-heading">
        <h4 class="panel-body">

          <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse1">CSCI 103 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">CSCI 103</th>
      <td>Andrew Goodney</td>
      <td>M: 3-5PM, Tu: 4-5PM, W: 2-4PM</td>
      <td>PHE 406</td>
      <td><button class = "btn-primary" onclick="goodney()">Email</button></td>
    </tr>
    <tr>
      <th scope="row">CSCI 103</th>
      <td>Sandra Batista</td>
      <td>M: 11:30-1:00PM, Tu: 5-7PM, Th: 2:30-4:30PM</td>
      <td>SAL 104</td>
      <td><button class = "btn-primary" onclick="batista()">Email</button></td>
    </tr>
    <tr>
      <th scope="row">CSCI 103</th>
      <td>Jyotirmoy Deshmukh</td>
      <td>TBA</td>
      <td>SAL 340</td>
      <td><button class = "btn-primary" onclick="deshmukh()">Email</button></td>
    </tr>
  </tbody>
</table>
    </div>
    <hr>
    <div class="panel panel-default">
      <p><strong>Welcome to CSCI 104.</strong> The course covers the fundamentals of data structures and object-oriented programming. They are two sides of the same coin. As a programmer becomes more proficient, they realize that how well and efficiently a problem can be solved often depends on how the data are stored. Some of the ideas are quite sophisticated and clever, and we will explore a spectrum of them in this class, ranging from fairly basic to moderately advanced structures.</p>
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse2">CSCI 104 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">CSCI 104</th>
      <td>Sandra Batista</td>
      <td>M: 11:30-1:00PM, Tu: 5-7PM, Th: 2:30-4:30PM</td>
      <td>SAL 104</td>
      <td><button class = "btn-primary" onclick="batista()">Email</button></td>
    </tr>

    <tr>
      <th scope="row">CSCI 104</th>
      <td>Mark Redekopp</td>
      <td>M: 11-12PM, 1-2:30PM, T: 10-10:45AM, W: 11-12PM, Th 10-10:45AM, F: 3-4:15PM</td>
      <td>EEB 222</td>
      <td><button class = "btn-primary" onclick="redekopp()">Email</button></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    <hr>
    <div class="panel panel-default">
      <p><strong>Welcome to CSCI 170.</strong> This class is an introduction to Discrete Methods in Computer Science. You will learn about Sets, functions, series. Big-O notation and algorithm analysis. Propositional and first-order logic. This course covers Counting and discrete probability, Graphs and basic graph algorithms, and Basic number theory.</p>
      <div class="panel-heading">
        <h4>
        <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse3">CSCI 170 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">CSCI 170</th>
      <td>Aaron Cote</td>
      <td>M: 12:45-1:45PM, Tu: 10:30-11:30AM, W: 3:30-4:15PM, Th: 2:00-3:15PM </td>
      <td>SAL 210</td>
      <td><button class = "btn-primary" onclick="cote()">Email</button></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    <hr>
    <div class="panel panel-default">
      <p><strong>Welcome to CSCI 201.</strong> This course covers principles of software development along with Object-oriented paradigm for programming-in-the-large in Java; writing sophisticated concurrent applications with animation and graphical user interfaces; using professional tools on team project.</p>
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse4">CSCI 201 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">CSCI 201</th>
      <td>Olivera Grujic</td>
      <td>M: 3:30-5:30PM, Th: 2:30-4:30PM </td>
      <td>PHE 514</td>
      <td><button class = "btn-primary" onclick="grujic()">Email</button></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    <hr>
    <div class="panel panel-default">
      <p><strong>Welcome to CSCI 270.</strong> This course is an introduction to Algorithms and Theory of Computing which covers Algorithm analysis, Greedy algorithms, divide and conquer, dynamic programming, graph algorithms. NP-completeness and basic recursion theory and undecidability. Sorting lower bounds. Number-theory based cryptography.</p>
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse5">CSCI 270 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">CSCI 270</th>
      <td>Shahriar Shamsian</td>
      <td>M: 2:00-4:00PM, Th: 2:00-6:30PM </td>
      <td>SAL 318</td>
      <td><button class = "btn-primary" onclick="shamsian()">Email</button></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    <hr>
    <div class="panel panel-default">
      <p><strong>Welcome to EE 109.</strong> This course introduces students to the fundamental concepts of computer systems and computer engineering
using embedded systems as a vehicle. Concepts include information representations, embedded C
language constructs, state machines, and fundamental circuit analysis. Specific embedded topics will include
digital I/O, serial I/O protocols, analog-to-digital conversion and interrupt mechanisms. A lecture/lab course
format will be employed to provide hands-on experience and active learning techniques.</p>
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse6">EE 109 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">EE 109</th>
      <td>Murali Annavaram</td>
      <td>T: 3:30-4:30PM, Th: 3:30-4:30PM </td>
      <td>EEB 232</td>
      <td><button class = "btn-primary" onclick="annavaram()">Email</button></td>
    </tr>
    <tr>
      <th scope="row">EE 109</th>
      <td>Mark Redekopp</td>
      <td>M: 11-12PM, 1-2:30PM, T: 10-10:45AM, W: 11-12PM, Th 10-10:45AM, F: 3-4:15PM</td>
      <td>EEB 222</td>
      <td><button class = "btn-primary" onclick="redekopp()">Email</button></td>
    </tr>
    <tr>
      <th scope="row">EE 109</th>
      <td>Allan Weber</td>
      <td>M: 10-11:30AM, W: 11-12AM, Th: 2:30-3:30PM </td>
      <td>EEB 410</td>
      <td><button class = "btn-primary" onclick="weber()">Email</button></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    <hr>
    <div class="panel panel-default">
      <p><strong>Welcome to ITP 303.</strong> This course is intended for students who have completed at least one fundamental computer programming
course and want to learn how to build a fully functional web application. Prior web programming skills are
not required. This is a hands-on course where students will learn core web technologies by creating web
pages and applications every week. Students will first create static websites using core front-end languages
such as HTML, CSS, JavaScript. Then students will learn basic database design and implement them using
relational database management systems (RDBMS). Students will write and submit SQL queries to
databases and create data interfaces using PHP. Students will also be exposed to common frameworks and
libraries such as Bootstrap (CSS), jQuery (JS), and Laravel (PHP). </p>
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" style = "padding-left:1%; padding-right:1%;" class = "btn-success" role = "button" data-parent="#accordion" href="#collapse7">ITP 303 <i class="fas fa-angle-double-down"></i></a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <table class="table table-striped table-responsive">
  <thead>

    <tr>
      <th scope="col">Course</th>
      <th scope="col">Instructor</th>
      <th scope="col">Office Hours</th>
      <th scope="col">Location</th>
      <th scope="col">Contact</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">ITP 303</th>
      <td>Nayeon Kim</td>
      <td>W: 3:30-5PM, Th: 1:30-3PM </td>
      <td>OHE 530</td>
      <td><button class = "btn-primary" onclick="kim()">Email</button></td>
    </tr>

  </tbody>
</table>
      </div>
    </div>
  </div>

  <div class="container">

    <br>
    <br>
    <br>



  </div>
</div>
<hr>
  <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2019 Brian Koo ITP 303 Final Project</p>
    </footer> <!-- .container -->

<script>
  function kim(){
    alert("Email: nayeonki@usc.edu");
  }
  function weber(){
    alert("Email: weber@sipi.usc.edu");
  }

function redekopp(){
    alert("Email: redekopp@usc.edu");
  }

function annavaram(){
    alert("Email: annavara@ usc.edu");
  }

function shamsian(){
    alert("Email: sshamsia@usc.edu");
  }
  function grujic(){
    alert("Email: grujic@usc.edu");
  }
  function cote(){
    alert("Email: aaroncot@usc.edu");
  }
function batista(){
  alert("Email: sbatista@usc.edu");
}
function deshmukh(){
  alert("Email: jyotirmoy.deshmukh@usc.edu");
}
function goodney(){
  alert("Email: goodney@usc.edu")
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
      window.location("course.php");
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
