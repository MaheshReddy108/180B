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
              <li><a href="pointsTable.php">Points Table</a></li>
              <li><a href="teams.php">Teams</a></li>
              <li><a href="players.php">Players</a></li> 
              <li><a href="login.php">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </div><!-- /.container-fluid -->
    </nav>
    
<?php	
	$path=$_GET['path'];
  
  	$int_val =  (int) $path ;
	
	
    $sql = "SELECT s.Match_Id, p.Team_Id, p.F_Name, p.L_Name, s.RunsScored, s.WicketsTaken
			FROM ScoreCard s 
			join Player p on s.Player_Id = p.Player_Id
			where s.Match_Id = ".$int_val;
	
	$query= "SELECT p.Team_Id, SUM(s.RunsScored), SUM(s.WicketsTaken) FROM ScoreCard s join Player p on s.Player_Id = p.Player_Id where s.Match_Id ='". $int_val."' GROUP BY p.Team_Id order by SUM(s.RunsScored) DESC;";
	
     
	$new="SELECT Team_Id,F_Name,L_Name FROM `Matches` join Player on ManOfTheMatch=Player_Id where Match_Id= ".$int_val;
    //$sql = "SELECT * FROM ScoreCard where Match_Id = 1";
		
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
	$result2= mysqli_query($conn, $query) or die("Bad query: $query");
	$result3= mysqli_query($conn, $new) or die("Bad query: $new");
    $resultcheck = mysqli_num_rows($result);
	$resultcheck2 = mysqli_num_rows($result2);
	$resultcheck3 = mysqli_num_rows($result3);
	
	 if ($resultcheck2 >0) {
    echo"<table border='1' align='center'>";
    echo"<tr><td>Team</td><td>Total Runs Scored</td><td>Total Wickets Taken<td></tr>\n";
    while($row2 = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>{$row2['Team_Id']}</td>";
        echo "<td>{$row2['SUM(s.RunsScored)']}</td>";
		echo "<td>{$row2['SUM(s.WicketsTaken)']}</td>";
		
        echo "</tr>";
		
     }
    echo "</table>";
	
  }
  
   if ($resultcheck3 >0) {
    echo"<table border='1' align='center'>";
    echo"<tr><td>Team</td><td> Man of the Match </td></tr>\n";
    while($row3 = mysqli_fetch_assoc($result3)) {
        echo "<tr>";
        echo "<td>{$row3['Team_Id']}</td>";
		echo "<td>{$row3['F_Name']} {$row3['L_Name']}</td>";
        
		
        echo "</tr>";
		
     }
    echo "</table>";
	
  }
	
	
	
    if ($resultcheck >0) {
    echo"<table border='1' align='center'>";
    echo"<tr><td>Match ID</td><td>Team</td><td>First Name</td><td>Last Name</td><td>Runs Scored</td><td>Wickets Taken</td></tr>\n";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['Match_Id']}</td>";
        echo "<td>{$row['Team_Id']}</td>";
        echo "<td>{$row['F_Name']}</td>";
        echo "<td>{$row['L_Name']}</td>";
        echo "<td>{$row['RunsScored']}</td>";
        echo "<td>{$row['WicketsTaken']}</td>";
        echo "</tr>";
     }
    echo "</table>";
  }
?>

</body> 
</html>