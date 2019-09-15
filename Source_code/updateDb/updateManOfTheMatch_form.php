<!DOCTYPE html>
<html>
<head>
      <title>Update Man Of The Match</title>
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
<form action="updateManOfTheMatch_DB.php" method="post">
          <h2>Update Man of the Match</h2>
          <br>
          <div class="form-group">
					<label>Match ID</label>
					<input type="text" name="matchId" class="form-control">
          </div>
		      <div class="form-group">
					<label>Player ID</label>
					<input type="text" name="manOfTheMatch" class="form-control">
          </div>
          <div class="form-group">
          			<button type="submit" class="btn btn-primary" method="post" name="save">Save</button>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		            <button type="submit" class="btn btn-primary" formaction="updateDB.php" name="back">Back</button>
          </div>  
</form>
</div>
</body>
</html>