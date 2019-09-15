<?php
  include_once '../includes/dbh.inc.php'
  
?>
<?php
session_start();
if (isset($_POST['save'])){
    echo "here3";
    $matchId = $_POST['matchId'];
    $manOfTheMatch = $_POST['manOfTheMatch'];
    $sql = "Update Matches Set ManOfTheMatch='$manOfTheMatch' where Match_Id='$matchId';";
    $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
    header("location: updateDB.php?update=success");
    }
 ?>