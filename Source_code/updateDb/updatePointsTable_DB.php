<?php
  
  include_once '../includes/dbh.inc.php'
?>
<?php
session_start();
if (isset($_POST['save'])){
 	$matchID = $_POST['matchID'];
    $winningTeam = $_POST['winningTeam'];
    $winningRunRate = $_POST['winningRunRate'];
    $losingTeam = $_POST['losingTeam'];
    $losingRunRate = $_POST['losingRunRate'];
    
    
    // -------------------------- Updating Winning Team Details ----------------------------------
    
    $query = "SELECT * from PointsTable where Team_Name = '$winningTeam';";
	if ($result = mysqli_query($conn, $query)) {
    	/* fetch associative array */
    	while ($row = mysqli_fetch_row($result)) {
    		// 					Team Rank MatchesPlayed MatchesWon MatchesLost MatchesTied Points RunRate
        	if ($row[0] == $winningTeam){
        		$totMatchesPlayed = 1 + $row[2];
        		$matchesWon = 1 + $row[3];
        		$matchesLost = $row[4];
        		$matchesTied = $row[5];
        		$points = 2 + $row[6];
        		$runRate = ((($row[7] * ($totMatchesPlayed - 1)) + $winningRunRate)) / ($totMatchesPlayed);
        	}
    	}
    	/* free result set */
   	 mysqli_free_result($result);
	}
	
    $sql = "Update PointsTable Set Tot_Mat_Played=$totMatchesPlayed, Matches_Won=$matchesWon, Matches_Lost=$matchesLost, Matches_Tied=$matchesTied, 
    		Points=$points, Run_Rate=$runRate where Team_Name='$winningTeam';";   
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
    
    // --------------------------- Updating Losing Team Details ----------------------------------
    
    $query = "SELECT * from PointsTable where Team_Name = '$losingTeam';";
	if ($result = mysqli_query($conn, $query)) {
    	/* fetch associative array */
    	while ($row = mysqli_fetch_row($result)) {
    		// 					Team Rank MatchesPlayed MatchesWon MatchesLost MatchesTied Points RunRate
        	if ($row[0] == $losingTeam){
        		$totMatchesPlayed = 1 + $row[2];
        		$matchesWon = $row[3];
        		$matchesLost = 1+ $row[4];
        		$matchesTied = $row[5];
        		$points = $row[6];
        		$runRate = ((($row[7] * ($totMatchesPlayed - 1)) + $losingRunRate)) / ($totMatchesPlayed);
        	}
    	}
    	/* free result set */
   	 mysqli_free_result($result);
	}
	
    $sql = "Update PointsTable Set Tot_Mat_Played=$totMatchesPlayed, Matches_Won=$matchesWon, Matches_Lost=$matchesLost, Matches_Tied=$matchesTied, 
    		Points=$points, Run_Rate=$runRate where Team_Name='$losingTeam';";   
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
    
    $_SESSION['message'] = "PointsTable Updated";
    $_SESSION['msg_type'] = "success";
    
    header("location:updatePointsTable_form.php?update=success");
    }
 ?>