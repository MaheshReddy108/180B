<!DOCTYPE html>
<html>
<head>
      <title>Login</title>
        <!-- <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> -->
</head>
<?php
	session_start();
	
?>

<!DOCTYPE html>
<html>
<body>

		<div class='main'>
			<div class="title">
					<?php	
				
			echo'<form action ="index.html" method="POST">
			        <button type="submit" name="submit">Home</button>	</form>';	
   ?>
      <br>
			<h2> Login Page</h2>
			<br>
			<?php
			
  	    
		  if(isset($_SESSION['u_id'])){
					echo'<form action ="includes/logout.inc.php" method="POST">
			<button type="submit" name="submit" class="form-control">Logout</button>
			
			</form>';	
				}
				else {
					echo'<form action ="includes/login.inc.php" method="POST">
					<input type="text" name="uid" placeholder="Username">
					<input type="password" name="pwd" placeholder="Password">
			        <button type="submit" name="submit">Login</button> 
					<br>
					<br>
			
			</form>';	
				}
				
				
		
				
				
			?>
			
			
			
			
			
			
			</div>
			</div>
</body>
</html>
		