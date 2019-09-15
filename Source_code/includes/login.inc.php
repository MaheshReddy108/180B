<?php

session_start();

if(isset($_POST['submit'])){
	
	include 'dbh.inc.php';
	
	$uid= mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd= mysqli_real_escape_string($conn,$_POST['pwd']);
	
	if(empty($uid) || empty($pwd)){
		
		header("Location: ../index.html?login=empty");
		exit();	
	}else{
		$sql="SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck < 1){
		
		header("Location: ../index.html?login=error");
		exit();
	}else{
		if($row = mysqli_fetch_assoc($result)){
			
			$hashedPwdCheck = password_verify($pwd,$row['user_pwd']);
			if($hashedPwdCheck == false){
				header("Location: ../index.html?login=error");
				exit();}
			elseif($hashedPwdCheck == true){
				$_SESSION['u_id']=$row['user_id'];
				$_SESSION['u_uid']=$row['user_uid'];
				header("Location: ../updateDb/updateDB.php?login=success");
				exit();
				
				
			}
		}
		
		
	}
	
}
}
else{
	
	header("Location: ../index.html?login=error");
	exit();
}

	
