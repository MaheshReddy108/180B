<?php
  include_once 'includes/dbh.inc.php';
  $_POST = array()
?>

<!DOCTYPE html>
<html>
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    html {
      box-sizing: border-box;
    }
    
    *, *:before, *:after {
      box-sizing: inherit;
    }
    
    .column {
      float: left;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }
    
    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
      }
    }
    
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    
    .container {
      padding: 0 16px;
    }
    
    .container::after, .row::after {
      content: "";
      clear: both;
      display: table;
    }
    
    .title {
      color: grey;
    }
    
    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 30%;
    }
    
    .button:hover {
      background-color: #555;
    }
    </style>

  <meta charset="utf-8">
  <title>teams</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="Teams_style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
</head>

<body>
  <!-- <div class="wrapper"> -->
    <nav class="navbar navbar-default">
      <div class="container-fluid navbar-custom">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="row">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="col-xs-9 phone-nav">
              <a class="navbar-brand" href="index.html" id="logo">Home</a>
            </div>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right navbar-right-custom">
              <li><a href="schedule.php">Schedule</a></li>
              <li><a href="pointsTable.php">PointsTable</a></li>
              <li><a href="teams.php">Teams</a></li>
              <li><a href="players.php">Players</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->

        </div>
      </div><!-- /.container-fluid -->
    </nav>
  <!-- </div> -->

<h1 class="cb-font-28 cb-list-header text-bold cb-sub-opening">Teams</h1>

     <div class="row">
        <div class="column">
          <div class="card">
            <img src="images/australia.png" alt="flag" style="width:20%">
            <div class="container">
              <h4>Australia</h4>
              <!-- <p><a href="<?php echo "australia.php";?>"Team details</a></p> -->
              <p><a href="<?php echo "teamsInfo/australia.php";?>">Team details</a></p>
            </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <img src="images/uk.jpg" alt="flag" style="width:20%">
            <div class="container">
              <h4>England</h4>
              <p><a href="<?php echo "teamsInfo/England.php";?>">Team details</a></p>
            </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <img src="images/India.png" alt="flag" style="width:20%">
            <div class="container">
              <h4>India</h4>
              <p><a href="<?php echo "teamsInfo/India.php";?>">Team details</a></p>
            </div>
          </div>
        </div>

    </div>
  
  
      <div class="row">
          <div class="column">
            <div class="card">
              <img src="images/Newzealand.png" alt="flag" style="width:20%">
              <div class="container">
                <h4>Newzealand</h4>    
                <p><a href="<?php echo "teamsInfo/NewZealand.php";?>">Team details</a></p>
              </div>
            </div>
          </div>
        
          <div class="column">
            <div class="card">
              <img src="images/Pakistan.png" alt="flag" style="width:20%">
              <div class="container">
                <h4>Pakistan</h4>
                <p><a href="<?php echo "teamsInfo/Pakistan.php";?>">Team details</a></p>
              </div>
            </div>
          </div>
        
          <div class="column">
            <div class="card">
              <img src="images/SA.png" alt="flag" style="width:20%">
              <div class="container">
                <h4>South Africa</h4>
                <p><a href="<?php echo "teamsInfo/SA.php";?>">Team details</a></p>
              </div>
            </div>
          </div>

        </div>


      <div class="row">
        <div class="column">
            <div class="card">
              <img src="images/srilanka.png" alt="flag" style="width:20%">
              <div class="container">
                <h4>Srilanka</h4>
                <p><a href="<?php echo "teamsInfo/srilanka.php";?>">Team details</a></p>
              </div>
            </div>
          </div>
       

        <div class="column">
            <div class="card">
              <img src="images/West_indies.png" alt="flag" style="width:20%">
              <div class="container">
                <h4>West Indies</h4>
                <p><a href="<?php echo "teamsInfo/WI.php";?>">Team details</a></p>
              </div>
            </div>
          </div>

      </div>

   
 
  
</body>

</html>
             
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.11.0/d3.js"></script>
 
</body>

</html>
