<!DOCTYPE html>
<html>
<head>
      <title>Update PointsTable</title>
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
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
<form action="updatePointsTable_DB.php" method="post">
          <h2>Update Points Table</h2>
          <br>
          <div class="form-group">
					<label>Match ID</label>
					<input type="text" name="matchID" class="form-control">
          </div>
					<div class="form-group">
					<label>Winning Team</label>
					<input type="text" name="winningTeam" class="form-control">
          </div>
          <div class="form-group">
					<label>Winning Team Run Rate</label>
					<input type="text" name="winningRunRate" class="form-control">
          </div>
          <div class="form-group">
					<label>LosingTeam</label>
					<input type="text" name="losingTeam" class="form-control">
          </div>
          <div class="form-group">
					<label>Losing Team Run Rate</label>
					<input type="text" name="losingRunRate" class="form-control">
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary" name="save">Save</button>
          
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		      <button type="submit" class="btn btn-primary" formaction="updateDB.php" name="back">Back</button>
          </div>
     </form>
 </div>
</body>
</html>