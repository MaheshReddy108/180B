<!DOCTYPE html>
<html>
<head>
      <title>Update ScoreCard</title>
        <!-- <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> -->
</head>
<body>
  <?php
  if (isset($_SESSION['message'])): ?> 
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
    ?>
  </div>
  <?php endif ?>

<div class="row justify-content-center">
<form action="updateScoreCard_DB.php" method="post">
          <h2>Update Scorecard</h2>
          <br>
          <div class="form-group">
					<label>Match ID</label>
					<input type="text" name="MatchID" class="form-control">
          </div>
					<div class="form-group">
					<label>Player ID</label>
					<input type="text" name="PlayerID" class="form-control">
          </div>
          <div class="form-group">
					<label>Runs update</label>
					<input type="text" name="RunsUpdate" class="form-control">
          </div>
          <div class="form-group">
					<label>Wickets update</label>
          <input type="text" name="WicketsUpdate" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary" name="save">Save</button> 
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		      <button type="submit" class="btn btn-primary" formaction="updateDB.php" name="back">Back</button>
		  
         
</form>


	 
 </div>
</body>
</html>