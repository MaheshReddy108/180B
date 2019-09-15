<?php
  include_once 'includes/dbh.inc.php';
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
              <a class="navbar-brand" href="#" id="logo">Home</a>
            </div>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right navbar-right-custom">
      
              <li><a href="schedule.php">Schedule</a></li>
              <li><a href="pointsTable.php">Points table</a></li>
              <li><a href="teams.php">Teams</a></li>
              <li><a href="players.php">Players</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </div><!-- /.container-fluid -->
    </nav>
</body> 



<?php
  //foreach($_POST as $key=>$value)
  //{
  //  echo "$key=$value";
  //}

  $player_table_name = 'Players';
  $player_table_c1_name_spacer = '';

  $player_table_c1_hdr = 'Player_Id';
  $player_table_c2_hdr = 'F_Name';
  $player_table_c3_hdr = 'L_Name';
  $player_table_c4_hdr = 'Runs';
  $player_table_c5_hdr = 'Tot_Num_Matches';
  $player_table_c6_hdr = 'Balls';
  $player_table_c7_hdr = 'Wickets';
  $player_table_c8_hdr = 'Team_Id';
  $player_table_c9_hdr = 'BOflag';
  $player_table_c10_hdr = 'BAflag';
  $player_table_c11_hdr = 'Wflag';
  
  $player_table_c1_name = 'Player ID' . $player_table_c1_name_spacer;
  $player_table_c2_name = 'First name' . $player_table_c1_name_spacer;
  $player_table_c3_name = 'Last name' . $player_table_c1_name_spacer;
  $player_table_c4_name = 'Runs' . $player_table_c1_name_spacer;
  $player_table_c5_name = 'Matches played' . $player_table_c1_name_spacer;
  $player_table_c6_name = 'Balls' . $player_table_c1_name_spacer;
  $player_table_c7_name = 'Wickets' . $player_table_c1_name_spacer;
  $player_table_c8_name = 'Team name' . $player_table_c1_name_spacer;
  $player_table_c9_name = 'Is Bowler' . $player_table_c1_name_spacer;
  $player_table_c10_name = 'Is Batsman' . $player_table_c1_name_spacer;
  $player_table_c11_name = 'Is Wicketkeeper' . $player_table_c1_name_spacer;
 

  $select_str = "";
  $hdr_str = "<tr>";
  $where_str = " WHERE ";
  $numValues = 0;
  
  if (!empty($_POST['sTeam']))
  {
    $where_str .=  $player_table_c8_hdr . '="' . $_POST['sTeam'] . '" AND ';
  }
  $select_str .= $player_table_c8_hdr . ',';
  $hdr_str .= "<td>$player_table_c8_name</td>";

  if (!empty($_POST['sFName']))
  {
    #$where_str .=  $player_table_c2_hdr . '="' . $_POST['sFName'] . '" AND ';
    $where_str .=  $player_table_c2_hdr . ' LIKE "%' . $_POST['sFName'] . '%" AND ';
  }
  $select_str .= $player_table_c2_hdr . ',';
  $hdr_str .= "<td>$player_table_c2_name</td>";

  if (!empty($_POST['sLName']))
  {
    #$where_str .=  $player_table_c3_hdr . '="' . $_POST['sLName'] . '" AND ';
    $where_str .=  $player_table_c3_hdr . ' LIKE "%' . $_POST['sLName'] . '%" AND ';

  }
  $select_str .= $player_table_c3_hdr . ',';
  $hdr_str .= "<td>$player_table_c3_name</td>";

  $select_str .= $player_table_c1_hdr . ',';
  $hdr_str .= "<td>$player_table_c1_name</td>";

  if (array_key_exists('sRuns',$_POST))
  {
    $select_str .= $player_table_c4_hdr . ',';
    $hdr_str .= "<td>$player_table_c4_name</td>";
    $numValues += 1;
  }

  if (array_key_exists('sBalls',$_POST))
  {
    $select_str .= $player_table_c6_hdr . ',';
    $hdr_str .= "<td>$player_table_c6_name</td>";
    $numValues += 1;
  }

  if (array_key_exists('sWickets',$_POST))
  {
    $select_str .= $player_table_c7_hdr . ',';
    $hdr_str .= "<td>$player_table_c7_name</td>";
    $numValues += 1;
  }

  if (array_key_exists('sNumMatches',$_POST))
  {
    $select_str .= $player_table_c5_hdr . ',';
    $hdr_str .= "<td>$player_table_c5_name</td>";
    $numValues += 1;
  }

  if (array_key_exists('sBatsman',$_POST) || array_key_exists('sBowler',$_POST) || array_key_exists('sWicketkeeper',$_POST))
  {
    $where_str .= "(";
  }

  if (array_key_exists('sBatsman',$_POST))
  {
    $select_str .= $player_table_c10_hdr . ',';
    $hdr_str .= "<td>$player_table_c10_name</td>";
    $where_str .= "(BAFLAG = 1) OR ";
    $numValues += 1;
  }

  if (array_key_exists('sBowler',$_POST))
  {
    $select_str .= $player_table_c9_hdr . ',';
    $hdr_str .= "<td>$player_table_c9_name</td>";
    
    $where_str .= "(BOflag = 1) OR ";
    $numValues += 1;
  }

  if (array_key_exists('sWicketkeeper',$_POST))
  {
    $select_str .= $player_table_c11_hdr . ',';
    $hdr_str .= "<td>$player_table_c11_name</td>";
    $where_str .= "(WFLAG = 1) OR ";
    $numValues += 1;
  }

  if (array_key_exists('sBatsman',$_POST) || array_key_exists('sBowler',$_POST) || array_key_exists('sWicketkeeper',$_POST))
  {
    $where_str = rtrim($where_str,' OR ');
    $where_str .= ")";
  }
  

  $select_str = rtrim($select_str,',');
  $where_str = rtrim($where_str,' AND ');
  
  
  $hdr_str .= "</tr>";

  //echo $select_str;
  if ((empty($_POST['sTeam'])) && (empty($_POST['sFName'])) && (empty($_POST['sLName']))) 
  {
    $select_str0 = '*';
    $where_str0 = '';
  }
  else
  {
    $select_str0 = $select_str;
    $where_str0 = $where_str;
  }
  
  $table_str0 = 'Player';


  mysqli_select_db($conn, $db);

  $sql = "SELECT $select_str0 FROM $table_str0 " . $where_str0 ;
  //echo $sql;
  $r = mysqli_query($conn, $sql) or die("Bad query: $sql");


  echo"<table border='1' align='center'>";
  //echo"<tr><td>$player_table_c1_name</td><td>$player_table_c2_name</td><td>$player_table_c3_name</td><td>$player_table_c4_name</td><td>$player_table_c5_name</td><td>$player_table_c6_name</td><td>$player_table_c7_name</td><td>$player_table_c8_name</td><td>$player_table_c9_name</td></tr>\n";
  echo $hdr_str;
  while($a = $r->fetch_assoc()){
      echo "<tr>";
      echo "<td>{$a[$player_table_c8_hdr]}</td>";
      echo "<td>{$a[$player_table_c2_hdr]}</td>";
      echo "<td>{$a[$player_table_c3_hdr]}</td>";
      echo "<td>{$a[$player_table_c1_hdr]}</td>";
      if (!empty($_POST['sRuns'])) {echo "<td>{$a[$player_table_c4_hdr]}</td>";}
      if (!empty($_POST['sBalls'])) {echo "<td>{$a[$player_table_c6_hdr]}</td>";}
      if (!empty($_POST['sWickets'])) {echo "<td>{$a[$player_table_c7_hdr]}</td>";}
      if (!empty($_POST['sNumMatches'])) {echo "<td>{$a[$player_table_c5_hdr]}</td>";}
      if (!empty($_POST['sBowler'])) {echo "<td>{$a[$player_table_c9_hdr]}</td>";}
      if (!empty($_POST['sBatsman'])) {echo "<td>{$a[$player_table_c10_hdr]}</td>";}
      if (!empty($_POST['sWicketkeeper'])) {echo "<td>{$a[$player_table_c11_hdr]}</td>";}
      
      echo "</tr>";
    }
  echo "</table>";




?>



</html>






