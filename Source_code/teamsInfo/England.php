<?php
  include_once '../includes/dbh.inc.php'
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<body>

<div><h2> Team Info</h2></div>
<?php
    $sql = "SELECT Team_Name, t.Team_Id, Sponsor FROM Team t JOIN Coach c ON t.Team_Id=c.Team_Id WHERE t.Team_Id='ENG';";
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck >0) {
    echo"<table border='1'>";
    echo"<tr><td>Team</td><td>Team ID</td><td>Sponsor</td></tr>\n";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['Team_Name']}</td>";
        echo "<td>{$row['Team_Id']}</td>";
        echo "<td>{$row['Sponsor']}</td>";
        echo "</tr>";
     }
    echo "</table>";
  }
  ?>

  <div><h2> Players Info</h2></div>
  <?php
  $sql = "SELECT * FROM Player WHERE Team_Id='ENG';";
  $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck >0) {
  echo"<table border='1'>";
echo"<tr><td>Player ID</td><td>First Name</td><td>Last Name</td><td>Runs</td><td>Total matches played</td><td>Balls</td><td>Wickets</td></tr>\n";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['Player_Id']}</td>";
    echo "<td>{$row['F_Name']}</td>";
    echo "<td>{$row['L_Name']}</td>";
    echo "<td>{$row['Runs']}</td>";
    echo "<td>{$row['Tot_Num_Matches']}</td>";
    echo "<td>{$row['Balls']}</td>";
    echo "<td>{$row['Wickets']}</td>";
    echo "</tr>";
   }
  echo "</table>";
}
?>

<div><h2>Captain</h2></div>

<?php

   $sql = "SELECT p.F_Name, p.L_Name FROM Player p,Captain c  WHERE p.Team_Id='ENG' AND c.player_ID=p.Player_Id;";
   $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

   $resultcheck = mysqli_num_rows($result);
   if ($resultcheck >0) {
   echo"<table border='1'>";
   echo"<tr><td>First Name</td><td>Last Name</td></tr>\n";
      while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$row['F_Name']}</td>";
          echo "<td>{$row['L_Name']}</td>";
          echo "</tr>";
        }
   echo "</table>";
 }
?>

  <div><h2>Vice Captain</h2></div>
  <?php
  $sql = "SELECT p.F_Name, p.L_Name FROM Player p JOIN ViceCaptain vc ON vc.Player_ID=p.Player_ID WHERE p.Team_Id='ENG';";
  $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck >0) {
  echo"<table border='1'>";
  echo"<tr><td>First Name</td><td>Last Name</td></tr>\n";
  while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['F_Name']}</td>";
      echo "<td>{$row['L_Name']}</td>";
      echo "</tr>";
  }
  echo "</table>";
  }
  ?>

<div><h2>Coach</h2></div>

<?php

$sql = "SELECT * FROM Coach WHERE Team_Id='ENG';";
  $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck >0) {
  echo"<table border='1'>";
echo"<tr><td>First name</td><td>Last Name</td><td>Age</td><td>Country</td></tr>\n";
  while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['Coach_F_Name']}</td>";
      echo "<td>{$row['Coach_L_Name']}</td>";
      echo "<td>{$row['Age']}</td>";
      echo "<td>{$row['Country']}</td>";
      echo "</tr>";
   }
  echo "</table>";
}
?>

<div><h2>Selection Team</h2></div>
<?php

$sql = "SELECT ST.selection_Team_Id,ST.Coach_F_Name, ST.Team_id,P.F_Name, P.L_Name FROM Selection_Team ST, Selection_Player SP, Player P WHERE ST.selection_Team_Id= SP.selection_Team_Id AND SP.Player_Id=P.Player_Id AND ST.Team_id='ENG';";
  $result = mysqli_query($conn, $sql) or die("Bad query: $sql");

  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck >0) {
  echo"<table border='1'>";
echo"<tr><td>Selection team ID</td><td>Coach First name</td><td>Player First NAme</td><td>Player Last Name</td></tr>\n";
  while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['selection_Team_Id']}</td>";
      echo "<td>{$row['Coach_F_Name']}</td>";
      echo "<td>{$row['F_Name']}</td>";
      echo "<td>{$row['L_Name']}</td>";
      echo "</tr>";
   }
  echo "</table>";
}
?>
</body> 
</html>