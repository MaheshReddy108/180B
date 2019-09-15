<?php
  include_once 'includes/dbh.inc.php'
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cricket World Cup 2019</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
</head>

<body>

<div class="wrapper">
    <nav class="navbar navbar-default">
      <div class="container-fluid navbar-custom">

       
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
    

<?php
    $sql = "SELECT Team_Name, ROW_NUMBER() OVER (ORDER BY Points DESC, Run_Rate DESC ) as 'Rank' , Tot_Mat_Played, 
 			Matches_Won, Matches_Lost, Matches_Tied, Points, Run_Rate 
 			FROM PointsTable order by Points desc, Run_Rate desc";
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck >0) {
    echo"<table id= 'pointsTable' border='1' align='center'>";
    echo"<tr><td>Team</td><td>Rank</td><td>Matches</td><td>Won</td><td>Lost</td><td>Tied</td><td>Points</td><td>RunRate</td></tr>\n";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['Team_Name']}</td>";
        echo "<td>{$row['Rank']}</td>";
        echo "<td>{$row['Tot_Mat_Played']}</td>";
        echo "<td>{$row['Matches_Won']}</td>";
        echo "<td>{$row['Matches_Lost']}</td>";
        echo "<td>{$row['Matches_Tied']}</td>";
        echo "<td>{$row['Points']}</td>";
        echo "<td>{$row['Run_Rate']}</td>";
        echo "</tr>";
     }
    echo "</table>";
  }
?>
</body> 
</html>