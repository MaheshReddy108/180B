<?php
  include_once '../includes/dbh.inc.php'
?>

<?php
session_start();
if (isset($_POST['save'])){
    $matchid = $_POST['MatchID'];
    $playerid = $_POST['PlayerID'];
    $runsupdate = $_POST['RunsUpdate'];
    $wicketsupdate = $_POST['WicketsUpdate'];
    $totalWicketsupdate= $_POST['WicketsUpdate'];
    $totalRunsupdate = $_POST['RunsUpdate'];
    
    $query = "SELECT * from ScoreCard where Match_Id = $matchid AND Player_ID='$playerid';";
    $query2 ="SELECT * from Player where Player_Id='$playerid';";
    
    if ($result = mysqli_query($conn,$query)) {
   
    	/* fetch associative array */
    	while ($row = mysqli_fetch_row($result)) {
        	printf ("%s (%s)\n", $row[2], $row[3]);
          $runsupdate = $runsupdate + $row[2];
        	$wicketsupdate = $wicketsupdate + $row[3];
      }
     
    	/* free result set */
   	 mysqli_free_result($result);
    }

    $query = "UPDATE ScoreCard SET RunsScored=$runsupdate, WicketsTaken=$wicketsupdate WHERE Match_Id='$matchid' AND Player_Id='$playerid';";
    $result = mysqli_query($conn, $query) or die("Bad query: $query");
    
    $_SESSION['message'] = "ScoreCard Updated";
    $_SESSION['msg_type'] = "success";
    
    header("location:updateScoreCard_form.php?update=success");

    if ($result2 = mysqli_query($conn,$query2)) {

      while ($row = mysqli_fetch_row($result2)) {
        printf ("%s (%s)\n", $row[3], $row[6]);
        $totalRunsupdate = $totalRunsupdate + $row[3];
        $totalWicketsupdate = $totalWicketsupdate + $row[6];
    }
    
      /* free result set */
      mysqli_free_result($result2);
    }

    $query2 = "UPDATE Player SET Runs=$totalRunsupdate, Wickets=$totalWicketsupdate WHERE Player_Id='$playerid';";
    $result2 = mysqli_query($conn, $query2) or die("Bad query: $query2");
    
    $_SESSION['message'] = "ScoreCard Updated";
    $_SESSION['msg_type'] = "success";
    
    header("location:updateScoreCard_form.php?update=success");

 }
 ?>